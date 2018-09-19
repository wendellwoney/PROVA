<?php

use Tarefa\Controlador\TarefaController;

$tarefaController = new TarefaController();

$app->get('/tarefa(/(:id))', function ($id = null) use ($tarefaController) {
    echo json_encode( $tarefaController->get($id) );
});

$app->post('/tarefa(/)', function () use ($tarefaController) {
    $app = \Slim\Slim::getInstance();
    $json = json_decode ( $app->request()->getBody() );
    echo json_encode ( $tarefaController->insert($json) );
});

$app->put('/tarefa(/)', function () use ($tarefaController) {
    $app = \Slim\Slim::getInstance();
    $json = json_decode ( $app->request()->getBody() );
    echo json_encode ( $tarefaController->update($json) );
});

$app->delete('/tarefa/:id', function ($id) use ($tarefaController) {
    echo json_encode ( $tarefaController->delete($id) );
});