<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['cpf']) OR empty($_POST['senha']))){
    header("Location: ../sessionDestroy.php"); exit;
} 
require_once "C:/xampp/htdocs/tattoo/dao/DaoLogin.php";
require_once "C:/xampp/htdocs/tattoo/model/mensagem.php";
require_once "C:/xampp/htdocs/tattoo/model/cadastro.php";

if(isset($_POST)){
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

}else{
    header("Location: ../sessionDestroy.php"); exit;
}

$daoLogin = new DaoLogin();

$resp = new Cadastro();
$resp = $daoLogin->validarLogin($cpf,$senha);

if(gettype($resp) == "object"){
    if(!isset($_SESSION['cpf'])){
        $_SESSION['cpfp'] = $resp->getCpf();
        $_SESSION['idp'] = $resp->getIdcadastro();
        $_SESSION['nomep'] = $resp->getNome();
        $_SESSION['contatop'] = $resp->getContato();
        $_SESSION['senhap'] = $resp->getSenha();

        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];

        header("Location: ../principal.php");
        exit;

    }else{
        $_SESSION['msg'] = $resp;
        if(isset($_SESSION['cpfp'])){
            $_SESSION['cpfp'] = null;
            $_SESSION['idp'] = null;
            $_SESSION['nomep'] = null;
            $_SESSION['contatop'] = null;
            $_SESSION['senhap'] = null;
        }
        header("Location: ../login.php");
        exit;
    }
}
ob_end_flush();