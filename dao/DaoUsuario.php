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
                $msg->setMsg("$nome, $contato,$email,  $senha, $cpf, $dtNasc,$dtEft");


                $stmt = $conecta->prepare("insert into usuario values (null,?,?,?,?,?,?,?)");
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
            $idCadastro = $usuario->getIdCadastro();
            $nome = $usuario->getNome();
            $contato = $usuario->getContato();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $cpf = $usuario->getCpf();
            $dtNasc = $usuario->getDtNasc();
            $dtEft = $usuario->getDtEft();


            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //processo para pegar o idendereco da tabela endereco, conforme 
                //o cep, o logradouro e o complemento informado.
                $st = $conecta->prepare("select idUsuario "
                    . "from usuario where nome = ? and "
                    . "contato = ? and email = ? limit 1");
                $st->bindParam(1, $nome);
                $st->bindParam(2, $contato);
                $st->bindParam(3, $email);
                
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                        //$msg->setMsg("".$st->rowCount());
                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $fkEnd = $linha->idendereco;
                        }
                        //$msg->setMsg("$fkEnd");
                    } else {
                        $st2 = $conecta->prepare("insert into "
                            . "usuario values (null,?,?,?,?,?,?)");
                        $st2->bindParam(1, $contato);
                        $st2->bindParam(2, $email);
                        $st2->bindParam(3, $senha);
                        $st2->bindParam(4, $cpf);
                        $st2->bindParam(5, $dtNasc);
                        $st2->bindParam(6, $dtEft);
                        $st2->execute();

                        $st3 = $conecta->prepare("select idUsuario "
                            . "from endereco where cep = ? and "
                            . "logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $nome);
                        $st3->bindParam(2, $contato);
                        $st3->bindParam(3, $email);
                        if ($st3->execute()) {
                            if ($st3->rowCount() > 0) {
                                $linha = $st3->fetch(PDO::FETCH_OBJ);
                                
                            }
                        }
                    }
                }
                $stmt = $conecta->prepare("update usuario set "
                    . "nome = ?,"
                    . "contato = ?, "
                    . "email = ?, "
                    . "senha = ?, "
                    . "cpf = ?, "
                    . "dtNasc = ?, "
                    . "dtEft = ?, "
                    . "where idcadastro = ?");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $contato);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $cpf);
                $stmt->bindParam(6, $dtNasc);
                $stmt->bindParam(7, $dtEft);
                $stmt->bindParam(8, $idCadastro);
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
    public function excluirUsuarioDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("delete from usuario "
                    . "where idUsuario = ?");
                $stmt->bindParam(1, $id);
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

}
