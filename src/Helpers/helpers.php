<?php

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return ADMehdi\Facades\ADMehdi::setting($key, $default);
    }
}