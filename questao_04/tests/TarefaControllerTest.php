<?php

use PHPUnit\Framework\TestCase;
use Tarefa\Controlador\TarefaController;

class TarefaControllerTest extends TestCase
{
    public function testListaTarefasSemPassagemId()
    {
        $tarefaController = new TarefaController();
        $tarefas = $tarefaController->get();
        if (count($tarefas) > 0)
        {
            foreach ($tarefas as $tarefa) {
                $this->assertArrayHasKey('id', $tarefa);
            }
        } else {
            $this->assertEquals(array(), $tarefas);
        }
    }

    public function testListaTarefasComPassagemId()
    {
        $tarefaController = new TarefaController();
        $tarefa = $tarefaController->get(5);
        if (count($tarefa) > 0)
        {
           $this->assertArrayHasKey('id', $tarefa);
        } else {
            $this->assertEquals(array(), $tarefa);
        }
    }

    public function testInsertTarefa()
    {
        $obj = new stdClass();
        $obj->id         = 0;
        $obj->titulo     = "teste";
        $obj->descricao  = "teste";
        $obj->prioridade = "1";

        $tarefaController = new TarefaController();

        $this->assertEquals(array("mensagem" => "Tarefa inserida com sucesso!"), $tarefaController->insert($obj));
    }

    public function testUpdateTarefa()
    {
        $obj = new stdClass();
        $obj->id         = "8";
        $obj->titulo     = "teste2";
        $obj->descricao  = "teste";
        $obj->prioridade = "1";

        $tarefaController = new TarefaController();

        $this->assertEquals(array("mensagem" => "Tarefa atualizada com sucesso!"), $tarefaController->update($obj));
    }

    public function testDeleteTarefa()
    {
        $tarefaController = new TarefaController();

        $this->assertEquals(array("mensagem" => "Tarefa removida com sucesso!"), $tarefaController->delete(3));
    }
}