<?php

require_once 'ConfiguracaoServico.php';

if ($_POST['id'] && $_POST['titulo'] && $_POST['descricao'] && $_POST['prioridade'])
{
    $data = array(
        "id"         => $_POST['id'],
        "titulo"     => $_POST['titulo'],
        "descricao"  => $_POST['descricao'],
        "prioridade" => $_POST['prioridade']
    );

    $servico = new ConfiguracaoServico($data, '/tarefa');
    $retorno = json_decode($servico->sendUpdate());

    if ($retorno->mensagem == 'Tarefa atualizada com sucesso!') {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=3#minhas');
    } else {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=4#minhas');
    }
}