<?php

namespace App\Core;

class Auth
{
    public function getUser()
    {
        if ($this->isAuthenticated()) {
            return App::get('database')->query('select * from users where id = :id', [':id' => $_SESSION['id']])->fetch(\PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['id']);
    }

    public function getAuthenticatedUser()
    {
        return $_SESSION['id'];
    }

    public function checkUserAndAuthenticate($email, $password)
    {
        $user = App::get('database')->query('select * from users where email = :email and password = :password', [':email' => $email, ':password' => $password])->fetch(\PDO::FETCH_ASSOC);

        if ($user == false) {
            return false;
        } else {
            $_SESSION['id'] = $user['id'];

            return true;
        }
    }

    public function logOut()
    {
        unset($_SESSION['id']);
    }
}
