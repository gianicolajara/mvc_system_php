<?php

require_once 'models/userModel.php';
require_once 'models/loginModel.php';
require_once 'class/sessions.php';

class Login extends Controller
{

    public function __construct()
    {
        parent::__construct();
        error_log('Login::construct -> dentro de Login controller');
    }

    public function authenticate()
    {
        $res = $this->httpData(['user', 'pass'], $_POST);
        $errorManagement = new ErrorsManagement();

        if ($res) {
            $user = new UserModel();
            $login = new loginModel();
            $session = new Session();
            if ($session->sessionExists()) {
                $this->redirect('dashboard', []);
            } else {
                $res = $login->login($res[0], $res[1]);
                $user->from($res);
                if ($res) {
                    $session->sessionStart();
                    $session->saveDataUser($user);
                    $this->redirect('dashboard', []);
                } else {
                    $this->redirect('login', ['error' => $errorManagement::ERROR_LOGIN_WRONG_USER]);
                }
            }
        } else {
            $this->redirect('login', ['error' => $errorManagement::ERROR_LOGIN_NEED_DATA]);
        }
    }

    public function logOut()
    {
        $session = new Session();
        $session->sessionStart();
        $session->sessionEnd();
        $this->redirect('home', []);
    }

}