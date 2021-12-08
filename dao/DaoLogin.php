<?php
require_once "C:/xampp/htdocs/tattoo/bd/bd.php";
require_once "C:/xampp/htdocs/tattoo/model/mensagem.php";
require_once "C:/xampp/htdocs/tattoo/model/usuario.php";

class DaoLogin
{
    public function validarLogin($email, $senha)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $cadastro = new Cadastro();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $st = $conecta->prepare("select * from usuario where email = ? and senha = ? limit 1");
                $st->bindParam(1, $email);
                $st->bindParam(2, $senha);
                if($st->execute()){

                    if ($st->rowCount() > 0) {

                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $cadastro->setEmail($linha->email);
                            $cadastro->setSenha($linha->senha);
                        }
                        return $cadastro;
                    } else {
                        return "<p style='color: red;'>"
                            . "Usuário inexistente.</p>";
                    }
                }
               
            } catch (PDOException $ex) {

                return "<p style='color: red;'>Não foi possível acessar os dados!</p>";
            }
        } else {
            return "<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>";
        }
    }
}
