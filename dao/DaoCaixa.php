<?php

require_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
require_once 'C:/xampp/htdocs/tattoo/model/caixa.php';

class DaoCaixa {
    public function inserir (Caixa $caixa){
        $conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();

if($conecta){
    try{
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $NrPar  = $caixa->getNrPar();
     $dtPag = $caixa->getDtPag();
     $frPag = $caixa->getFrPag();
     
     $stmt = $conecta->prepare("insert into caixa values (null,?,?,?,'1')");
     $stmt->bindParam(1, $NrPar);
     $stmt->bindParam(2, $dtPag);
     $stmt->bindParam(3, $frPag);


    }catch (PDOException $ex) {
        $msg->setMsg(var_dump($ex->errorInfo));
    }
}else {
 
    $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
}
$conn = null;
return $msg;
    }
}