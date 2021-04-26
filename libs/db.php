<?php

class DB
{

    private $host;
    private $name;
    private $pass;
    private $charset;
    private $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->name = 'root';
        $this->pass = '';
        $this->charset = 'utf8';
        $this->db = 'twitter';
    }

    public function connection()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $connection = new PDO($dsn, $this->name, $this->pass, $option);
            return $connection;

        } catch (PDOException $e) {
            error_log('DB::connection -> error database: ' . $e);
        }
    }

}