<?php
require_once 'C:/xampp/htdocs/tattoo/bd/bd.php';
$imagem = $_FILES['imagem']['imagem'];
$_UP['pasta'] = 'imagens/';

$_UP['tamanho'] = 1024*1024*100;
$_UP['extensoes'] = array('png','jpg','jpeg','gif');
$_UP['renomeia'] = false;

$_UP['erros'] [0] = 'Não houve erro' ;
$_UP['erros'] [1] = 'Tamanho do arquivo maior que 5 Mega ' ;
$_UP['erros'] [2] = 'O arquivo ultrapassa o tamanho' ;
$_UP['erros'] [3] = 'Upload do arquivo foi feito parcialmente' ;
$_UP['erros'] [4] = 'Não Foi feito o Upload do arquivo' ;

if($_FILES['imagem']['error'] != 0){
    die("Não foi possivel fazer o Upload, erro: ".$_UP['erros'][$_FILES['imagem']['error']]);
    exit;
}
?>