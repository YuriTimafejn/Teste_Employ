<?php

namespace utils;

use DateTimeImmutable;

class utilities
{
    public static function dd($var): void
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    public static function dateToString(?DateTimeImmutable $dateObject): string
    {
        if (!$dateObject)
            return "";
        return $dateObject->format('d/m/Y');
    }
}