<?php

namespace Commands;

use Seeders\ClientSeeder;
use Seeders\UserClientSeeder;
use Seeders\UserSeeder;

class SeedCommand
{
    public static function run(): void
    {
        ClientSeeder::seed(10);
        UserSeeder::seed(10);
        UserClientSeeder::seed();

    }
}
