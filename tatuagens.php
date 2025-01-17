<?php
include_once "include/menuadm.php";
include_once 'C:/xampp/htdocs/tattoo/controller/agendamentoController.php';
include_once 'C:/xampp/htdocs/tattoo/model/PedidoAgendamento.php';
include_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';


$msg = new mensagem();
$ag = new Agendamento();
$btEnviar = FALSE;
?>



<?php
include_once "include/menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="bootstrap/css/style1.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/lightbox.min.css">
    <script src="bootstrap/js/lightbox-plus-jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca - Agenda PHP</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rye&display=swap" rel="stylesheet">
</head>


<body class="img">


    <div class="container" style="font-family: 'Rye', cursive;">
        <div class="row">
            <div class="col-md-6">
                <h1 class="titulo">Agendamento De Tatuagens</h1>
                <?php
                if (isset($_POST['cadastrar'])) {
                    $email = trim($_POST['email']);
                    if ($email != "") {
                        $tell = $_POST['tell'];
                        $informacao = $_POST['informacao'];

                        if (isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != "") {
                            $target_dir = "img/";
                            $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                            $imagem = $target_file;
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                            if ($check !== false) {
                                $uploadOk = 1;
                            } else {
                                $msg->setMsg("File is not an image.");
                                $uploadOk = 0;
                            }

                            // Check if file already exists
                            if (file_exists($target_file)) {
                                $imagem = $target_file;
                                $uploadOk = 0;
                            }

                            // Check file size
                            if ($_FILES["imagem"]["size"] > 500000) {
                                $msg->setMsg("O arquivo excedeu o limite do tamanho permitido (500KB).");
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            if (
                                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "jfif" && $imageFileType != "gif"
                            ) {
                                $msg->setMsg("A extensão da imagem deve ser JPG, JPEG, PNG & "
                                    . "GIF.");
                                $uploadOk = 0;
                            }

                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                $msg->setMsg("A imagem não foi gravada.");
                                // if everything is ok, try to upload file
                            } else {
                                move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                            }
                        } else {
                            $imagem = "img/semImagem.jpg";
                        }




                        $ag = new agendamentoController();
                        unset($_POST['cadastrar']);
                        $msg = $ag->inserirAgendamento($email, $tell, $informacao, $imagem);
                        echo $msg->getMsg();
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                         URL='tatuagens.php'\">";
                    }
                }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <h3><label for="email">E-mail</label></h3>
                                <input type="text" class="form-control" name="email" placeholder="Informe seu E-Mail" value="<?php echo $ag->getEmail(); ?>">

                                
                                
                                <h3><label for="contato">Contato (WhatsApp)</label></h3>
                                <input type="text" class="form-control" id="tell" onkeypress="$(this).mask('(00) 0000-00009')" name="tell" placeholder="Informe seu contato" value="<?php echo $ag->getTell(); ?>">

                                <h3>Descrição</h3>
                                <textarea rows="8" cols="50" name="informacao" maxlength="20000" minlength="20" value="<?php echo $ag->getInformacao(); ?>"></textarea>
                                <h3>Envie a Imagem</h3>
                                <input name="imagem" type="file">

                            </div>
                        </div>

                    </div>


                    <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>


                </form>
            </div>
            <div class="col-md-6" name="gallery">
                <h1 class="titulo">Tatuagens</h1>
                <a href="patinhas.jpg" data-lightbox="mygallery"><img src="1231_Easy-Resize.com.jpg"></a>
                <a href="caveira.jpg" data-lightbox="mygallery"><img src="212sdasda_Easy-Resize.com.jpg"></a>
                <a href="guecha.jpg" data-lightbox="mygallery"><img src="wdaeq_Easy-Resize.com.jpg"></a>
                <a href="leaoB.jpg" data-lightbox="mygallery"><img src="tatuagensleao_Easy-Resize.com.jpg"></a>
                <a href="tempo.jpg" data-lightbox="mygallery"><img src="tatttttooo_Easy-Resize.com.jpg"></a>
                <a href="onça.jpg" data-lightbox="mygallery"><img src="tattoototo_Easy-Resize.com.jpg"></a>
                <a href="leaobraco.jpg" data-lightbox="mygallery"><img src="tattooo_Easy-Resize.com.jpg"></a>
                <a href="maoreP.jpg" data-lightbox="mygallery"><img src="sdqw12_Easy-Resize.com.jpg"></a>
                <a href="leaoC.jpg" data-lightbox="mygallery"><img src="dawdadw_Easy-Resize.com.jpg"></a>
                <a href="nintendo.jpg" data-lightbox="mygallery"><img src="213131_Easy-Resize.com.jpg"></a>
                <a href="leaoD.jpg" data-lightbox="mygallery"><img src="Tattoo1_Easy-Resize.com.jpg"></a>
                <a href="moto.jpg" data-lightbox="mygallery"><img src="tattoo_Easy-Resize.com.jpg"></a>
                <a href="rosa.jpg" data-lightbox="mygallery"><img src="dadad_Easy-Resize.com.jpg"></a>
            </div>
        </div>
    </div>
</body>
<footer id="myFooter" style="padding-top: 200px;">
    <div class="container">
        <div class="row" style="color: #808080">
            <div class="col-sm-3">
                <h2 class="logo"><a href="tatuagens.php"><img src="img/logo2.jfif" height="80px" width="80px"></h2>
            </div>
            <div class="col-sm-2">
                <h5 style="color: #808080">Início</h5>
                <ul>
                    <li><a style="color: #808080" href="home.php">Home</a></li>
                    <li><a style="color: #808080" href="tatuagens.php">tatuagens</a></li>
                    <li><a style="color: #808080" href="login.php">login</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5 style="color: #808080">Sobre-nós</h5>
                <ul>
                    <li><a style="color: #808080" href="">Informações da Empresa</a></li>
                    <li><a style="color: #808080" href="">Contato</a></li>

                </ul>
            </div>
            <div class="col-sm-2">
                <h5 style="color: #808080">Suporte</h5>
                <ul>
                    <li><a style="color: #808080" href="">FAQ</a></li>
                    <li><a style="color: #808080" href="">Telefones</a></li>
                    <li><a style="color: #808080" href="">Chat</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="social-networks">
                    <a style="color: #808080" href="" class="twitter"><i class="fa fa-twitter"></i></a>

                    <a style="color: #808080" href="..." class="facebook"><i class="fa fa-facebook"></i></a>

                    <a style="color: #808080" href="..." class="instagram"><i class="fa fa-instagram"></i></a>

                    <a style="color: #808080" href="..." class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2021 Copyright - FC Estudio</p>
    </div>
</footer>

<!-- jQuery (online) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- JavaScript customizado -->
<script src="js/scripts.js"></script>


</html>