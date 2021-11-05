<?php

require_once 'C:/xampp/htdocs/tattoo/model/usuario.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';


class DaoUsuario
{

    public function inserir(usuario $cadastro)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();

        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $nome = $cadastro->getNome();
                $contato = $cadastro->getContato();
                $email = $cadastro->getEmail();
                $senha = $cadastro->getSenha();
                $cpf = $cadastro->getCpf();
                $dtNasc = $cadastro->getDtNasc();
                $dtEft = $cadastro->getDtEft();
                $msg->setMsg(" $nome, $contato,$email,  $senha, $cpf, $dtNasc,$dtEft");


                $stmt = $conecta->prepare("insert into usuario values (null,?,?,?,?,?,?,?,'Funcionario')");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $contato);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $cpf);
                $stmt->bindParam(6, $dtNasc);
                $stmt->bindParam(7, $dtEft);
                $stmt->execute();

                $msg->setMsg("<p style='color:gree;'>Dados Cadastrados com sucesso.</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    public function atualizarUsuarioDao(Usuario $usuario)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idcadastro = $usuario->getIdCadastro();
            $nome = $usuario->getNome();
            $contato = $usuario->getContato();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $cpf = $usuario->getCpf();
            $dtNasc = $usuario->getDtNasc();
            $dtEft = $usuario->getDtEft();
            try {
                $stmt = $conecta->prepare("update usuario set "
                    . "nomeUsuario = ?,"
                    . "contato = ?, "
                    . "email = ?, "
                    . "senha = ?, "
                    . "cpf = ?, "
                    . "dtNasc = ?, "
                    . "dtEft = ?, "
                    . "perfil = 'Funcionario'"
                    . "where idUsuario = ?");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $contato);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $cpf);
                $stmt->bindParam(6, $dtNasc);
                $stmt->bindParam(7, $dtEft);
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
                $stmt = $conecta->prepare("delete from usuario "
                    . "where idUsuario = ?");
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
                $rs = $conecta->query("select * from usuario");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $usuario = new Usuario();
                            $usuario->setIdcadastro($linha->idUsuario);
                            $usuario->setNome($linha->nomeUsuario);
                            $usuario->setContato($linha->contato);
                            $usuario->setCpf($linha->cpf);
                            $usuario->setDtEft($linha->dtEft);

                            $lista[$a] = $usuario;
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
        $usuario = new Usuario();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->prepare("select * from usuario");
                $rs->bindParam(1, $idcadastro);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $usuario->setIdcadastro($linha->idUsuario);
                            $usuario->setNome($linha->nomeUsuario);
                            $usuario->setContato($linha->contato);
                            $usuario->setCpf($linha->cpf);
                            $usuario->setDtEft($linha->dtEft);
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
			 URL='../tattoo/cadastroFuncionario.php'\">";
        }
        return $usuario;
    }
}
