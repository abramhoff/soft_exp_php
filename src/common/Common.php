<?php
namespace src\common; 


class Common {

    public static function errorPage(String $msg, String $tipo) : Void
    {
        header("HTTP/1.1 $tipo"); 
        self::loadView('common/erro',['message'=> $msg]);
        
    }

    public static function loadView(String $view, Array $params = []) : Void
    {
        $params = (Object)$params;
        require_once ('../src/view/common/header.php'); 
        require_once ('../src/view/common/menu.php'); 
        require_once('../src/view/'.$view.'.php');
        require_once ('../src/view/common/footer.php'); 
    }

    public static function moneyFormat($value) : String
    {
        return   'R$' . number_format($value, 2, ',', '.');
    }
    
}