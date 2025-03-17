<?php

namespace Seeders;

use Database\Database;
use Faker\Factory as Faker;
use Illuminate\Database\Capsule\Manager as Capsule;

class UserSeeder
{
    public static function seed($count = 10)
    {
        $faker = Faker::create();
        $db = Database::getInstance()->getConnection(getenv('SOURCE_DATABASE'));

        for ($i = 0; $i < $count; $i++) {
            $db->table('tblusers')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'language' => $faker->randomElement(['en', 'fr', 'de', 'es']),
                'second_factor' => '',
                'second_factor_config' => null,
                'remember_token' => $faker->sha256,
                'reset_token' => '',
                'security_question_id' => 0,
                'security_question_answer' => '',
                'last_ip' => $faker->ipv4,
                'last_hostname' => $faker->domainName,
                'last_login' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
                'email_verification_token' => $faker->sha256,
                'email_verification_token_expiry' => null,
                'email_verified_at' => null,
                'reset_token_expiry' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
