<?php

namespace src\controller;

use src\common\Common;
use src\model\ProdutoModel;
use src\model\TipoModel;

class Produto{

    private $produtoModel;

    function __construct(){
        $this->produtoModel =  new ProdutoModel();
    }
    public function index() : void
    {
        $produtos = $this->produtoModel->produtos();
        Common::loadView('produto',['produtos' => $produtos]);
    }

    public function novoProduto() : void
    {
        $model = new TipoModel();
        $tipos = $model->tipos();
        Common::loadView('produto_novo',['tipos' => $tipos]);
    }

    public function cadastrarProduto() : void
    {
        $novoProduto = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
            'codigo_tipo'=> (int)filter_input(INPUT_POST, 'produto_tipo', FILTER_SANITIZE_NUMBER_INT),
            'valor'=> str_replace(',','.',filter_input(INPUT_POST, 'valor',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_THOUSAND))
        ];

        $retorno = $this->produtoModel->cadastrar($novoProduto);

        if($retorno === true){
            header('Location: \Produto');
        }else{
            Common::errorPage('Erro ao cadastrar', '400 Bad Request');
        }
       
    }

}