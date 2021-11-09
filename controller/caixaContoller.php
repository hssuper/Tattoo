<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoCaixa.php';
include_once 'C:/xampp/htdocs/tattoo/model/caixa.php';

class caixaController
{

    public function inserirCaixa($NrPar, $dtPag, $frPag)
    {
        $caixa = new Caixa();
        $caixa->setNrPar($NrPar);
        $caixa->setDtPag($dtPag);
        $caixa->setFrPag($frPag);
        
        $NrPar = $caixa->getNrPar();
        $dtPag= $caixa->getDtPag();
        $frPag= $caixa->getFrPag();
        
        $DaoCaixa = new DaoCaixa();
        return $DaoCaixa->inserir($caixa);

    }
     public function listarCaixa(){
        $daoCaixa = new DaoCaixa();
        return $daoCaixa->listarCaixaDAO();
    } 
    public function atualizarCaixaController( $idPagamento, $NrPar, $dtPag, $frPag){
        $caixa =  new Caixa();
        $caixa->setIdPagamento($idPagamento);
        $caixa->setNrPar($NrPar);
        $caixa->setDtPag($dtPag);
        $caixa->setFrPag($frPag);
       

        $daoCaixa = new DaoCaixa();
        return $daoCaixa->atualizarCaixaDao($caixa);




   }
   public function excluirCaixa($id){
    $daoCaixa = new DaoCaixa();
    return $daoCaixa->excluirClienteDAO($id);
}

public function pesquisarId($id){
    $daoCaixa = new Daocaixa();
    return $daoCaixa->pesquisarIdDao($id);
} 
}