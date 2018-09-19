<?php

require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);


//Para criar as tabelas
// php vendor\doctrine\orm\bin\doctrine.php orm:schema-tool:create

//Para atualizar tabelas
// php vendor\doctrine\orm\bin\doctrine.php orm:schema-tool:update -f
