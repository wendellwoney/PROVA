<?php

require_once 'ConfiguracaoServico.php';

if ($_POST['titulo'] && $_POST['descricao'] && $_POST['prioridade'])
{
    $data = array(
        "id"         => "0",
        "titulo"     => $_POST['titulo'],
        "descricao"  => $_POST['descricao'],
        "prioridade" => $_POST['prioridade']
    );

    $servico = new ConfiguracaoServico($data, '/tarefa');
    $retorno = json_decode($servico->send());

    if ($retorno->mensagem == 'Tarefa inserida com sucesso!') {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=1#minhas');
    } else {
        header('Location:' . ConfiguracaoServico::URL_SISTEMA . '?s=2#nova');
    }
}