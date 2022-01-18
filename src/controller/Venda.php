<?php

namespace src\controller;

use src\common\Common;

use src\model\ProdutoModel;
use src\model\VendaModel;

class Venda{

    private $produtoModel;
    private $vendaModel;

    function __construct(){
        $this->produtoModel =  new ProdutoModel();
        $this->vendaModel =  new VendaModel();
    }

    public function index() : void
    {
        $vendas = $this->vendaModel->vendas();
        Common::loadView('venda',['vendas' => $vendas]);
    }

    public function novaVenda() : void
    {
        $produtos = $this->produtoModel->produtos();
        Common::loadView('venda_novo',['produtos' => $produtos]);
    }

    public function cadastrarVenda() : void
    {
        $novaVenda = [
            'codigo_produto'=> filter_input(INPUT_POST, 'codigo_produto',  FILTER_DEFAULT, FILTER_REQUIRE_ARRAY),
            'quantidade'=> filter_input(INPUT_POST, 'quantidade',  FILTER_DEFAULT, FILTER_REQUIRE_ARRAY),
        ];

        $produtosSelecionados = $this->produtoModel->produtoInfo($novaVenda['codigo_produto'] );

        foreach($produtosSelecionados as $produtoSelecionado){
            $produto[$produtoSelecionado->codigo] = $produtoSelecionado;
        }
       
        
        $total = 0;
        $total_imposto = 0;
        foreach($novaVenda['codigo_produto'] as $key => $codigoProduto){
            $total_calculo = ($produto[$novaVenda['codigo_produto'][$key]]->valor * $novaVenda['quantidade'][$key]);
            $total = $total_calculo + $total;

            $total_imposto_calculo = (($total_calculo * $produto[$novaVenda['codigo_produto'][$key]]->valor_imposto) / 100);
            $total_imposto = $total_imposto_calculo + $total_imposto;

            $vendaProdutos[] = [
                'codigo_produto'=> $novaVenda['codigo_produto'][$key],
                'quantidade' => $novaVenda['quantidade'][$key],
                'valor' => $total_calculo ,
                'imposto' => $total_imposto_calculo
            ];
        }

        $dataVenda = [
            'total' => $total,
            'imposto' => round($total_imposto,2),
            'data' => date('Y-m-d')
        ];

        $retornoId = $this->vendaModel->cadastrar($dataVenda);

        if($retornoId){
            $retornos = [];
            foreach($vendaProdutos as $vendaProduto){
                $dataVendaProduto = [
                    'codigo_venda' => $retornoId,
                    'codigo_produto'=> $vendaProduto['codigo_produto'],
                    'quantidade' => $vendaProduto['quantidade'],
                    'imposto' => $vendaProduto['imposto'],
                    'valor' => $vendaProduto['valor']
                ];
                $retorno = $this->vendaModel->cadastrarVendaProduto($dataVendaProduto);
                 
                $retornos[] = $retorno;
                 
            }
            if(!in_array(false,$retornos)){
                header('Location: \Venda');
            }else{
                Common::errorPage('Erro ao cadastrar produto da venda.', '400 Bad Request');
            }
             
        }else{
            Common::errorPage('Erro ao cadastrar venda.', '400 Bad Request');
        }
    }
}