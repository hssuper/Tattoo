<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))){
    header("Location: ../sessionDestroy.php"); exit;
} 
require_once "C:/xampp/htdocs/tattoo/dao/DaoLogin.php";
require_once "C:/xampp/htdocs/tattoo/model/mensagem.php";
require_once "C:/xampp/htdocs/tattoo/model/cadastro.php";

if(isset($_POST)){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

}else{
    header("Location: ../sessionDestroy.php"); exit;
}

$daoLogin = new DaoLogin();

$resp = new Mensagem();
$resp = $daoLogin->validarLogin($email,$senha);

if(gettype($resp) == "object"){
       

        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];

        header("Location: ../adm.php");
        exit;

    }else{
        $_SESSION['msg'] =  "Usuario Inexistente!!!";
        if(isset($_SESSION['email'])){
            $_SESSION['senha'] = null;
        }
        header("Location: ../login.php");
        exit;
    }

    $_SESSION['msg'] = $resp;
    if(isset($_SESSION['email'])){
        $_SESSION['senha'] = null;
    }
    header("Location: ../login.php");
    exit;

ob_end_flush();