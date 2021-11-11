<?php

require_once 'C:/xampp/htdocs/tattoo/model/orcamento.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';

class DaoOrcamento{

public function inserir (Orcamento $Orcamento){

    $conn = new Conecta();
    $msg = new Mensagem();
    $conecta = $conn->conectadb();

    if ($conecta) {
        try {
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $orcamento = $Orcamento->getOrcamento();
            $data = $Orcamento->getData();
            $hora = $Orcamento->getHora();
            $fkusuario = $Orcamento->getFkusuario();
            $fkImagem = $Orcamento->getFkImagem();
            
            $msg->setMsg(" $orcamento, $data,$hora,  $fkusuario, $fkImagem");


            $stmt = $conecta->prepare("insert into orcamento values (null,?,?,?,?,?)");
            $stmt->bindParam(1, $orcamento);
            $stmt->bindParam(2, $data);
            $stmt->bindParam(3, $hora);
            $stmt->bindParam(4, $fkusuario);
            $stmt->bindParam(5, $fkImagem);
            
            $stmt->execute();

            $msg->setMsg("<p style='color: #d6bc71;'>Dados Cadastrados com sucesso.</p>");
        } catch (PDOException $ex) {
            $msg->setMsg(var_dump($ex->errorInfo));
        }
    } else {
        $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
    }
    $conn = null;
    return $msg;


    


}

















}