<?php

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

class Database
{
    private static ?self $instance = null;
    private Capsule $capsule;

    private function __construct()
    {
        $this->capsule = new Capsule();
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('SOURCE_DATABASE'),
            'username'  => "root",
            'password'  => getenv('MYSQL_ROOT_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],  getenv('SOURCE_DATABASE'));

        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('TARGET_DATABASE'),
            'username'  => "root",
            'password'  => getenv('MYSQL_ROOT_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ], getenv('TARGET_DATABASE'));

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(string $name)
    {
        return $this->capsule->getConnection($name);
    }
}
