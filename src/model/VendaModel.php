<?php

namespace src\model;

use src\common\Database;
use PDO;
use PDOException;
use src\model\CommonModel;

class VendaModel{

    private $conn;

    function __construct()
    {
        $this->conn =  Database::getInstance();
    }

    public function vendas() : array
    {
      
        $result = (Object)[];
        $model = new CommonModel();
        $vendas = $model->select('SELECT  * FROM  venda ');

        return $vendas;
    }

    public function cadastrar(array $venda) : int
    {
        $query = "INSERT INTO venda (total, imposto, data) VALUES (:total, :imposto, :data)";
        $retorno = $this->conn->prepare($query)->execute($venda);
        $id =$this->conn->lastInsertId();
        
        return (int)$id;
    }

    public function cadastrarVendaProduto(array $vendaProduto) : bool
    {
        $query = "INSERT INTO venda_produto (codigo_venda, codigo_produto, quantidade, imposto, valor) 
                  VALUES (:codigo_venda, :codigo_produto, :quantidade, :imposto, :valor)";
        $retorno = $this->conn->prepare($query)->execute($vendaProduto);
        
        return $retorno;
    }
}