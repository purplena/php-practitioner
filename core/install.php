<?php 

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$config = require __DIR__ . '/../config.php';

$databaseStructure = __DIR__ . '/database/database-structure.sql';

$pdo = Connection::make($config['database']);
$pdo->exec(file_get_contents($databaseStructure));

function env($key)
{
    return $_ENV[$key];
}