<?php
namespace Tarefa\Controlador;

use Tarefa\Entidade\Tarefa;
use Tarefa\Persistencia\AbstractDao;
use Tarefa\Persistencia\TarefaDao;

class TarefaController extends AbstractController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TarefaDao();
    }

    public function get($id = null)
    {
        if(!$id) {
            $objectTarefa = $this->dao->findAll();
            foreach ($objectTarefa as $tarefa) {
                $arrayTarefas[] = $tarefa->toArray();
            }
            if (isset($arrayTarefas))
            {
                return $arrayTarefas;
            } else {
                return array();
            }

        } else {
            $tarefa =  $this->dao->findById($id);
            if ($tarefa === null) {
                return array();
            }

            return $tarefa->toArray();
        }

    }

    public function insert($json)
    {
            $tarefa = new Tarefa($json->id, $json->titulo, $json->descricao, $json->prioridade);
            $this->dao->insert($tarefa);
            return array("mensagem" => "Tarefa inserida com sucesso!");
    }

    public function update($json)
    {
        $tarefa = new Tarefa($json->id, $json->titulo, $json->descricao, $json->prioridade);
        $this->dao->update($tarefa);
        return array("mensagem" => "Tarefa atualizada com sucesso!");
    }

    public function delete($id)
    {
        $tarefa = $this->dao->findById($id);
        $this->dao->delete($tarefa);
        return array("mensagem" => "Tarefa removida com sucesso!");
    }
}