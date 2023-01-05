<?php


return [

   'database' => [
      'name' => 'mytodo',
      'username' => 'root',
      'password' => 'tiger',
      'connection' => 'mysql:host=database',
      'port' => 3306,
      'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]
   ]

];