<?php


use Illuminate\Support\Str;


if (!function_exists('excerpt_text')) {

    function excerpt_text($text, $length = 150)
    {
        $clean = strip_tags($text);
        return Str::words($clean, $length, '...');
    }
}
