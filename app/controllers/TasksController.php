<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Validator;

class TasksController
{
    public function index()
    {
        if (empty(App::get('auth')->isAuthenticated())) {
            return view('generic-tasks');
        }
        $tasksUncompleted = $this->tasksUncompleted();
        $tasksCompleted = $this->tasksCompleted();

        return view('tasks', ['tasksUncompleted' => $tasksUncompleted, 'tasksCompleted' => $tasksCompleted]);
    }

    public function tasksUncompleted()
    {
        return App::get('database')
            ->query('select * from todos where completed=0 and user_id = :user_id ORDER BY id DESC', [':user_id' => App::get('auth')->getAuthenticatedUser()])
            ->fetchAll(\PDO::FETCH_CLASS);
    }

    public function tasksCompleted()
    {
        return App::get('database')
            ->query('select * from todos where completed=1 and user_id = :user_id ORDER BY id DESC', [':user_id' => App::get('auth')->getAuthenticatedUser()])
            ->fetchAll(\PDO::FETCH_CLASS);
    }

    public function store()
    {
        if (empty(App::get('auth')->isAuthenticated())) {
            return view('auth-fail-response');
        }

        $errors = [];
        if (!Validator::string($_POST['description'], 1, 100)) {
            $errors['description'] = 'Your task has to be less than 100 characters';
        }

        $tasksUncompleted = $this->tasksUncompleted();
        $tasksCompleted = $this->tasksCompleted();

        if (!empty($errors)) {
            return view('tasks', [
                'errors' => $errors,
                'tasksUncompleted' => $tasksUncompleted,
                'tasksCompleted' => $tasksCompleted,
            ]);
        }

        App::get('database')
            ->insert(
                'todos',
                ['description' => $this->formatTaskDescription($_POST['description']), 'user_id' => App::get('auth')->getAuthenticatedUser()]
            );

        return redirect('tasks');
    }

    public function deleteTask()
    {
        App::get('database')->delete('todos', [':id' => $_POST['id']]);

        return redirect('tasks');
    }

    public function editTaskIndex()
    {
        $task = App::get('database')
            ->selectOne('todos', [':id' => $_GET['id']])
            ->fetch(\PDO::FETCH_ASSOC);

        return view('edit', ['task' => $task]);
    }

    public function editTaskStore()
    {
        App::get('database')
            ->edit('todos', [':id' => $_POST['id'], ':description' => $_POST['description']]);

        return redirect('tasks');
    }

    public function formatTaskDescription($description)
    {
        return ucfirst(strtolower($description));
    }

    public function changeTaskStatus()
    {
        $task = App::get('database')
            ->selectOne('todos', [':id' => $_GET['id']])
            ->fetch(\PDO::FETCH_ASSOC);

        if ($task['completed'] === 1) {
            $newStatus = 0;
            App::get('database')
                ->query(
                    'UPDATE todos SET created_at = CURRENT_TIMESTAMP() WHERE id = :id',
                    [':id' => $_GET['id']]
                );
        } else {
            $newStatus = 1;
            App::get('database')
                ->query(
                    'UPDATE todos SET completed_at = CURRENT_TIMESTAMP() WHERE id = :id',
                    [':id' => $_GET['id']]
                );
        }
        App::get('database')
            ->changeStatus('todos', [':id' => $_GET['id'], ':status' => $newStatus]);

        return redirect('tasks');
    }

    public function finishedTasks()
    {
        $completed_tasks_by_date = $this->counterOfTasks();

        $number = App::get('database')
            ->query(
                'SELECT COUNT(*) as count FROM todos WHERE DATE(completed_at) = :completed_at AND completed=1 AND user_id = :user_id',
                [':completed_at' => $_POST['completed_at'], ':user_id' => App::get('auth')->getAuthenticatedUser()]
            )
            ->fetch(\PDO::FETCH_ASSOC);

        if (empty(App::get('auth')->isAuthenticated())) {
            return view('auth-fail-response');
        }

        return view('statistics', ['number' => $number, 'completed_tasks_by_date' => $completed_tasks_by_date]);
    }

    public function statistics()
    {
        $completed_tasks_by_date = $this->counterOfTasks();

        return view('statistics', ['completed_tasks_by_date' => $completed_tasks_by_date]);
    }

    public function counterOfTasks()
    {
        $completedTasks = App::get('database')
            ->query('select * from todos where completed=1 and user_id = :user_id ORDER BY DATE(completed_at) ASC', [':user_id' => App::get('auth')->getAuthenticatedUser()])->fetchAll(\PDO::FETCH_CLASS);

        $completed_tasks_by_date = [];

        foreach ($completedTasks as $task) {
            $date = substr($task->completed_at, 0, 10);
            if (isset($completed_tasks_by_date[$date])) {
                $completed_tasks_by_date[$date] = $completed_tasks_by_date[$date] + 1;
            } else {
                $completed_tasks_by_date[$date] = 1;
            }
        }

        return $completed_tasks_by_date;
    }
}
