<?php
include_once "include/menuadm.php";
include_once 'C:/xampp/htdocs/tattoo/controller/agendaController.php';
require_once 'C:/xampp/htdocs/tattoo/model/agenda.php';
include_once 'C:/xampp/htdocs/tattoo/model/usuario.php';
include_once 'C:/xampp/htdocs/tattoo/model/orcamento.php';
include_once 'C:/xampp/htdocs/tattoo/controller/orcamentoController.php';
include_once 'C:/xampp/htdocs/tattoo/controller/cadastroController.php';
include_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';
include_once 'C:/xampp/htdocs/tattoo/model/mensagem.php';

$msg = new mensagem();
$ag = new Agenda();

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
    <link rel='stylesheet' type='text/css' href='FullCalendar/main.min.css' />
    <link rel='stylesheet' type='text/css' href='FullCalendar/style.css' />

    <script>
        function click(id) {
            var btn = document.getElementById(id);
            btn.click();
        }
    </script>
</head>

<body class="img" >




    

   
    
    <form method="post" name="dataAgendamento" id="dataAgendamento" style="color: white">
        

        <div id="calendar" class="calendar"></div>

        <button type="button" hidden id="botaoModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:black;" id="exampleModalLabel">Cliente Atendido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="col-md-8">
                            <label for="desconto">Desconto</label>
                            <input type="number" class="form-control" name="desconto" placeholder="Informe o valor de Desconto" value="<?php echo $ag->getDesconto(); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dataAgendamento">Data De Agendamento</label>
                        <input type="date" name="dataAgendamento" class="form-control" id="dataAgendamento" placeholder="Informe data agendada" value="<?php echo $ag->getDataAgendamento(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="horaAgendada">Hora da tatuagem</label>
                        <input type="time" class="form-control" name="dataAgendamento" placeholder="Informe a hora Agendada" value="<?php echo $ag->getHoraAgandamento(); ?>">
                    </div>
                    <select class="form-select" name="horaAgendada">
                        <option>[--Selecione--]</option>
                        <option <?php
                                if ($ag->getStatusAgendamento() == "Concluido") {
                                    echo "selected = 'selected'";
                                }
                                ?>>Concluido</option>
                        <option <?php
                                if ($ag->getStatusAgendamento() == "Em andamento") {
                                    echo "selected = 'selected'";
                                }
                                ?>>Em andamento</option>
                    </select>
                    
                                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" name="dataAgendamento" id="dataAgendamento" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
</form>


</body> <!-- fecha /container -->
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
<script type='text/javascript' src='FullCalendar/main.min.js'></script>
<script type='text/javascript' src='FullCalendar/javascript.js'></script>
<!-- JavaScript customizado -->
<script src="js/scripts.js"></script>


</html>