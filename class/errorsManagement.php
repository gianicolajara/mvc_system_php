<?php

class ErrorsManagement
{
    //tipo_controlador_informacion
    //errors
    const ERROR_LOGIN_WRONG_USER = "5cce9c41a338c1df50ff1d38aa35bd3a";
    const ERROR_LOGIN_NEED_DATA = "5cce9c41a338c1df50ff1d38aa25bd3a";
    const ERROR_REGISTER_INVALID_USER = "5cce9c41a338c1df50ff1d38aa211sd";
    const ERROR_REGISTER_DATA_WRONG = "5cce9c41a338c1df50ff112312sadsa4";
    const ERROR_POST_NOTSEND = "5cce9c41a231fdg45450ff112312sadsa4";

    //success
    const SUCCESS_REGISTER_USER_SAVE = "5cce9c41a338c1df50ff1d38aa25bd5d";
    const SUCCESS_LOGIN_USER = "5cce9c41a338c1df50ff1d3812312sdsa";
    const SUCCESS_POST_SEND = "5cce9c41a3313sady550ff1d3812312sdsa";

    private $error_list = [];

    public function __construct()
    {
        $this->error_list = [
            $this::ERROR_LOGIN_WRONG_USER => 'Usuario y/o Contraseña incorrectos',
            $this::ERROR_LOGIN_NEED_DATA => 'Debe ingresar los datos correctamente',
            $this::ERROR_REGISTER_INVALID_USER => 'Este usuario ya existe',
            $this::ERROR_REGISTER_DATA_WRONG => 'Debe ingresar los campos correctamente',
            $this::ERROR_POST_NOTSEND => 'Hubo un problema enviando el post',
            $this::SUCCESS_REGISTER_USER_SAVE => 'Usuario registrado con exito',
            $this::SUCCESS_LOGIN_USER => 'Usuario logeado correctamente',
            $this::SUCCESS_POST_SEND => 'Post enviado correctamente',
        ];
    }

    public function obtainError($hash)
    {
        return $this->error_list[$hash];
    }

    public function keyExist($key)
    {
        if (array_key_exists($key, $this->error_list)) {
            return true;
        } else {
            return false;
        }
    }
}