<?php

namespace Wendell\Questao03\DB;

final class Conexao
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static  function getInstance()
    {
        if (is_null(self::$instance)) {
            try {
                self::$instance = new \PDO('mysql:dbname=minha_database;host=localhost','root','');
                //Configuração para habilitar erro no PDO
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                //Força o uso do utf8
                self::$instance->exec('SET NAMES UTF8');
            } catch (\PDOException $e) {
                return 'Não Foi possivel conectar ao bando de dados selecionado!';
            }
        }
        return self::$instance;
    }
}