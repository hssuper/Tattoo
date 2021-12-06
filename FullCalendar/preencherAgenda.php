<?php

include_once "model/agenda.php";

include_once "bd/bd.php";

$query1 = "select idagendamento,desconto,dataAgendamento,horaAgandamento,statusAgendamento from agendamento inner join on fkcliente = fkorcamento   where statusAgendamento != 'Concluido' and dataAgendamento BETWEEN \"2021-12-04\" AND \"2100-12-31\" ORDER BY horaAgandamento,dataAgendamento,fkcliente desc";
date_default_timezone_set('America/Sao_Paulo');
$conn = new Conecta();
        $conecta = $conn->conectadb();





$array = [];
if ($eventoConsultas->rowCount() > 0) {
    
    $duracao = '00:30:00';
    $v = explode(':', $duracao);
    
    while ($row_eventoConsultas = $eventoConsultas->fetch(PDO::FETCH_ASSOC)) {
        $data = $row_eventoConsultas['horaAgandamento'];
        $hora = date('H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes {$v[2]} seconds"));
        ($row_eventoConsultas['statusAgendamento'] != 'Finalizada' ? $props ="'extendedProps' :{ ['status' => 'done']}" : $props ='' );
        $array[] = array(
            'id' => $row_eventoConsultas['idConsulta'],
            'title' => "Consulta de " . $row_eventoConsultas['nomePaciente'],
            'start' => $row_eventoConsultas['dataAgendamento'] . 'T' . $row_eventoConsultas['horaAgandamento'],
            'end' => $row_eventoConsultas['dataAgendamento'] . 'T' . $hora,
             $props
            
        );
    }

    echo json_encode($array);
}