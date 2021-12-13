<?php
include_once 'bd/bd.php';

$query_events = "SELECT idagendamento, valorTattoo, desconto, dataAgendamento, cor, horaAgendamento, statusAgendamento, fkcliente, fkorcamento FROM agendamento";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while ($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['idagendamento'];
    $valorTattoo = $row_events['valorTattoo'];
    $desconto = $row_events['desconto'];
    $end = $row_events['end'];
    $cor = $row_events['cor'];
    $start = $row_events['start'];
    $statusAgendamento = $row_events['statusAgendamento'];
    $fkcliente = $row_events['fkcliente'];
    $fkorcamento = $row_events['fkorcamento'];

    $eventos[] = [
        'idagendamento' => $id,
        'valorTattoo' => $valorTattoo,
        'desconto' => $desconto,
        'dataAgendamento' => $dataAgendamento,
        'cor' => $cor,
        'horaAgendamento' => $horaAgendamento,
        'statusAgendamento' => $statusAgendamento,
        'fkcliente' => $fkcliente,
        'fkorcamento' => $fkorcamento,
    ];
}

echo json_encode($eventos);