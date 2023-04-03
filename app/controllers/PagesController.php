<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\Weather;

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

    public function gallery()
    {
        $images = glob("images/gallery/" . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        return view('gallery', ['images' => $images]);
    }

    public function store()
    {
        if (isset($_FILES['image'])) {
            $errors = [];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];

            if (!Validator::extension($_FILES['image'])) {
                $errors['description'] = 'Please add an image';
            }

            if (!Validator::size($_FILES['image']['size'])) {
                $errors['description'] = 'File size must be less than 2 MB';
            }

            $images = glob("images/gallery/" . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            if (!empty($errors)) {
                return view('gallery', [
                    'errors' => $errors,
                    'images' => $images
                ]);
            }

            move_uploaded_file($file_tmp, "images/gallery/" . $file_name);

            $images = glob("images/gallery/" . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            return view('gallery', ['images' => $images]);
        }
    }

    public function weather()
    {
        return view('weather', [
            'weather' => Weather::weather(),
        ]);
    }
}
