<?php

$rootFolderPath = dirname(__DIR__, 2);
define('BASE_DIR', $rootFolderPath);

require_once BASE_DIR . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable($rootFolderPath);
$dotenv->load();


if (!getenv('DB_HOST')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('SOURCE_DATABASE'),
    'username'  => "root",
    'password'  => getenv('MYSQL_ROOT_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], 'source_db');

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('TARGET_DATABASE'),
    'username'  => "root",
    'password'  => getenv('MYSQL_ROOT_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], 'target_db');


$capsule->setAsGlobal();
$capsule->bootEloquent();
