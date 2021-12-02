<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/PedidoAgendamento.php';

class agendamentoController
{

    public function inserirAgendamento($email, $informacao, $imagem )
    {
        $agendamento = new Agendamento();
        $agendamento->setEmail($email);
        $agendamento->setInformacao($informacao);
        $agendamento->setImagem($imagem);
        
       
        
       
       
        $email = $agendamento->getemail();
        $informacao= $agendamento->getInformacao();
        $imagem= $agendamento->getImagem();
        
        
        
        

        $DaoAgendamento = new DaoAgendamento();
        return $DaoAgendamento->inserir($agendamento);
    }

    public function listarAgendamento(){
        $DaoAgendamento= new DaoAgendamento();
        return $DaoAgendamento->listarAgendamento();
    }


}