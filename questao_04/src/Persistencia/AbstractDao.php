<?php

namespace Tarefa\Persistencia;

use Tarefa\Persistencia\Connection\Config;
use Doctrine\ORM\EntityManager; // Gerenciador de entidades
use Doctrine\ORM\Tools\Setup; // configuração do doctrine

Abstract class AbstractDao
{
    protected $entityManager;
    protected $entityPath = "";

    public function __construct($entityPath)
    {
        $this->entityManager = $this->createEntityManager();
        $this->entityPath = $entityPath;
    }

    private function createEntityManager()
    {
        $devMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(Config::entityPath(), $devMode);
        return EntityManager::create(Config::getConnDb(), $config);
    }

    public function insert(object $objectEntity)
    {
        $this->entityManager->persist($objectEntity);
        $this->entityManager->flush();
    }

    public function update(object $objectEntity)
    {
        $this->entityManager->merge($objectEntity);
        $this->entityManager->flush();
    }

    public function delete(object $objectEntity)
    {
        $this->entityManager->remove($objectEntity);
        $this->entityManager->flush();
    }

    public function findById(int $id)
    {
        return $this->entityManager->find("{$this->entityPath}", $id);
    }

    public function findAll()
    {
        $data = array();
        $collection = $this->entityManager->getRepository($this->entityPath)->findAll();

        foreach ($collection as $obj) {
            $data[] = $obj;
        }

        return $data;
    }
}