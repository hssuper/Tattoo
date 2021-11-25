<?php
require_once 'C:/xampp/htdocs/tattoo/model/agenda.php';
include_once 'C:/xampp/htdocs/tattoo/model/usuario.php';
require_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';
require_once 'C:/xampp/htdocs/tattoo/dao/Daoagenda.php';

class agendaController
{

    public function inserirAgenda($desconto, $dataAgendamento, $horaAgendamento, $statusAgendamento, $fkcliente, $fkorcamento)
    {

        $agenda = new agenda();
        $agenda->setDesconto($desconto);
        $agenda->setDataAgendamento($dataAgendamento);
        $agenda->setHoraAgandamento($horaAgendamento);
        $agenda->setStatusAgendamento($statusAgendamento);
        $agenda->setFkcliente($fkcliente);
        $agenda->setFkorcamento($fkorcamento);
        


        $desconto = $agenda->getDesconto();
        $dataAgendamento = $agenda->getDataAgendamento();
        $horaAgendamento = $agenda->getHoraAgandamento();
        $statusAgendamento = $agenda->getStatusAgendamento();
        $fkcliente = $agenda->getFkcliente();
        $fkorcamento = $agenda->getFkorcamento();
        


        $DaoAgenda = new DaoAgenda();
        return $DaoAgenda->inserir($agenda);
         //return ("$nome, $contato,  $senha, $cpf, $dtNasc"); 
    }
    public function atualizarUsuarioController($idagendamento,$desconto, $dataAgendamento, $horaAgendamento, $statusAgendamento, $fkcliente, $fkorcamento)
    {
        $agenda =  new agenda();
        $agenda->setIdagendamento($idagendamento);
        $agenda->setDesconto($desconto);
        $agenda->setDataAgendamento($dataAgendamento);
        $agenda->setHoraAgandamento($horaAgendamento);
        $agenda->setStatusAgendamento($statusAgendamento);
        $agenda->setFkcliente($fkcliente);
        $agenda->setFkorcamento($fkorcamento);
        

        $DaoAgenda = new DaoAgenda();
        return $DaoAgenda->atualizarAgenda($agenda);




   }
   public function excluirAgenda($id){
    $DaoAgenda = new DaoAgenda();
    return $DaoAgenda->excluirAgendaDAO($id);
}
public function listarAgenda(){
    $DaoAgenda= new DaoAgenda();
    return $DaoAgenda->listarAgenda();
}
public function pesquisarId($id){
    $DaoAgenda = new DaoAgenda();
    return $DaoAgenda->pesquisarIdDao($id);
} 
}