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

        $records = [];
        $existingPairs = [];

        for ($i = 0; $i < $count; $i++) {
            $authUserId = $faker->randomElement($userIds);
            $clientId = $faker->randomElement($clientIds);

            $key = "{$authUserId}-{$clientId}";

            if (isset($existingPairs[$key])) {
                echo "Skipping duplicate entry for User: $authUserId - Client: $clientId\n";

                continue;
            }

            $existingPairs[$key] = true;

            $records[] = [
                'auth_user_id' => $authUserId,
                'client_id' => $clientId,
                'invite_id' => 0,
                'owner' => $faker->boolean(20) ? 1 : 0,
                'permissions' => json_encode(['read' => true, 'write' => $faker->boolean]),
                'last_login' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $db->table('tblusers_clients')->insert($records);
    }
}
