<?php

require_once 'libs/model.php';

class PermissionsModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPermissionsForRole($idRole)
    {
        $pagePermissionsPage = $this->innerJoin('id_page,name', 'permissions_page_type_users', 'pages', 'pages.id=id_page AND permissions_page_type_users.id_user= :id', ['id' => $idRole]);
        return $pagePermissionsPage;

    }

    public function getAllDefaultForRole($idRole)
    {
        $pageDefault = $this->innerJoin('id_page,name', 'default_page_type_user', 'pages', 'pages.id=id_page AND default_page_type_user.id_type_user= :id', ['id' => $idRole]);

        return $pageDefault;

    }

}