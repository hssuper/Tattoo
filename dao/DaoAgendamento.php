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
    $usuario = $agendamento->getUsuario();
    
    
   
   
    $stmt = $conecta->prepare("insert into imagenstatoo values (null,?,?,?,?)");
    $stmt->bindParam(1, $imagem);
    $stmt->bindParam(2, $informacao);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $usuario);
    
    $stmt->execute();

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