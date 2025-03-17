<?php

require_once "../Config/consts.php";
require_once BASE_DIR . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Database\Database;

$dotenv = Dotenv::createImmutable(BASE_DIR);
$dotenv->load();

if (!getenv('DB_HOST')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

Database::getInstance();