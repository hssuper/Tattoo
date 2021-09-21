<?php

require_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';


class DaoCadastro
{

    public function inserir(Cadastro $cadastro)
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

                $stmt = $conecta->prepare("insert into usuario values (null,?,?,?,?,?,?,'cliente')");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $contato);
                $stmt->bindParam(3, $senha);
                $stmt->bindParam(4, $cpf);
                $stmt->bindParam(5, $dtNasc);
                $stmt->bindParam(6, $email);
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
}
