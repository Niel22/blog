<?php

if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'm';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'k';
        }
        return $number;
    }
}
