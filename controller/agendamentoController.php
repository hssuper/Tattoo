<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';

class agendamentoController
{

    public function inserirAgendamento($email, $informacao, $imagem,$fkUsuario )
    {
        $agendamento = new Agendamento();
        $agendamento->setEmail($email);
        $agendamento->setInformacao($informacao);
        $agendamento->setImagem($imagem);
        $agendamento->setFkUsuario($fkUsuario);
       
        
       
       
        $email = $agendamento->getemail();
        $informacao= $agendamento->getInformacao();
        $imagem= $agendamento->getImagem();
        $fkUsuario= $agendamento->getFkUsuario();
        
        
        

        $DaoAgendamento = new DaoAgendamento();
        return $DaoAgendamento->inserir($agendamento);
    }
}