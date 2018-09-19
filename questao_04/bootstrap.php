<?php
require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Tarefa\Persistencia\Connection\Config;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(Config::entityPath(), $isDevMode);

$conn = Config::getConnDb();

$entityManager = EntityManager::create($conn, $config);