<?php

require_once 'models/permissionsModel.php';
require_once 'class/sessions.php';

class Permissions extends Session
{

    private $pagesPermissions;
    private $defaultPages;
    private $role;
    private $url;

    public function __construct()
    {
        $this->permissionsURL();
    }

    public function data($idRole)
    {
        $permissionsModel = new PermissionsModel();
        $this->pagesPermissions = $permissionsModel->getAllPermissionsForRole($idRole);
        $this->defaultPages = $permissionsModel->getAllDefaultForRole($idRole);
    }

    public function permissionsURL()
    {

        $this->url = $_SERVER['REQUEST_URI'];
        $this->url = trim($this->url, '/');
        $this->url = explode('/', $this->url);

        if ($this->sessionExists()) {
            $this->role = $_SESSION['role'];
        } else {
            $this->role = 5; //id por default : "invited"
        }

        $this->data($this->role);
        $this->redirectURLWithpermissions();

    }

    public function redirectURLWithpermissions()
    {

        if (array_search($this->url[1], array_column($this->pagesPermissions[0], 'name')) === false) {
            header('location:' . constant('URL') . $this->defaultPages[0][0]['name']);
        }

    }

}