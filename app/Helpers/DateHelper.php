<?php

if (! function_exists('format_tanggal')) {
    function format_tanggal($date, $format='d-m-Y')
    {
        return Carbon\Carbon::parse($date)->format($format);
    }
}

