<?php
/**
 * Created by PhpStorm.
 * User: wende
 * Date: 19/09/2018
 * Time: 14:43
 */

namespace Wendell\Questao03\DB;


class Entidade
{
    protected $conn;
    protected $data = [];
    protected $table;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function __get($value)
    {
        return $this->data[$value];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function insert()
    {
        foreach ($this->data as $key => $value) {
            $fields[] = $key;
            $bind[]   = ':' . $key;
        }

        $fields = implode(',', $fields);
        $bind = implode(',', $bind);

        $sql = ' INSERT INTO ' . $this->table . '(' . $fields . ')' . 'VALUES(' . $bind . ')';
        $bind = $this->bind($sql, $bind);

        try {
            return $this->conn->lastInsertId();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function update()
    {
        if (!array_key_exists('id', $this->data)) {
            throw new \Exception('ID update table is necessary');
        }

        $id = $this->data['id'];
        unset($this->data['id']);

        foreach ($this->data as $key => $value) {
            $fields[] = $key." = :".$key;
        }

        $fields = implode(', ', $fields);
        $sql = ' UPDATE FROM ' . $this->table . 'SET' . $fields;
        $sql .= ' WHERE id = :'.$id;

        $bind = $this->bind($sql);

        try {
            return $bind->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function where(array $clausule, $method = 'AND')
    {
        $methodState = null;
        foreach ($clausule as $key => $value) {
            if(is_null($methodState))
                $fields[] = $key." = :".$key;
            else
                $fields[] = $method . ' ' . $key." = :".$key;
        }

        $fields = implode(', ', $fields);
        $sql = 'SELECT * FROM ' . $this->table . 'WHERE (' . $fields . ')';

        $bind = $this->bind($sql, $clausule);
        $bind->execute();

        return $bind->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $findAll = $this->conn->query($sql);

        return $findAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        return $this->where(['id' => $id]);
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM' . $this->table . ' WHERE id = :id';
        $delete = $this->conn->prepare($sql);
        $bind = $this->bind($sql, ['id' => $id]);

        return $bind->execute();
    }

    private function bind($sql, $bind = null)
    {
        $binds = $this->conn->prepare($sql);
        $arrayClausule = (isset($bind)) ? $bind : $this->data;
        foreach ($arrayClausule as $b => $v) {
            if(is_int($v))
                $binds->bindValue($b, $v, \PDO::PARAM_INT);
            else
                $binds->bindValue($b, $v, \PDO::PARAM_STR);
        }

        return $binds;
    }
}