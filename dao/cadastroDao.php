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


public function excluirUsuarioDAO($idcadastro)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("delete from cliente "
                    . "where idcliente = ?");
                $stmt->bindParam(1, $idcadastro);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }
    public function listarUsuarioDao()
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from cliente");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $cadastro = new Cadastro();
                            $cadastro->setIdcadastro($linha->idcliente);
                            $cadastro->setNome($linha->nome);
                            $cadastro->setContato($linha->contato);
                            $cadastro->setEmail($linha->email);
                            $cadastro->setCpf($linha->cpf);
                            $cadastro->setdtNasc($linha->dtNasc);

                            $lista[$a] = $cadastro;
                            $a++;
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }

            $conn = null;
            return $lista;
        }
    }

    public function pesquisarIdDao($idcadastro)
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $cadastro = new Cadastro();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->prepare("select * from cliente");
                $rs->bindParam(1, $idcadastro);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $cadastro->setIdcadastro($linha->idcliente);
                            $cadastro->setNome($linha->nome);
                            $cadastro->setContato($linha->contato);
                            $cadastro->setEmail($linha->email);
                            $cadastro->setCpf($linha->cpf);
                            $cadastro->setDtNasc($linha->dtNasc);
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
            $conn = null;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../tattoo/cadastro.php'\">";
        }
        return $cadastro;
    }
}
