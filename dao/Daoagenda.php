<?php

require_once 'C:/xampp/htdocs/tattoo/model/agenda.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
require_once 'C:/xampp/htdocs/tattoo/model/usuario.php';
require_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';


class DaoAgenda{
 
    public function inserir(Agenda $agenda){
$conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();

if($conecta){

try{

    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $desconto = $agenda->getDesconto();
    $dataAgendamento = $agenda->getDataAgendamento();
    $horaAgendamento = $agenda->getHoraAgandamento();
    $statusAgendamento = $agenda->getStatusAgendamento();
    $fkcliente = $agenda->getFkcliente();
    $fkorcamento = $agenda->getFkorcamento();

    $msg->setMsg("$desconto, $dataAgendamento, $horaAgendamento, $statusAgendamento, $fkcliente, $fkorcamento ");
    
    
   
   
    $stmt = $conecta->prepare("insert into agendamento values (null,?,?,?,?,?,?)");
    $stmt->bindParam(1, $desconto);
    $stmt->bindParam(2, $dataAgendamento);
    $stmt->bindParam(3, $horaAgendamento);
    $stmt->bindParam(4, $statusAgendamento);
    $stmt->bindParam(5, $fkcliente);
    $stmt->bindParam(6, $fkorcamento);
    
    
    
    
    $stmt->execute();
    $msg->setMsg("<p style='color: #d6bc71;'>"
    . "Dados Cadastrados com sucesso.</p>");
}catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }

} else {
    $msg->setMsg("<p style='color:red;'>Erro na conexão com o banco de dados.</p>");
}
$conn = null;
return $msg;

    }

    public function atualizarAgenda(Agenda $agenda)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idagendamento = $agenda->getIdagendamento();
            $desconto = $agenda->getDesconto();
            $dataAgendamento = $agenda->getDataAgendamento();
            $horaAgendamento = $agenda->getHoraAgandamento();
            $statusAgendamento = $agenda->getStatusAgendamento();
            $fkcliente = $agenda->getFkcliente();
            $fkorcamento = $agenda->getFkorcamento();


            try {
                $stmt = $conecta->prepare("update agendamento set "
                    . "desconto  = ?,"
                    . "dataAgendamento = ?,"
                    . "horaAgendamento= ?,"
                    . "statusAgendamento = ?,"
                    . "fkcliente = ?,"
                    . "fkorcamento = ?,"
                    . "idagendamento = ?"
                    . "where  = ?");
                $stmt->bindParam(1, $desconto);
                $stmt->bindParam(2, $dataAgendamento);
                $stmt->bindParam(3, $horaAgendamento);
                $stmt->bindParam(4, $statusAgendamento);
                $stmt->bindParam(5, $fkcliente);
                $stmt->bindParam(6, $fkorcamento);
                $stmt->bindParam(7, $idagendamento);

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


    public function excluirAgendaDAO($idPagamento)
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

    public function listarAgenda()
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from agendamento");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $agenda = new Agenda();
                            $agenda->setIdagendamento($linha->idagendamento);
                            $agenda->setDesconto($linha->desconto);
                            $agenda->setDataAgendamento($linha->dataAgendamento);
                            $agenda->setDataAgendamento($linha->horaAgendamento);
                            $agenda->setStatusAgendamento($linha->statusAgendamento);
                            $agenda->setFkcliente($linha->fkcliente);
                            $agenda->setFkorcamento($linha->fkorcamento);
                            
                            
                           
                           

                            $lista[$a] = $agenda;
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