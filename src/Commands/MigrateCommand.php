<?php

require_once "../Config/bootstrap.php";

use Migrations\SchemaMigrator;
use Database\Database;

$migrator = new SchemaMigrator(
Database::getInstance()->getConnection(getenv('SOURCE_DATABASE')),
Database::getInstance()->getConnection(getenv('TARGET_DATABASE'))
);

$migrator->migrate();
