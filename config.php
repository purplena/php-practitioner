<?php

return [

    'database' => [
        'name' => env('DB_NAME'),
        'username' => env('DB_USER'),
        'password' => env('DB_PASSWORD'),
        'connection' => 'mysql:host=' . env('DB_HOST'),
        'port' => 3306,
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],

];
