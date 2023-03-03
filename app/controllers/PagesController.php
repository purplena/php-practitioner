<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function account()
    {
        return view('account');
    }

    public function log()
    {
        return view('log');
    }

    // public function statistics()
    // {
    //     return view('statistics');
    // }
}
