<?php

require_once 'C:/xampp/htdocs/tattoo/model/agendamento.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
require_once 'C:/xampp/htdocs/tattoo/model/caixa.php';

class DaoCaixa
{
    public function inserir(Caixa $caixa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();

        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $frPag = $caixa->getFrPag();
                $NrPar  = $caixa->getNrPar();
                $dtPag = $caixa->getDtPag();


                $stmt = $conecta->prepare("insert into pagamento values (null,?,?,?,'1')");
                $stmt->bindParam(1, $frPag);
                $stmt->bindParam(2, $NrPar);
                $stmt->bindParam(3, $dtPag);

                $stmt->execute();

                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados Cadastrados com sucesso.</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {

            $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    public function atualizarCaixaDao(Caixa $caixa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idPagamento = $caixa->getIdPagamento();
            $frPag = $caixa->getFrPag();
            $NrPar = $caixa->getNrPar();
            $dtPag = $caixa->getDtPag();



            try {
                $stmt = $conecta->prepare("update pagamento set "
                    . "formaPgto  = ?,"
                    . "nrParcelas = ?,"
                    . "dataPagamento = ?,"
                    . "fkagendamento = '1'"
                    . "where idpagamento = ?");
                $stmt->bindParam(1, $frPag);
                $stmt->bindParam(2, $NrPar);
                $stmt->bindParam(3, $dtPag);
                $stmt->bindParam(4, $idPagamento);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
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


    public function excluirClienteDAO($idPagamento)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("delete from pagamento "
                    . "where idPagamento = ?");
                $stmt->bindParam(1, $idPagamento);
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

    public function listarCaixaDao()
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from pagamento");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                            $caixa = new Caixa();
                            $caixa->setIdPagamento($linha->idpagamento);
                            $caixa->setFrPag($linha->formaPgto);
                            $caixa->setNrPar($linha->nrParcelas);
                            $caixa->setDtPag($linha->dataPagamento);
                            

                            $lista[$a] = $caixa;
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
        $caixa = new Caixa();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->prepare("select * from pagamento");
                $rs->bindParam(1, $idcadastro);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $caixa->setIdPagamento($linha->idpagamento);
                            $caixa->setFrPag($linha->formaPgto);
                            $caixa->setNrPar($linha->nrParcelas);
                            $caixa->setDtPag($linha->dataPagamento);
                            
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
			 URL='../tattoo/caixa.php'\">";
        }
        return $caixa;
    }
}
