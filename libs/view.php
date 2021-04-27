<?php

require_once 'class/sessions.php';

class View extends Controller
{

    private $title = 'home';
    private $message;
    private $data;

    public function __construct()
    {

    }

    public function getSession()
    {
        $session = new Session();
        $res = $session->sessionExists();
        return $res;
    }

    //Imprimimos la vista
    public function render($name)
    {
        $urlRender = 'views/' . $name . "/index.php";
        if (file_exists($urlRender)) {
            error_log('View::render -> vista' . $name . 'cargada');
            $this->setTitle($name);
            require_once constant('HEADERURL');
            require_once $urlRender;
            require_once constant('FOOTERURL');
        } else {
            error_log('View::render -> vista no existe');
        }
    }

    public function getMessageError()
    {
        if ((isset($_GET['error']) && !empty($_GET['error']))) {
            $key = $_GET['error'];
            $errorManagement = new ErrorsManagement();
            $res = $errorManagement->keyExist($key);
            if ($res) {
                $this->message = $errorManagement->obtainError($key);
            }
            return 'error';
        } else if ((isset($_GET['success']) && !empty($_GET['success']))) {
            $key = $_GET['success'];
            $errorManagement = new ErrorsManagement();
            $res = $errorManagement->keyExist($key);
            if ($res) {
                $this->message = $errorManagement->obtainError($key);
            }
            return 'success';

        }
    }

    public function showMessage()
    {
        $type = $this->getMessageError();
        if (!empty($this->message)) {
            echo '<p class="' . $type . '">' . $this->message . '</p>';
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

}