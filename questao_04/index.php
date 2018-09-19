<?php

require_once __DIR__ . "/vendor/autoload.php";

use Slim\Slim;

$app = new Slim();

$rotas = include_once "src/Route/RouteLoad.php";

$app->get('/', function (){
    echo json_encode(array(
        "api"     => "Tarefas",
        "version" => "1.0.0"
    ));
});

foreach ($rotas as $rota) {
    include_once ("src/Route/" . $rota . ".php");
}

$app->run();