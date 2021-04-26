<?php

class View extends Controller
{

    private $title = 'home';
    private $message;

    public function __construct()
    {

    }

    //Imprimimos la vista
    public function render($name)
    {
        $urlRender = 'views/' . $name . "/index.php";
        echo $urlRender;
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
        }
    }

    public function showMessage()
    {
        $this->getMessageError();
        if (!empty($this->message)) {
            echo '<p class="error">' . $this->message . '</p>';
        }
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