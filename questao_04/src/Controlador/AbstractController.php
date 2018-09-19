<?php

namespace Tarefa\Controlador;


abstract class AbstractController
{
    abstract public function get($id);
    abstract public function insert($json);
    abstract public function update($json);
    abstract public function delete($id);
}