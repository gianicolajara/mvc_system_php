<?php

class Errors extends Controller
{

    public function __construct()
    {
        parent::__construct();
        error_log('Errors::construct -> dentro de error controller');
        $this->render('errors');
    }

}