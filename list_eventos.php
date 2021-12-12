<?php
include_once 'bd/bd.php';

$query_events = "SELECT idagendamento, valorTattoo, desconto, end, color, start, statusAgendamento, fkcliente, fkorcamento FROM agendamento";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while ($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['idagendamento'];
    $valorTattoo = $row_events['valorTattoo'];
    $desconto = $row_events['desconto'];
    $end = $row_events['end'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $statusAgendamento = $row_events['statusAgendamento'];
    $fkcliente = $row_events['fkcliente'];
    $fkorcamento = $row_events['fkorcamento'];

    $eventos[] = [
        'idagendamento' => $id,
        'valorTattoo' => $valorTattoo,
        'desconto' => $desconto,
        'end' => $end,
        'color' => $color,
        'start' => $start,
        'statusAgendamento' => $statusAgendamento,
        'fkcliente' => $fkcliente,
        'fkorcamento' => $fkorcamento,
    ];
}

echo json_encode($eventos);