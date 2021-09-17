

<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="home.php"  class="navbar-brand">
       
           <img src="img/logo.jfif" height="80px" width="80px"> <span style="font-family: 'Rye', cursive;">Fabio Carvalho Estudio</span>
        </a>

        <div class="collapse navbar-collapse"  id="menu" >
            <div class="navbar-header">
                <ul class="navbar-nav" style="font-family: 'Rye', cursive;">
                    <li><img src="img/home.png" height="30px" width="30px"><a href="home.php">Home</a></li>
                    <li><img src="img/maquina.png" height="30px" width="30px"><a href="tatuagens.php">tatuagens</a></li>
                    <li><img src="img/cadastro.png" height="30px" width="30px"><a href="cadastro.php" >Cadastrar</a></li>
                    <li>
                        <?php
                        if (isset($_SESSION['id'])) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?= $_SESSION['nome']; ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" id="logout" onclick="efetuarLogout()">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <?php
                        } else {
                            ?>
                             <li><img src="img/perfil.png" height="30px" width="30px"><a href="login.php"  >Login</a> </li>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div> <!-- fecha /menu -->
    </div> <!-- fecha /container -->
</nav> <!-- fecha /barra de navegação -->