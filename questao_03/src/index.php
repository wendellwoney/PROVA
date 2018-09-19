<?php

use Wendell\Questao03\Entidades\User;
use Wendell\Questao03\DB\Conexao;

$user = new User(Conexao::getInstance());
$arrayUser = $user->getUserList();

foreach ($arrayUser as $userCorrent)
{
    echo $userCorrent['nome'] . '<br>';
}