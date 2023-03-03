<?php

$router->get('', 'PagesController@home');
$router->get('log', 'PagesController@log');
// $router->get('tasks/statistics', 'PagesController@statistics');
// $router->get('account', 'PagesController@account');

// $router->get('users', 'UsersController@index');
// $router->post('users', 'UsersController@store');

$router->get('tasks', 'TasksController@index');
$router->post('tasks', 'TasksController@store');

$router->delete('tasks', 'TasksController@deleteTask');

$router->get('tasks/changeStatus', 'TasksController@changeTaskStatus');

// Edit tasks
$router->get('tasks/edit', 'TasksController@editTaskIndex');
$router->patch('tasks/store', 'TasksController@editTaskStore');

// Authentification
$router->post('login', 'AuthController@auth');
$router->get('logout', 'AuthController@logout');


$router->post('tasks/statistics', 'TasksController@finishedTasks');
$router->get('tasks/statistics', 'TasksController@statistics');
