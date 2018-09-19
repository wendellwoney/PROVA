<?php

require_once 'ConfiguracaoServico.php';

if ($_GET['id']) {
    $servico = new ConfiguracaoServico($data, '/tarefa/' . $_GET['id']);
    $retorno = json_decode($servico->sendDelete());

    if ($retorno->mensagem == 'Tarefa removida com sucesso!') {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=5#minhas');
    } else {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=6#minhas');
    }
}