<?php

namespace Wendell\Questao03\Test;

use PHPUnit\Framework\TestCase;
use Wendell\Questao03\DB\Conexao;

class ConexaoTest extends TestCase
{
    public function testFalhaBanco()
    {
        $this->assertEquals("Não Foi possivel conectar ao bando de dados selecionado!", Conexao::getInstance());
    }
}