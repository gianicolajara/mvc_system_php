<?php

class Session
{

    private $user;

    public function __construct()
    {

    }

    public function sessionStart()
    {
        session_start();
    }

    public function sessionEnd()
    {
        session_destroy();
        session_unset();
    }

    public function saveDataUser($user)
    {
        $_SESSION['name'] = $user->getUser();
        $_SESSION['id'] = $user->getId();
        $_SESSION['role'] = $user->getIdTypeUser();
    }

    public function sessionExists()
    {

        session_start();

        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
            return true;
        } else {
            return false;
        }
    }

}