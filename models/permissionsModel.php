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
        try {
            $pagePermissionsPage = [];

            $res = $this->prepare('SELECT id_page,name FROM permissions_page_type_users INNER JOIN pages WHERE pages.id=id_page AND permissions_page_type_users.id_user= :id');
            $res->execute(['id' => $idRole]);

            while ($p = $res->fetchAll(PDO::FETCH_ASSOC)) {
                array_push($pagePermissionsPage, $p);
            }

            return $pagePermissionsPage;

        } catch (PDOException $e) {
            error_log('PermissionsModel::getAllpermissionsforrole -> error: ' . $e);
        }
    }

    public function getAllDefaultForRole($idRole)
    {
        try {
            $pagePermissionsPage = [];

            $res = $this->prepare('SELECT id_page,name FROM default_page_type_user INNER JOIN pages WHERE pages.id=id_page AND default_page_type_user.id_type_user= :id');
            $res->execute(['id' => $idRole]);

            while ($p = $res->fetchAll(PDO::FETCH_ASSOC)) {
                array_push($pagePermissionsPage, $p);
            }

            return $pagePermissionsPage;

        } catch (PDOException $e) {
            error_log('PermissionsModel::getdefaultpermissionsforrole -> error: ' . $e);
        }
    }

}