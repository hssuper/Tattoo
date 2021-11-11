<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="home.php"  class="navbar-brand">
       
           <img src="img/logo.jfif" height="80px" width="80px"> <span style="font-family: 'Rye', cursive;">Fabio Carvalho Estudio</span>
        </a>

        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-header">
                <ul class="navbar-nav">
                    <li><img src="img/home.png" height="30px" width="30px"><a href="home.php">Home</a></li>
                    <li><img src="img/maquina.png" height="30px" width="30px"><a href="tatuagens.php">Tatuagens</a></li>
                    <li><img src="img/cadastro.png" height="30px" width="30px"><a href="adm.php">Adm</a></li>
                    
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
                        
                            <?php
                        }
                        ?>
                    
                    
                
                <!-- Botão dropright dividido -->
<div class="btn-group dropright">
  <!-- <button type="button" class="btn btn-secondary">
  <img src="img/Menu.png" height="30px" width="30px"> -->
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only" >Dropright</span>
  </button>
  <div class="dropdown-menu" >
  <a class="dropdown-item" style="color:black" href="sessionDestroy.php">Sair</a>
    <a class="dropdown-item" style="color:black" href="caixa.php">Caixa</a>
    <a class="dropdown-item" style="color:black" href="#">Agendamento</a>
    <a class="dropdown-item" style="color:black" href="cadastro.php">cadastrar Cliente</a>
    <a class="dropdown-item" style="color:black" href="cadastroFuncionario.php">cadastrar Funcionario</a>
    
    <div class="dropdown-divider"></div>
  </div>
  <div class="dropdown-menu">
    <!-- Links do menu dropright -->
  </div>
</div>
                </ul>
            </div>
        </div> <!-- fecha /menu -->
    </div> <!-- fecha /container -->
</nav> <!-- fecha /barra de navegação -->