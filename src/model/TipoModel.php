<?php

namespace src\model;

use src\common\Database;
use PDO;
use PDOException;
use src\model\CommonModel;

class TipoModel{

    private $conn;

    function __construct()
    {
        $this->conn =  Database::getInstance();
    }

    public function tipos()
    {
        $result = (Object)[];
        $model = new CommonModel();
        $tipos = $model->select('SELECT * FROM produto_tipo');

        return $tipos;
    }

    public function cadastrar(array $tipo) : bool
    {
        $query = "INSERT INTO produto_tipo (nome, valor_imposto) VALUES (:nome, :valor_imposto)";
        $retorno = $this->conn->prepare($query)->execute($tipo);
        return $retorno;
    }
}