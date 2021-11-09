<?php
include_once "include/menuadm.php";
include_once 'C:/xampp/htdocs/tattoo/controller/caixaContoller.php';
include_once 'C:/xampp/htdocs/tattoo/model/caixa.php';
include_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';
$msg = new mensagem();
$cx = new Caixa();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
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
        <?php
        if (isset($_POST['cadastrar'])) {
            $NrPar = $_POST['NrPar'];
            if ($NrPar != "") {
                $dtPag = $_POST['dtPag'];
                $frPag = $_POST['frPag'];

                unset($_POST['cadastrar']);
                $cx = new caixaController();

                $msg = $cx->inserirCaixa($NrPar, $dtPag, $frPag);
                echo $msg->getMsg();
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                URL='caixa.php'\">";
            }
        }
        if (isset($_POST['atualizarCaixa'])) {
            $idPagamento = trim($_GET['id']);
            if ($idPagamento != "") {
                $NrPar = $_POST['NrPar'];
                $dtPag = $_POST['dtPag'];
                $frPag = $_POST['frPag'];


                $cx =  new caixaController();
                unset($_POST['atualizarUsuario']);
                $msg = $cx->atualizarCaixaController($idPagamento, $NrPar, $dtPag, $frPag);
                echo $msg->getMsg();
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                URL='caixa.php'\">";
            }
        }

        if (isset($_POST['excluir'])) {
            if ($cx != null) {
                $id = $_POST['id'];

                $cx = new caixaController();
                unset($_POST['excluir']);
                $msg = $ct->excluirClienteDAO($id);
                echo $msg->getMsg();
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
            URL='caixa.php'\">";
            }
        }
        if (isset($_POST['limpar'])) {
            $pu = null;
            unset($_GET['id']);
            header("Location: caixa.php");
        }

        if (isset($_GET['id'])) {
            $btEnviar = TRUE;
            $btAtualizar = TRUE;
            $btExcluir = TRUE;
            $idPagamento = $_GET['id'];
            $cx = new caixaController();
            $cx = $cx->pesquisarId($idPagamento);
        }
        ?>

        <form method="post" action="">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="NrPar">Numero De Parcelas</label>
                    <input type="Number" class="form-control" name="NrPar" placeholder="Informe o Numero De Parcelas" value="<?php echo $cx->getNrPar(); ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <label for="dtPag">Data De Pagamento</label>
                    <input type="datetime-local" class="form-control" name="dtPag" placeholder="Informe sua Data de Pagamento" value="<?php echo $cx->getDtPag(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>Forma De Pagamento</label>
                    <label id="frPag" style="color: red; font-size: 11px;"></label>
                    <select class="form-select" name="frPag">
                        <option>[--Selecione--]</option>
                        <option <?php
                                if ($cx->getFrPag() == "Cartao") {
                                    echo "selected = 'selected'";
                                }
                                ?>>Cartão</option>
                        <option <?php
                                if ($cx->getFrPag() == "Dinheiro") {
                                    echo "selected = 'selected'";
                                }
                                ?>>Dinheiro</option>
                    </select>
                </div>
            </div>
            <div>
                <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                <input type="submit" name="atualizarCaixa" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == false) echo "disabled = 'disabled'"; ?>>
                <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == false) echo "disabled = 'disabled'"; ?>>
                    Excluir
                </button>
            </div>
            <br>
            <br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Parcelas</th>
                        <th scope="col">Data De Pagamento</th>
                        <th scope="col">Forma De Pagamento</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fcTable = new caixaController();
                    $listaCaixa = $fcTable->listarCaixa();
                    $a = 0;
                    if ($listaCaixa != null) {
                        foreach ($listaCaixa as $lc) {
                            $a++;

                    ?>
                            <tr>

                                <td><?php print_r($lc->getIdPagamento()); ?></td>
                                <td><?php print_r($lc->getNrPar()); ?></td>
                                <td><?php print_r($lc->getDtPag()); ?></td>
                                <td><?php print_r($lc->getFrPag()); ?></td>


                                <td><a href="caixa.php?id=<?php echo $lc->getIdPagamento(); ?>" class="btn btn-light">
                                        <img src="img/edita.png" width="24"></a>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                        <img src="img/delete.png" width="24"></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:black;" id="exampleModalLabel">Excluir Pagamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="color:black;">
                                            <form method="post" action="">
                                                <label><strong>Deseja excluir o Pagamento
                                                        <?php echo $lc->getNome(); ?>?</strong></label>
                                                <input type="hidden" name="id" value="<?php echo $lc->getIdcadastro(); ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                            <button type="submit" value="Limpar" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
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
    </div>
    </form>
    </div>
    <div class="col"></div>
    </div>
    </div>
</body>
<!-- fecha /container -->
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