<?php

namespace src\model;

use src\common\Database;
use PDO;
use PDOException;

class CommonModel{

    private $conn;

    function __construct()
    {
        $this->conn =  Database::getInstance();
    }

     public function select( String $query = null, Array $params = []) : Array{
      
        $result = [];

        try{
            $execute = $this->conn->prepare($query);
            $execute->execute(); //$params
            $result = $execute->fetchAll(PDO::FETCH_CLASS);
            Database::close();
        }catch (PDOException $e){

        }

       
        return $result;
    }
}