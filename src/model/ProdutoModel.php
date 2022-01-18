<?php

namespace src\model;

use src\common\Database;
use PDO;
use PDOException;
use src\model\CommonModel;

class ProdutoModel{

    private $conn;

    function __construct()
    {
        $this->conn =  Database::getInstance();
    }

    public function produtos() : array
    {
      
        $result = (Object)[];
        $model = new CommonModel();
        $produtos = $model->select('SELECT prod.codigo, prod.nome, prdt.nome as tipo, prod.valor  , prdt.valor_imposto
        FROM produto prod 
        LEFT JOIN produto_tipo prdt on prdt.codigo = prod.codigo_tipo ');

        return $produtos;
    }

    public function produtoInfo(array $produto) : array
    {

        $itens = str_repeat("?,", count($produto)-1) . "?";

        $query = "SELECT prod.codigo, prod.nome, prdt.nome as tipo, prod.valor  , prdt.valor_imposto
        FROM produto prod 
        LEFT JOIN produto_tipo prdt on prdt.codigo = prod.codigo_tipo 
        WHERE prod.codigo IN ($itens)
        ";

        
        $execute = $this->conn->prepare($query);
        $execute->execute($produto);
        $retorno = $execute->fetchAll(PDO::FETCH_CLASS);

        return $retorno;
    }

    public function cadastrar(array $produto) : bool
    {
        $query = "INSERT INTO produto (nome, codigo_tipo, valor) VALUES (:nome, :codigo_tipo, :valor)";
        $retorno = $this->conn->prepare($query)->execute($produto);
        return $retorno;
    }
}