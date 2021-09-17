<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="home.php" class="navbar-brand">
            <span>Agenda de Contatos</span>
        </a>

        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-header">
                <ul class="navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="tatuagens.php">Buscar</a></li>
                    <li><a href="cadastro.php">Cadastrar</a></li>
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
                            <a href="login.php">Login</a>
                            <?php
                        }
                        ?>
                    </li>
                    <li><a href="cliente.php">Cliente</a></li>
                     <!-- Botão dropright dividido -->
<div class="btn-group dropright">
  <button type="button" class="btn btn-secondary">
  <img src="img/Menu.png" height="30px" width="30px">
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Dropright</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Sair</a>
    <a class="dropdown-item" href="#">Agendamento</a>
    <div class="dropdown-divider"></div>
  </div>
  <div class="dropdown-menu">
                </ul>
            </div>
        </div> <!-- fecha /menu -->
    </div> <!-- fecha /container -->
</nav> <!-- fecha /barra de navegação -->