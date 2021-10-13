<!DOCTYPE html>
<html>
<head>
<body>
    

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

$extensao = strtolower(end(explode('.', $_FILES['imagem'])));
if(array_search($extensao, $_UP['extensoes']) === false){
    $query = mysqli_query($conn,"INSERT INTO orcamento){
        imagem,
        created)VALUES('imagem',NOW())");
        echo "<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/tattoo/tatuagens.php'>
        <script type=\"text/javascript\">
        alert(\"A imagem Não foi Cadastrada favor, envie arquivos com as seguintes extensões: png, jpg, jpeg, gif.
        As informações do carrosel foram cadastradas.\");
        </script>
        ";
    }
    else if($_UP['tamanho'] < $_FILES['imagem']['size'] ){
        echo "<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/tattoo/tatuagens.php'>
        <script type=\"text/javascript\">
        alert(\"Arquivo muito grande.\");
        </script>
        ";
    }
    else{
        if($_UP['renomeia'] == true){
            $imagem_final = time().'.jpg';
        }else{
            $imagem_final = $_FILES['imagem']['imagem'];
        }
        if(move_uploaded_file($_FILES['imagem']['tmp_imagem'],$_UP['imagens']. $imagem_final )){
            $query = mysqli_query($conn,"INSERT INTO orcamento){
                imagem,
                created)VALUES('imagem_final',NOW())");
                echo "<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/tattoo/tatuagens.php'>
                <script type=\"text/javascript\">
                alert(\"A imagem foi cadastrada.\");
                </script>
                ";
        }else{
            echo "<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/tattoo/tatuagens.php'>
                <script type=\"text/javascript\">
                alert(\"A imagem não foi cadastrada.\");
                </script>
                ";
        }
    }

?>
</head>
</body>
</html>