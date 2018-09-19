<?php

namespace Wendell\Questao03\Entidades;

use Wendell\Questao03\DB\Entidade;

class User extends Entidade
{
    protected $table = 'user';

    public function getUserList()
    {
        $sql = 'select name from ' . $this->table . ' ORDER BY name ASC';
        $get = $this->conn->query($sql);

        return $get->fetchAll(\PDO::FETCH_ASSOC);
    }
}