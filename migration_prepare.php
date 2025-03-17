<?php

require_once 'src/Config/bootstrap.php';

use Commands\MigrateCommand;
use Commands\SeedCommand;
use Database\Database;

$sourceDb = Database::getInstance()->getConnection(getenv('SOURCE_DATABASE'));
$targetDb = Database::getInstance()->getConnection(getenv('TARGET_DATABASE'));

try {
    $targetDb->table('tblusers_clients')->truncate();
    $targetDb->table('tblusers')->truncate();
    $targetDb->table('tblclients')->truncate();
    $sourceDb->table('tblusers_clients')->truncate();
    $sourceDb->table('tblusers')->truncate();
    $sourceDb->table('tblclients')->truncate();
    SeedCommand::run();
    echo "Seeded clients, users, and user client relations.\n";
    MigrateCommand::run();
    echo "Migrated clients, users, and user client relations to the new schema.\n";
} catch (\Exception $e) {
    echo 'Seed and migration failed: '.$e->getMessage()."\n";
}

exit(0);
