<?php

require_once 'C:/xampp/htdocs/tattoo/model/PedidoAgendamento.php';
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
require_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
require_once 'C:/xampp/htdocs/tattoo/model/usuario.php';


class DaoAgendamento{
 
    public function inserir(Agendamento $agendamento){
$conn = new Conecta();
$msg = new Mensagem();
$conecta = $conn->conectadb();

if($conecta){

try{

    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = $agendamento->getEmail();
    $informacao = $agendamento->getInformacao();
    $imagem = $agendamento->getImagem();
   
    
    
   
   
    $stmt = $conecta->prepare("insert into imagenstatoo values (null,?,?,?,'1')");
    $stmt->bindParam(1, $imagem);
    $stmt->bindParam(2, $informacao);
    $stmt->bindParam(3, $email);
    
    
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
    public function listarAgendamento()
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from imagenstatoo");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $agendamento = new Agendamento();
                            $agendamento->setIdimagem($linha->idimagem);
                            $agendamento->setImagem($linha->img);
                            $agendamento->setInformacao($linha->informacao);
                            $agendamento->setEmail($linha->email);
                            
                            
                           
                           

                            $lista[$a] = $agendamento;
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
    
    //lista os dados do cliente relativo ao pedido de orçamento
     public function listarPedidoOrcamentoDao($id)
    {
        $msg = new mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $agendamento = new Agendamento();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from imagenstatoo where idimagem = '$id' limit 1");
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {                            
                            $agendamento->setIdimagem($linha->idimagem);
                            $agendamento->setImagem($linha->img);
                            $agendamento->setInformacao($linha->informacao);
                            $agendamento->setEmail($linha->email);
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }

            $conn = null;
            return $agendamento;
        }
    }
}