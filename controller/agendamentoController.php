<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';

class agendamentoController
{

    public function inserirAgendamento($email, $informacao, $img )
    {
        $agendamento = new Agendamento();
        $agendamento->setEmail($email);
        $agendamento->setInformacao($informacao);
       
       
        $email = $agendamento->getemail();
        $informacao= $agendamento->getInformacao();
        
        
        

        $DaoAgendamento = new DaoAgendamento();
        return $DaoAgendamento->inserir($agendamento);
    }
}