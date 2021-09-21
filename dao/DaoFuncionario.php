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

        $nome = $cadastro->getNome();
        $contato = $cadastro->getContato();
        $email = $cadastro->getEmail();
        $senha = $cadastro->getSenha();
        $cpf = $cadastro->getCpf();
        $dtNasc = $cadastro->getDtNasc();
        $perfil = $cadastro->getPerfil();
        $msg->setMsg("$nome, $contato,$email,  $senha, $cpf, $dtNasc,$perfil");
        
        
        $stmt = $conecta->prepare("insert into funcionario values (null,?,?,?,?,?,?,'Funcionario')");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $contato);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $senha);
        $stmt->bindParam(5, $cpf);
        $stmt->bindParam(6, $dtNasc);
        $stmt->bindParam(7, $perfil);
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