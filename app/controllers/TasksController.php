<?php

namespace App\Controllers;

use App\Core\App;

class TasksController
{
    public function index()
    {
        $tasksUncompleted = App::get('database')->query('select * from todos where completed=0 ORDER BY id DESC')->fetchAll(\PDO::FETCH_CLASS);
        $tasksCompleted = App::get('database')->query('select * from todos where completed=1 ORDER BY id DESC')->fetchAll(\PDO::FETCH_CLASS);

        return view('tasks', ['tasksUncompleted' => $tasksUncompleted, 'tasksCompleted' => $tasksCompleted]);
    }

    public function store()
    {
        App::get('database')->insert('todos', [
            'description' => $this->formatTaskDescription($_POST['description']),
        ]);

        return redirect('tasks');
    }

    public function deleteTask()
    {
        $id = $_POST['id'];
        App::get('database')->delete('todos', [':id' => $id]);

        return redirect('tasks');
    }

    public function editTaskIndex()
    {
        $id = $_GET['id'];
        $task = App::get('database')->selectOne('todos', [':id' => $id])->fetch(\PDO::FETCH_ASSOC);

        return view('edit', ['task' => $task]);
    }

    public function editTaskStore()
    {
        App::get('database')->edit('todos', [':id' => $_POST['id'], ':description' => $_POST['description']]);

        return redirect('tasks');
    }

    public function formatTaskDescription($description)
    {
        return ucfirst(strtolower($description));
    }

    public function changeTaskStatus()
    {
        $id = $_GET['id'];
        $task = App::get('database')->selectOne('todos', [':id' => $id])->fetch(\PDO::FETCH_ASSOC);

        if (1 === $task['completed']) {
            $newStatus = 0;
        } else {
            $newStatus = 1;
        }
        App::get('database')->changeStatus('todos', [':id' => $id, ':status' => $newStatus]);

        return redirect('tasks');
    }
}
