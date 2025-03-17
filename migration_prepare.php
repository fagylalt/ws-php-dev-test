<?php

include_once 'src/Config/bootstrap.php';

use Commands\MigrateCommand;
use Commands\SeedCommand;

SeedCommand::run();
echo "Seeded clients, users, and user client relations.\n";
MigrateCommand::run();
echo "Migrated clients, users, and user client relations to the new schema.\n";

exit(0);
