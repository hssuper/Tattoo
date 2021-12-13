<?php

include_once 'C:/xampp/htdocs/tattoo/dao/DaoOrcamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/orcamento.php';

class orcamentocontroller {



    public function inserirOrcamento($orcamento, $data, $hora,$email, $fkusuario, $fkImagem)
    {

        $Orcamento = new Orcamento();
        $Orcamento->setOrcamento($orcamento);
        $Orcamento->setData($data);
        $Orcamento->setHora($hora);
        $Orcamento->setEmail($email);
        $Orcamento->setFkusuario($fkusuario);
        $Orcamento->setFkImagem($fkImagem);
        


        $orcamento = $Orcamento->getOrcamento();
        $data = $Orcamento->getData();
        $hora = $Orcamento->getHora();
        $email = $Orcamento->getEmail();
        $fkusuario = $Orcamento->getFkusuario();
        $fkImagem = $Orcamento->getFkImagem();
        


        $orcamentoDao = new DaoOrcamento();
        return $orcamentoDao->inserir($Orcamento);
         //return ("$nome, $contato,  $senha, $cpf, $dtNasc"); 
    }
    public function listarOrcamento(){
        $daoOrcamento = new DaoOrcamento();
        return $daoOrcamento->listarOrcamentoDAO();
    } 
    



























}