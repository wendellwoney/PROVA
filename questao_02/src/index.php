<?php

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use Wendell\Questao02\Session;
use Wendell\Questao02\Usuario;
use Wendell\Questao02\Acesso;

//Processo para efetuar acesso e criar session
$usuarioParaLogin = new Usuario();
$usuarioParaLogin->setUsuario('usu01');
$usuarioParaLogin->setSenha('123654');

$acesso = new Acesso();
$acesso->login($usuarioParaLogin);

$session = new Session();

if ($session->valida() == true) {
    $acesso->direciona('http://www.google.com');
} else {
    $acesso->direciona('http://www.google.com');
}