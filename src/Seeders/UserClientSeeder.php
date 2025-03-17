<?php

namespace Seeders;

use Database\Database;
use Faker\Factory as Faker;

class UserClientSeeder
{
    public static function seed($count = 10)
    {
        $faker = Faker::create();
        $db = Database::getInstance()->getConnection(getenv('SOURCE_DATABASE'));

        $userIds = $db->table('tblusers')->pluck('id')->toArray();
        $clientIds = $db->table('tblclients')->pluck('id')->toArray();

        if (empty($userIds) || empty($clientIds)) {
            echo "No users or clients found. Please seed users and clients first.\n";

            return;
        }

        for ($i = 0; $i < $count; $i++) {
            $db->table('tblusers_clients')->insert([
                'auth_user_id' => $faker->randomElement($userIds),
                'client_id' => $faker->randomElement($clientIds),
                'invite_id' => 0,
                'owner' => $faker->boolean(20) ? 1 : 0,
                'permissions' => json_encode(['read' => true, 'write' => $faker->boolean]),
                'last_login' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
