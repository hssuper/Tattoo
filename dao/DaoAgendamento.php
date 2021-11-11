<?php

require_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
require_once 'C:/xampp/htdocs/tattoo/model/usuario.php';


class DaoAgendamento{
 
    public function inserir(Agendamento $agendamento){
$conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();

if($conecta){

try{

    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = $agendamento->getEmail();
    $informacao = $agendamento->getInformacao();
    $imagem = $agendamento->getImagem();
   
    
    
   
   
    $stmt = $conecta->prepare("insert into imagenstatoo values (null,?,?,?,'1')");
    $stmt->bindParam(1, $imagem);
    $stmt->bindParam(2, $informacao);
    $stmt->bindParam(3, $email);
    
    
    $stmt->execute();
    $msg->setMsg("<p style='color: #d6bc71;'>"
    . "Dados Cadastrados com sucesso.</p>");
}catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }

} else {
    $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
}
$conn = null;
return $msg;

    }
}