<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('log', 'PagesController@log');
$router->get('account', 'PagesController@account');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

$router->get('tasks', 'TasksController@index');
$router->post('tasks', 'TasksController@store');

$router->delete('tasks', 'TasksController@deleteTask');

$router->get('tasks/changeStatus', 'TasksController@changeTaskStatus');

// Edit tasks
$router->get('task/edit', 'TasksController@editTaskIndex');
$router->patch('task/store', 'TasksController@editTaskStore');

// Authentification
$router->post('login', 'AuthController@auth');
$router->get('logout', 'AuthController@logout');
