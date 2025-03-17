<?php

namespace Seeders;

use Database\Database;
use Faker\Factory as Faker;

class ClientSeeder
{
    public static function seed($count = 10): void
    {
        $faker = Faker::create();
        $db = Database::getInstance()->getConnection(getenv('SOURCE_DATABASE'));

        for ($i = 0; $i < $count; $i++) {
            $db->table('tblclients')->insert([
                'uuid' => $faker->uuid,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'companyname' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress ?? '',
                'city' => $faker->city,
                'state' => $faker->state,
                'postcode' => $faker->postcode,
                'country' => $faker->countryCode,
                'phonenumber' => $faker->phoneNumber,
                'tax_id' => $faker->numerify('TAX####'),
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'authmodule' => 'default',
                'authdata' => '',
                'currency' => $faker->randomElement([1, 2, 3]),
                'defaultgateway' => '',
                'credit' => $faker->randomFloat(2, 0, 1000),
                'taxexempt' => $faker->boolean,
                'latefeeoveride' => $faker->boolean,
                'overideduenotices' => $faker->boolean,
                'separateinvoices' => $faker->boolean,
                'disableautocc' => $faker->boolean,
                'datecreated' => $faker->date(),
                'notes' => $faker->sentence,
                'billingcid' => 0,
                'securityqid' => 0,
                'securityqans' => '',
                'groupid' => 0,
                'cardtype' => '',
                'cardlastfour' => $faker->numerify('####'),
                'cardnum' => random_bytes(16),
                'startdate' => random_bytes(8),
                'expdate' => random_bytes(8),
                'issuenumber' => random_bytes(4),
                'bankname' => '',
                'banktype' => '',
                'bankcode' => random_bytes(8),
                'bankacct' => random_bytes(16),
                'gatewayid' => '',
                'ip' => $faker->ipv4,
                'host' => $faker->domainName,
                'status' => $faker->randomElement(['Active', 'Inactive', 'Closed']),
                'language' => 'en',
                'pwresetkey' => '',
                'emailoptout' => $faker->boolean,
                'marketing_emails_opt_in' => $faker->boolean,
                'overrideautoclose' => $faker->boolean,
                'allow_sso' => $faker->boolean,
                'email_verified' => $faker->boolean,
                'email_preferences' => json_encode([]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'pwresetexpiry' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
