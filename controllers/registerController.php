<?php

class Register extends Controller
{

    public function __construct()
    {
        parent::__construct();
        error_log('register::construct -> dentro de registro controller');
    }

    public function save()
    {
        $arrayData = $this->httpData(['user', 'pass'], $_POST);
        $errorManagement = new ErrorsManagement();

        if ($arrayData) {
            $registerModel = new RegisterModel();
            $res = $registerModel->register($arrayData);
            if ($res) {
                $this->redirect('login', ['success' => $errorManagement::SUCCESS_REGISTER_USER_SAVE]);
            } else {
                $this->redirect('register', ['error' => $errorManagement::ERROR_REGISTER_INVALID_USER]);
            }
        } else {
            $this->redirect('register', ['error' => $errorManagement::ERROR_REGISTER_DATA_WRONG]);

        }

    }

}