<?php

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return ADMehdi\Facades\ADMehdi::setting($key, $default);
    }
}
if (!function_exists('set_setting')) {
    function set_setting($key, $value)
    {
        return ADMehdi\Facades\ADMehdi::set_setting($key, $value);
    }
}
