<?php

require_once 'ConfiguracaoServico.php';

class Controle
{
    public function getVersaoSistema()
    {
        $servico = new ConfiguracaoServico(array(),'/');
        $inicial =  json_decode($servico->get());
        return $inicial->version;
    }

    public function getTarefas()
    {
        $servico = new ConfiguracaoServico(array(),'/tarefa');
        $tarefas =  json_decode($servico->get());
        return $tarefas;
    }
}