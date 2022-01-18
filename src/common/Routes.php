<?php

namespace src\common;

use src\common\Common;

class Routes {

    function __construct()
    { 
        $requestUri = $_SERVER['REQUEST_URI'];
        $parseRequest = explode('/', $requestUri);
        $controller = !empty($parseRequest[1]) ? $parseRequest[1] : 'Home';
        $method =!empty($parseRequest[2]) ? $parseRequest[2] : 'index';

        $pathController = 'src\\controller\\'.$controller;

        if (class_exists($pathController)) {
            $instanceController = new $pathController();
            if(method_exists($instanceController, $method)){
                $instanceController->$method();
            }else{
                Common::errorPage('Rota não existe.','404 Not Found');
            }
        }else{
            Common::errorPage('Rota não existe.', '404 Not Found');
        }

        
    }
}