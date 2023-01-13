<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('arrays', 'PagesController@arrays');


$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

$router->get('tasks', 'TasksController@index');
$router->post('tasks', 'TasksController@store');
$router->get('tasks/delete', 'TasksController@deleteTask');
$router->get('tasks/changeStatus', 'TasksController@changeTaskStatus');

// Edit tasks
$router->get('tasks/edit', 'TasksController@editTaskIndex');
$router->post('tasks/edit', 'TasksController@editTaskStore');

