<?php

namespace Commands;

use Seeders\ClientSeeder;
use Seeders\UserClientSeeder;
use Seeders\UserSeeder;

class SeedCommand
{
    public static function run(): void
    {
        try {
            ClientSeeder::seed(10);
            UserSeeder::seed(10);
            UserClientSeeder::seed();
        }catch (\Exception $e){
            echo 'Seed failed: '.$e->getMessage()."\n";
        }

    }
}
