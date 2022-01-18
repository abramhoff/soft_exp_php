<?php

namespace src\controller;

use src\common\Common;
use src\model\TipoModel;

class TipoProduto{

    private $TipoModel;

    function __construct(){
        $this->TipoModel =  new TipoModel();
    }
    public function index() : void
    {
        $tipos = $this->TipoModel->tipos();
        Common::loadView('tipo',['tipos' => $tipos]);
    }

    public function novoTipo() : void
    {
        Common::loadView('tipo_novo');
    }

    public function cadastrarTipo() : void
    {
        $novoTipo = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
            'valor_imposto'=> str_replace(',','.',filter_input(INPUT_POST, 'valor_imposto',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_THOUSAND))
        ];

        $retorno = $this->TipoModel->cadastrar($novoTipo);

        if($retorno === true){
            header('Location: \TipoProduto');
        }else{
            Common::errorPage('Erro ao cadastrar', '400 Bad Request');
        }
       
    }

}