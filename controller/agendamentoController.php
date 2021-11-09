<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';

class agendamentoController
{

    public function inserirAgendamento($email, $informacao, $imagem, $usuario )
    {
        $agendamento = new Agendamento();
        $agendamento->setEmail($email);
        $agendamento->setInformacao($informacao);
        $agendamento->setImagem($imagem);
        $agendamento->setUsuario($usuario);
        
       
       
        $email = $agendamento->getemail();
        $informacao= $agendamento->getInformacao();
        $imagem= $agendamento->getImagem();
        $usuario= $agendamento->getUsuario();
        
        
        

        $DaoAgendamento = new DaoAgendamento();
        return $DaoAgendamento->inserir($agendamento);
    }
}