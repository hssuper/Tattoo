<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = "";
}

$_SESSION['nr'] = "-1";
$_SESSION['confereNr'] = "-2";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agenda PHP</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rye&display=swap" rel="stylesheet">

</head>
<?php
include_once "include/menu.php";
?>

<body>


    <div class="container" style="font-family: 'Rye', cursive;">
        <div class="row">
            <div class="col"></div>

            <div class="col-lg-4">
                <h3>Efetuar Login</h3>
                <?php
                if ($_SESSION['msg'] != "") {
                    echo $_SESSION['msg'];
                    $_SESSION['msg'] = "";
                }
                ?>
                <form action="./controller/validaLogin.php" method="POST">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Informe seu Email">
                    </div>


                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe uma Senha">
                    </div>
        
    


                    <input type="submit" class="btn btn-primary" value="Entrar">
                </form>
                <br>
                
            </div>

            <div class="col"></div>
        </div>
    </div>

    <!-- fecha /container -->


    <footer id="myFooter" style="padding-top: 200px;">
        <div class="container">
            <div class="row" style="color: #808080">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="tatuagens.php"><img src="img/logo2.jfif" height="90px" width="90px"></h2>
                </div>
                <div class="col-sm-2">
                    <h5 style="color: #808080">Inicio</h5>
                    <ul>
                        <li><a style="color: #808080" href="home.php">Home</a></li>
                        <li><a style="color: #808080" href="tatuagens.php">tatuagens</a></li>
                        <li><a style="color: #808080" href="cadastro.php">cadastrar</a></li>
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
                    <a href="...">
                        <button type="button" class="btn btn-default">Contato</button>
                    </a>
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
    <!-- JavaScript customizado -->
    <script src="js/scripts.js"></script>
</body>

</html>