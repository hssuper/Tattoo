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
            $email = $Orcamento->getEmail();
            $fkusuario = $Orcamento->getFkusuario();
            $fkImagem = $Orcamento->getFkImagem();
            
            $msg->setMsg(" $orcamento, $data,$hora, $email, $fkusuario, $fkImagem");


            $stmt = $conecta->prepare("insert into orcamento values (null,?,?,?,?,?)");
            $stmt->bindParam(1, $orcamento);
            $stmt->bindParam(2, $data);
            $stmt->bindParam(3, $hora);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $fkusuario);
            $stmt->bindParam(6, $fkImagem);
            
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

    public function listarOrcamentoDAO()
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from orcamento");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                            $orcamento = new Orcamento();
                            $orcamento->setIdorcamento($linha->idorcamento);
                            $orcamento->setOrcamento($linha->orcamento);
                            $orcamento->setData($linha->data);
                            $orcamento->setHora($linha->hora);
                            $orcamento->setEmail($linha->email);
                            $orcamento->setFkusuario($linha->fkusuario);
                            $orcamento->setFkImagem($linha->fkImagem);
                            

                            $lista[$a] = $orcamento;
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


}

















