<?php

require_once 'C:/xampp/htdocs/tattoo/model/Funcionario.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';


class DaoFuncionario{
 
    public function inserir(Funcionario $cadastro){
$conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();
 
if($conecta){
    try{
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nomeFuncionario = $cadastro->getNomeFuncionario();
        $contato = $cadastro->getContato();
        $senha = $cadastro->getSenha();
        $cpf = $cadastro->getCpf();
        $dtNasc = $cadastro->getDtNasc();
        $msg->setMsg("$nomeFuncionario, $contato,  $senha, $cpf, $dtNasc");
        
        
        $stmt = $conecta->prepare("insert into funcionario values (null,?,?,?,?,?)");
        $stmt->bindParam(1, $nomeFuncionario);
        $stmt->bindParam(2, $contato);
        $stmt->bindParam(3, $senha);
        $stmt->bindParam(4, $cpf);
        $stmt->bindParam(5, $dtNasc);
        $stmt->execute();
    
        $msg->setMsg("<p style='color:gree;'>Dados Cadastrados com sucesso.</p>");
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