<?php

class UserModel extends DB
{

    private $id;
    private $user;
    private $pass;
    private $role;
    private $id_type_user;

    public function __construct()
    {
        parent::__construct();
    }

    public function from($arrayData)
    {
        if (!empty($arrayData)) {
            $this->user = $arrayData['user'];
            $this->pass = $arrayData['pass'];
            $this->id_type_user = $arrayData['id_type_user'];
        } else {
            return false;
        }
    }

    //Getters

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getIdTypeUser()
    {
        return $this->id_type_user;
    }

    //Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setIdTypeUser($id_type_user)
    {
        $this->id_type_user = $id_type_user;
    }

}