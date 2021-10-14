<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';

class agendamentoController
{

    public function inserirAgendamento($email, $informacao, $imagem, $fkusuario )
    {
        $agendamento = new Agendamento();
        $agendamento->setEmail($email);
        $agendamento->setInformacao($informacao);
        $agendamento->setImagem($imagem);
        $agendamento->setUsuario($fkusuario);
        
       
       
        $email = $agendamento->getemail();
        $informacao= $agendamento->getInformacao();
        $imagem= $agendamento->getImagem();
        $fkusuario= $agendamento->getUsuario();
        
        
        

        $DaoAgendamento = new DaoAgendamento();
        return $DaoAgendamento->inserir($agendamento);
    }
}