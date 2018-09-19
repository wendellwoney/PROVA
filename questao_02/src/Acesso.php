<?php

namespace Wendell\Questao02;

use Wendell\Questao02\Usuario;
use Wendell\Questao02\Session;

class Acesso
{
    public function login(Usuario $usuario)
    {
        $dados = include_once 'SimulaDadosDb.php';
        foreach ($dados as $item) {
            if ($item['usuario'] == $usuario->getUsuario() && $item['senha'] == $usuario->getSenha()) {
                $session = new Session();
                $session->iniciaSession();
                $session->cria($this->acessousuario($item));
            }
        }

        return false;
    }

    private function acessousuario($usuario)
    {
        $usuarioLogado = new Usuario();
        $usuarioLogado->setId($usuario['id']);
        $usuarioLogado->setNome($usuario['nome']);
        $usuarioLogado->setUsuario($usuario['usuario']);
        $usuarioLogado->setSenha($usuario['senha']);

        return $usuarioLogado;
    }

    public function direciona($url)
    {
        header("Location:" . $url);
    }
}