<?php

namespace App\Controllers;

use App\Core\App;

class TasksController 
{
  public function index()
  {
    // $tasks = App::get('database')->selectAll('todos')
    $tasks = App::get('database')->selectAllByDescendingOrderById('todos');

    $user = App::get('auth')->getUser();

    // retrieve all uncompleted tasks ordered by id ASC
    $tasksUncompleted = App::get('database')->query("select * from todos where completed=0 ORDER BY id DESC")->fetchAll(\PDO::FETCH_CLASS);
    // retrieve all completed tasks 
    $tasksCompleted  = App::get('database')->query("select * from todos where completed=1 ORDER BY id DESC")->fetchAll(\PDO::FETCH_CLASS); 
    // merge two arrays
    // $tasks = array_merge($tasksUncompleted, $tasksCompleted);
    return view('tasks', ['tasksUncompleted' => $tasksUncompleted, 'tasksCompleted' => $tasksCompleted]);
  }

  public function store()
  {
    App::get('database')->insert('todos', [
      'description' => $this->formatTaskDescription($_POST['description'])
    ]);
  return redirect('tasks');
  }

  public function formatTaskDescription($description)
  {
    return ucfirst(strtolower($description));
  }

  public function deleteTask()
    {
      $id = $_GET['id'];
      App::get('database')->delete('todos', [':id' => $id]);
      return redirect('tasks');
    }

  public function changeTaskStatus(){
    $id = $_GET['id'];
    $task = App::get('database')->selectOne('todos', [':id' => $id]);

    if ($task['completed'] === 1) {
      $newStatus = 0;
    } else {
      $newStatus = 1;
    }
    App::get('database')->changeStatus('todos', [':id' => $id, ':status' => $newStatus ]);
    return redirect('tasks');
  }

  public function editTaskIndex(){
    $id = $_GET['id'];
    $task = App::get('database')->selectOne('todos', [':id' => $id]);
    return view('edit', ['task' => $task]);
  }

  public function editTaskStore()  {
      $id = $_GET['id'];

      
      App::get('database')->edit('todos', [':id' => $id, ':description' => $_POST['description'] ]);
      
      return redirect('tasks');
  }

  
  }
  
