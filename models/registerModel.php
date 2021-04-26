<?php

require_once 'models/userModel.php';

class RegisterModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register($data)
    {
        $exists = $this->exists(['user' => $data[0]]);

        if (!$exists) {
            $arrayData = [
                'user' => $data[0],
                'pass' => $this->createPassword($data[1]),
                'id_type_user' => 1,
            ];

            $res = $this->insert('users', 'user, pass, id_type_user', ':user, :pass, :id_type_user', $arrayData);
            return $res;

        } else {
            return false;
        }
    }

    public function exists($name)
    {
        $res = $this->specificSearch('*', 'users', 'user= :user', $name, false);
        return $res;
    }

    public function createPassword($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    }

}