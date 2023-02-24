<?php

namespace App\Controllers;

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
}
