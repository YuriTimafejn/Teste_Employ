<?php

namespace utils;

class utilities
{
    public static function dd($var): void
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }
}