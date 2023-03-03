<?php

use App\Core\App;
use App\Core\Auth;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

App::bind('config', require 'config.php');

App::bind('auth', new Auth());

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));



function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location:/{$path}");
}

function env($key)
{
    return $_ENV[$key];
}

function dateReformat($date)
{
    $arrayExplode = explode(" ", $date)[0];
    $reformat = str_replace('-', '/', $arrayExplode);
    $newFormatDate = date("d/m/Y", strtotime($reformat));
    return $newFormatDate;
}
