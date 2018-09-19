<?php
namespace Tarefa\Persistencia\Connection;

final class Config
{
    private function __construct()
    {
    }

    public static function getConnDb()
    {
        return [
            "dbname"   => "tarefa",
            "user"     => "root",
            "password" => "",
            "host"     => "localhost",
            "driver"   => "pdo_mysql"
        ];
    }

    public static function entityPath()
    {
        return ['src/entidade'];
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

