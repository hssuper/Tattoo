<?php
session_start();

include_once 'bd/bd.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dados['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query_event = "INSERT INTO events (desconto, dataAgendamento, cor, horaAgendamento, statusAgendamento, fkcliente, fkorcamento) VALUES ( :desconto, :dataAgendamento, :cor, :horaAgendamento, :statusAgendamento, :fkcliente, :fkorcamento)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':desconto', $dados['desconto']);
$insert_event->bindParam(':dataAgendamento', $data_start_conv);
$insert_event->bindParam(':cor', $dados['cor']);
$insert_event->bindParam(':horaAgendamento', $data_end_conv);
$insert_event->bindParam(':statusAgendamento', $dados['statusAgendamento']);
$insert_event->bindParam(':fkcliente', $dados['fkcliente']);
$insert_event->bindParam(':fkorcamento', $dados['fkorcamento']);
if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento nÃ£o foi cadastrado com sucesso!</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);