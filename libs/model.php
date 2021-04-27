<?php

class Model extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    public function loadModel($name)
    {
        $urlRender = 'models/' . $name . '.php';
        if (file_exists($urlRender)) {
            error_log('Model::loadModel -> Model ' . $name . ' cargada');
            require_once $urlRender;
        } else {
            error_log('Model::loadModel -> Model no existe');
        }
    }

    public function query($query)
    {
        return $this->connection()->query($query);
    }

    public function prepare($query)
    {
        return $this->connection()->prepare($query);
    }

    public function getAll($table)
    {
        try {
            $data = [];
            $res = $this->query('SELECT * FROM ' . $table);
            while ($p = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $p);
            }
            return $data;
        } catch (PDOException $e) {
            error_log('model::getAll -> error database : ' . $e);
            return false;
        }
    }

    public function getId($table, $id)
    {
        try {
            $res = $this->prepare('SELECT * FROM ' . $table . ' WHERE id = :id');
            $res->execute([
                'id' => $id,
            ]);

            $data = $res->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            error_log('model::getId -> error database : ' . $e);
            return false;
        }
    }

    public function specificSearch($select, $table, $where, $data, $getData)
    {
        try {
            $arrayData = [];
            $res = $this->prepare('SELECT ' . $select . ' FROM ' . $table . ' WHERE ' . $where);
            $res->execute($data);
            if ($getData) {
                while ($p = $res->fetch(PDO::FETCH_ASSOC)) {
                    array_push($arrayData, $p);
                }
                return $arrayData;
            } else {
                if ($res->rowCount() == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            error_log('model::getId -> error database : ' . $e);
            return false;
        }

    }

    public function insert($table, $vars, $values, $data)
    {
        try {
            $res = $this->prepare('INSERT INTO ' . $table . '(' . $vars . ') VALUES(' . $values . ')');
            $res->execute($data);
            if ($res->rowCount() === 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('MODEL::INSERT -> Error database ' . $e);
            return false;
        }
    }

    public function innerJoin($select, $table, $table2, $on, $data)
    {
        try {
            $arrayData = [];
            $res = $this->prepare('SELECT ' . $select . ' FROM ' . $table . ' INNER JOIN ' . $table2 . ' ON ' . $on);
            $res->execute($data);
            while ($p = $res->fetchAll(PDO::FETCH_ASSOC)) {
                array_push($arrayData, $p);
            }
            return $arrayData;
        } catch (PDOException $e) {
            error_log('MODEL::innerjoin -> Error database ' . $e);
            return false;
        }
    }

}