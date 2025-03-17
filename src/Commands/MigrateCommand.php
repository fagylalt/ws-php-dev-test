<?php

require_once '../Config/bootstrap.php';

use Database\Database;
use Migrations\SchemaMigrator;

$migrator = new SchemaMigrator(
    Database::getInstance()->getConnection(getenv('SOURCE_DATABASE')),
    Database::getInstance()->getConnection(getenv('TARGET_DATABASE'))
);

$migrator->migrate();
