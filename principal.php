<?php
ob_start();
session_start();
if((!isset($_SESSION['cpfp']) || !isset($_SESSION['nomep'])) ||
!isset($_SESSION['contatop']) || !isset($_SESSION['senhap']) ||
($_SESSION['nr'] != $_SESSION['confereNr'])) {
    header("Location: sessionDestroy.php");
    exit;
}  

include_once './controller/cadastroController.php';
include_once './model/cadastro.php';
include_once './model/mensagem.php';

$msg = new Mensagem();
$cc = new Cadastro();
$btEnviar = FALSE;
?>

