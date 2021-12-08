<?php

class Conecta {

    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=id18087114_tattoo", 
                    "id18087114_usuariotattoo", "XJ/P|?w/@%k#ze4!");
        } catch (Exception $ex) {
            echo "<script>alert('Erro na conexão com o "
            . "banco de dados.')</script>";
        }   
        return $pdo;
    }
}