<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Validator;

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
        $errors = [];
        if (!Validator::string($_POST['description'], 1, 100)) {
            $errors['description'] = 'Your task has to be less than 100 characters';
        }

        $tasksUncompleted = App::get('database')->query('select * from todos where completed=0 ORDER BY id DESC')->fetchAll(\PDO::FETCH_CLASS);
        $tasksCompleted = App::get('database')->query('select * from todos where completed=1 ORDER BY id DESC')->fetchAll(\PDO::FETCH_CLASS);

        if (!empty($errors)) {
            return view("tasks", [
                'errors' => $errors,
                'tasksUncompleted' => $tasksUncompleted,
                'tasksCompleted' => $tasksCompleted
            ]);
        }

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
            App::get('database')->query('UPDATE todos SET finished_at = CURRENT_TIMESTAMP() WHERE id = :id', [':id' => $_GET['id']]);
        }
        App::get('database')->changeStatus('todos', [':id' => $id, ':status' => $newStatus]);

        return redirect('tasks');
    }

    public function finishedTasks()
    {
        $number = App::get('database')->query('SELECT COUNT(*) as count FROM todos WHERE DATE(completed_at) = :completed_at', [':completed_at' => $_POST['completed_at']])->fetch(\PDO::FETCH_ASSOC);
        return view('statistics', ['number' => $number]);
    }

    public function statistics()
    {
        $completedTasks = App::get('database')->query('select * from todos where completed=1')->fetchAll(\PDO::FETCH_CLASS);

        $completed_tasks_by_date = [];
        foreach ($completedTasks as $task) {
            $date = substr($task->completed_at, 0, 10);
            if (isset($completed_tasks_by_date[$date])) {
                $completed_tasks_by_date[$date] = $completed_tasks_by_date[$date] + 1;
            } else {
                $completed_tasks_by_date[$date] = 1;
            }
        }

        return view('statistics', ['completed_tasks_by_date' => $completed_tasks_by_date]);
    }
}
