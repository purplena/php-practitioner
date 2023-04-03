<?php

namespace App\Core;

class Validator
{

    const MAX_FILE_SIZE = 2097152;

    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function extension($file)
    {
        $extensions = array("jpeg", "jpg", "png");
        $array = explode('.', $file['name']);
        $file_ext = strtolower(end($array));
        if (in_array($file_ext, $extensions)) {
            return true;
        }
    }

    public static function size($file)
    {
        if ($file <= self::MAX_FILE_SIZE) {
            return true;
        }
    }
}
