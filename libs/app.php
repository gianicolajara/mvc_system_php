<?php

class App
{

    private $url;
    private $controller;

    public function __construct()
    {
        $this->url = $this->getUrl();
        $this->url = $this->codingUrl($this->url);
        $this->controllerUrl($this->url);
        $this->functionsUrl($this->url);
    }

    //obtenemos la url
    public function getUrl()
    {
        if (isset($_GET['url']) || !empty($_GET['url'])) {
            $url = $_GET['url'];
            return $url;
        }
    }

    //codificamos la url para que no tenga
    //nada al final de la cadena
    //y ademas separarlo en un array con los '/'
    public function codingUrl($url)
    {
        $url = trim($url, '/');
        $url = explode('/', $url);
        return $url;
    }

    //Llamamos al controlador correspondiente
    //al url
    public function controllerUrl($arrayUrl)
    {
        if (!isset($arrayUrl[0]) || empty($arrayUrl[0])) {
            $arrayUrl[0] = 'home';
        }

        $controllerName = $arrayUrl[0];
        $urlController = 'controllers/' . $controllerName . 'Controller.php';
        if (file_exists($urlController)) {
            require_once $urlController;
            $this->controller = new $controllerName();
            $this->controller->render($controllerName);
            $this->controller->loadModel($controllerName . 'Model');
        } else {
            $this->controller = new Errors();
            error_log('app::controllerUrl -> controller no existe');
        }

    }

    //Llamamos a la funcion correspondiente
    //si es que existe
    public function functionsUrl($arrayUrl)
    {
        $params = [];
        if (isset($arrayUrl[1]) || !empty($arrayUrl[1])) {
            if (method_exists($this->controller, $arrayUrl[1])) {
                $function = $arrayUrl[1];
                if (count($arrayUrl) > 2) {
                    for ($i = 2; $i < count($arrayUrl); $i++) {
                        array_push($params, $arrayUrl[$i]);
                    }
                    $this->controller->{$function}($params);
                } else {
                    $this->controller->{$function}();
                }
            } else {
                $this->controller = new Errors();

            }
        } else {
            error_log('app::functionUrl -> No hay funcion definida');
        }
    }
}