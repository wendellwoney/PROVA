<?php
namespace Tarefa\Entidade;

/**
 * @Entity
 * @Table(name="tarefa")
 */
class Tarefa extends Entidade
{
    /**
     * @var integer @Id
     *      @Column(name="id", type="integer")
     *      @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string @Column(type="string")
     */
    private $titulo;
    /**
     * @var string @Column(type="string")
     */
    private $descricao;
    /**
     * @var string @Column(type="string", columnDefinition="CHAR(1) NOT NULL")
     */
    private $prioridade;


    public function __construct($id = 0, $titulo = "", $descricao = "", $prioridade = "")
    {
        $this->id         = $id;
        $this->titulo     = $titulo;
        $this->descricao  = $descricao;
        $this->prioridade = $prioridade;
    }

    public static function construct(array $array)
    {
        $obj = new Tarefa();
        $obj->setId($array['id']);
        $obj->setTitulo($array['titulo']);
        $obj->setDescricao($array['descricao']);
        $obj->setPrioridade($array['prioridade']);

        return $obj;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->título = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPrioridade()
    {
        return $this->prioridade;
    }

    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;
    }


    public function __toString()
    {
        return "[id: {$this->id}] [titulo: {$this->titulo}] [descricao: {$this->descricao}] [prioridade: {$this->prioridade}]";
    }

    public function toArray()
    {
        return array(
            "id"         => $this->id,
            "titulo"     => $this->titulo,
            "descricao"  => $this->descricao,
            "prioridade" => $this->prioridade
        );
    }
}