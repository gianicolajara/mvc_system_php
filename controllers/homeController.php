<?php

class Home extends Controller
{

    public function __construct()
    {
        parent::__construct();
        error_log('Home::construct -> dentro de home controller');
    }

}