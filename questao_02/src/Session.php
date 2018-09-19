<?php

namespace Wendell\Questao02;


class Session
{
    public function iniciaSession()
    {
        session_start();
    }

    public function cria(Usuario $usuario)
    {
        ini_set('session.gc_maxlifetime', (time() * 60));
        ini_set('session.use_strict_mode', true);
        ini_set('session.use_cookies', true);
        ini_set('session.use_only_cookies', true);
        ini_set('session.cookie_httponly', true);
        ini_set('session.hash_function', 'sha512');
        ini_set('session.cache_limiter', 'nocache');
        session_regenerate_id();
        session_name('loggedin');
        $_SESSION['loggedin']['timeout_idle'] = time() + 30;
        $_SESSION['loggedin']['agenteAcesso'] = $this->agenteDeAcesso();
        $_SESSION['loggedin']['id']           = $usuario->getId();
        $_SESSION['loggedin']['nome']         = $usuario->getNome();
        $_SESSION['loggedin']['usuario']      = $usuario->getUsuario();

        if ($this->valida()) {
            return true;
        } else {
            return false;
        }
    }

    public function valida()
    {
        if (( isset($_SESSION['loggedin']) == true && $_SESSION['loggedin']['timeout_idle'] > time() ) && $_SESSION['loggedin']['agenteAcesso'] == $this->agenteDeAcesso()) {
            return true;
        } else {
            if (isset($_SESSION['loggedin'])) {
                session_destroy();
            }
            return false;
        }
    }

    public function agenteDeAcesso()
    {
        return md5('crip' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
    }
}