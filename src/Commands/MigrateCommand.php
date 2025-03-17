<?php

namespace Commands;

use Database\Database;
use Migrations\SchemaMigrator;

class MigrateCommand
{
    public static function run(): void
    {
        $migrator = new SchemaMigrator(
            Database::getInstance()->getConnection(getenv('SOURCE_DATABASE')),
            Database::getInstance()->getConnection(getenv('TARGET_DATABASE'))
        );

        $migrator->migrate();
    }
}
