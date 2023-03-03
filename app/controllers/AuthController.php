<?php

namespace App\Controllers;

use App\Core\App;

class AuthController
{
    public function auth()
    {
        if (App::get('auth')->checkUserAndAuthenticate($_POST['email'], $_POST['password'])) {
            return redirect('log');
        } else {
            return view(401);
        }
    }

    public function logout()
    {
        App::get('auth')->logOut();

        return redirect('');
    }
}
