<?php
    include 'bd/bd.php';
    include 'calendario.php';
    $info = array(
        'agendamento' => 'agendamento',
        'dataAgendamento' => 'dataAgendamento',
        'titulo' => 'titulo',
        'link' => 'link'
    );
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset=UTF-8>
        <title>Calendario de eventos</title>
        <link href="css/stylecalendar.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
    <div class="calendario">
     <?php 
        
     ?>
     <div class="legends">
         <span class="legenda"><span class="blue"></span> Eventos</span>
         <span class="legenda"><span class="red"></span> Hoje</span>
     </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>