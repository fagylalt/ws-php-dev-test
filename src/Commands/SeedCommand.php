<?php

require '../Config/bootstrap.php';
use Seeders\ClientSeeder;
use Seeders\UserClientSeeder;
use Seeders\UserSeeder;

ClientSeeder::seed(10);
echo "Seeded 10 clients\n";

UserSeeder::seed(10);
echo "Seeded 10 users\n";

UserClientSeeder::seed();
echo "Seeded 10 user-client relationships\n";