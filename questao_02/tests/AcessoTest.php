<?php

namespace Wendell\Questao02\tests;

use PHPUnit\Framework\TestCase;
use Wendell\Questao02\Acesso;
use Wendell\Questao02\Usuario;

class AcessoTest extends TestCase
{
    public function testFalhaLogin()
    {
        $usuarioParaLogin = new Usuario();
        $usuarioParaLogin->setUsuario('usu88801');
        $usuarioParaLogin->setSenha('1236547898747');

        $acesso = new Acesso();
        $this->assertEquals(false, $acesso->login($usuarioParaLogin));
    }

}