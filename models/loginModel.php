<?php

require_once 'models/userModel.php';
require_once 'class/sessions.php';

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        error_log('LoginModel::contruct -> modelo login cargado');
    }

    public function login($user, $pass)
    {
        $data = [
            'user' => $user,
        ];

        $res = $this->specificSearch('*', 'users', 'user= :user', $data, true);

        if ($res) {
            $userModel = new UserModel();
            $userModel->from($res[0]);
            if ($this->passwordVerify($pass, $userModel->getPass())) {
                return $res[0];
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function passwordVerify($pass, $hash)
    {
        return password_verify($pass, $hash);
    }

}