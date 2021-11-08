<?php

require_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';


class DaoCadastro{
 
    public function inserir(Cadastro $cadastro){
$conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();

if($conecta){

try{

    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = $cadastro->getNome();
    $contato = $cadastro->getContato();
    $email = $cadastro->getEmail();
    $cpf = $cadastro->getCpf();
    $dtNasc = $cadastro->getDtNasc();
   
    $stmt = $conecta->prepare("insert into cliente values (null,?,?,?,?,?)");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $contato);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $cpf);
    $stmt->bindParam(5, $dtNasc);
    
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
    public function atualizarClienteDao(Cadastro $cadastro)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idcadastro = $cadastro->getIdCadastro();
            $nome = $cadastro->getNome();
            $contato = $cadastro->getContato();
            $email = $cadastro->getEmail();
            $cpf = $cadastro->getCpf();
            $dtNasc = $cadastro->getDtNasc();

            try {
                $stmt = $conecta->prepare("update usuario set "
                    . "nomeUsuario = ?,"
                    . "contato = ?, "
                    . "email = ?, "
                    . "cpf = ?, "
                    . "dtNasc = ?, "
                    . "where idcliente = ?");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $contato);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(5, $cpf);
                $stmt->bindParam(6, $dtNasc);
                $stmt->bindParam(8, $idcadastro);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                    . "Dados atualizados com sucesso</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }







}