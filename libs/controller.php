<?php

require_once 'class/sessions.php';
require_once 'class/permissions.php';

class Controller
{

    private $view;
    private $model;
    private $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
        $this->permissions = new Permissions();

    }

    public function render($name)
    {
        $this->view->render($name);

    }

    public function setDataView($data)
    {
        $this->view->setData($data);

    }

    public function loadModel($name)
    {
        $this->model = new Model();
        $this->model->loadModel($name);
    }

    public function httpData($arrayData, $mode)
    {
        $postData = [];
        foreach ($arrayData as $data) {

            if (isset($mode[$data]) && !empty($mode[$data])) {
                array_push($postData, $mode[$data]);
            } else {
                return false;
                break;
            }
        }
        return $postData;
    }

    public function redirect($url, $dates)
    {
        $locationURL = constant('URL') . $url;
        foreach ($dates as $key => $data) {
            $locationURL .= '?' . $key . '=' . $data;
        }
        header('Location:' . $locationURL);
    }

}