<?php
include_once "include/menuadm.php";
include_once 'C:/xampp/htdocs/tattoo/controller/usuarioController.php';
include_once 'C:/xampp/htdocs/tattoo/model/usuario.php';
include_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
$msg = new mensagem();
$pu = new usuario();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro </title>
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
        <div class="col"></div>
        <div class="col-lg-offset-8"  >
                <h3>Cadastro de Funcionarios</h3>
                <?php
                if (isset($_POST['cadastrarFunc'])) {
                    $nome = $_POST['nome'];
                    if ($nome != "") {
                        $contato = $_POST['contato'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $cpf = $_POST['cpf'];
                        $dtNasc = $_POST['dtNasc'];
                        $dtEft = $_POST['dtEft'];
                        unset($_POST['cadastrarFunc']);
                        $cc = new cadastroFuncionarioController();
                        //echo "$nome, $contato,  $senha, $cpf, $dtNasc";
                        $msg = $cc->inserirCadastro($nome, $contato, $email, $senha, $cpf, $dtNasc, $dtEft);
                        echo $msg->getMsg();
                          echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastroFuncionario.php'\">";
                    }
                }

                if (isset($_POST['atualizarUsuario'])) {
                    $idcadastro = trim($_GET['id']);
                    if ($idcadastro != "") {
                        $nome = $_POST['nome'];
                        $contato = $_POST['contato'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $cpf = $_POST['cpf'];
                        $dtNasc = $_POST['dtNasc'];
                        $dtEft = $_POST['dtEft'];

                        $ct =  new cadastroFuncionarioController();
                        unset($_POST['atualizarUsuario']);
                        $msg = $ct->atualizarUsuarioController($idcadastro, $nome, $contato, $email, $senha, $cpf, $dtNasc, $dtEft);
                        echo $msg->getMsg();
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastroFuncionario.php'\">";
                    }
                }

                if (isset($_POST['excluir'])) {
                    if ($pu != null) {
                        $id = $_POST['id'];

                        $ct = new cadastroFuncionarioController();
                   unset($_POST['excluir']);
                        $msg = $ct->excluirUsuario($id);
                        echo $msg->getMsg();
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                    URL='cadastroFuncionario.php'\">";
                  }
               }
               if (isset($_POST['limpar'])) {
                $pu = null;
                unset($_GET['id']);
                header("Location: cadastroFuncionario.php");
            }
                if (isset($_GET['id'])) {
                 $btEnviar = TRUE;
                  $btAtualizar = TRUE;
                    $btExcluir = TRUE;
                   $idcadastro = $_GET['id'];
                   $ct = new cadastroFuncionarioController();
                   $pu = $ct->pesquisarId($idcadastro);
                }
                ?>


                <form method="post" action="">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Informe seu Nome" value="<?php echo $pu->getNome(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="contato">Contato (WhatsApp)</label>
                        <input type="text" class="form-control" id="contato" name="contato" placeholder="Informe seu contato" value="<?php echo $pu->getContato(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Informe seu E-Mail" value="<?php echo $pu->getEmail(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Informe uma Senha" value="<?php echo $pu->getSenha(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="cpf">Cpf</label>
                        <input type="text" name="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" class="form-control" id="cpf" placeholder="Informe seu cpf" value="<?php echo $pu->getCpf(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dtNasc">Data De Nascimento</label>
                        <input type="date" name="dtNasc" class="form-control" id="dtNasc" placeholder="Informe sua Data de Nascimento" value="<?php echo $pu->getDtNasc(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dtNasc">Data De Efetivação</label>
                        <input type="date" name="dtEft" class="form-control" placeholder="Informe sua Data de Efetivação" value="<?php echo $pu->getDtEft(); ?>">
                    </div>


                    <input type="submit" name="cadastrarFunc" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled = 'disabled'"; ?>>

                    <input type="submit" name="atualizarUsuario" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == false) echo "disabled = 'disabled'"; ?>>
                    <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == false) echo "disabled = 'disabled'"; ?>>
                        Excluir
                    </button>

                     


                    <table class="table table-dark m-2" >
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nome Funcionarios</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Cpf</th>
                                <th scope="col">Data Efetivação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                                 if (isset($_SESSION['pesquisa']) && $_SESSION['pesquisa'] != "") {
                                    $pesquisa = $_SESSION['pesquisa'];
                                    $pu = new cadastroFuncionarioController();
                                    $listarUsuario = $pu->listarUsuario($pesquisa);
                                }else{
                                    $pcTable = new cadastroFuncionarioController();
                                    $listarUsuario = $pcTable->listarUsuario();
                                }
                                $a = 0;

                            $fcTable = new cadastroFuncionarioController();
                            $listaUsuario = $fcTable->listarUsuario();
                            $a = 0;
                            if ($listaUsuario != null) {
                                foreach ($listaUsuario as $lu) {
                                    $a++;

                            ?>
                                    <tr>

                                        <td><?php print_r($lu->getIdcadastro()); ?></td>
                                        <td><?php print_r($lu->getNome()); ?></td>
                                        <td><?php print_r($lu->getContato()); ?></td>
                                        <td><?php print_r($lu->getCpf()); ?></td>
                                        <td><?php print_r($lu->getDtEft()); ?></td>


                                        <td><a href="cadastroFuncionario.php?id=<?php echo $lu->getIdcadastro(); ?>" class="btn btn-light">
                                                <img src="img/edita.png" width="24"></a>

                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal<?php echo $a; ?>">
                                                <img src="img/delete.png" width="24"></button>
                                        </td>

                                        <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="color:black;" id="exampleModalLabel">Excluir Usuario</h5>
                                                    <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="color:black;">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o Funcionario
                                                                <?php echo $lu->getNome(); ?>?</strong></label>
                                                        <input type="hidden" name="id" 
                                                               value="<?php echo $lu->getIdcadastro(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                            <button type="submit" value="Limpar" class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">Não</button>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div> <!-- fecha /container -->
</body>
<footer id="myFooter" style="padding-top: 200px;">
    <div class="container">
        <div class="row" style="color: #808080">
            <div class="col-sm-3">
                <h2 class="logo"><a href="tatuagens.php"><img src="img/logo2.jfif" height="80px" width="80px"></h2>
            </div>
            <div class="col-sm-2">
                <h5 style="color: #808080">Inicio</h5>
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
<!-- JavaScript customizado -->
<script src="js/scripts.js"></script>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>

</html>