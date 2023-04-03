<?php

$router->get('', 'PagesController@home');
$router->get('log', 'PagesController@log');
$router->get('gallery', 'PagesController@gallery');
$router->post('storePicture', 'PagesController@store');
$router->get('weather', 'PagesController@weather');

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

// Statistics
$router->post('tasks/statistics', 'TasksController@finishedTasks');
$router->get('tasks/statistics', 'TasksController@statistics');
