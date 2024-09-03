<?php

namespace ADMehdi\Facades;

use Illuminate\Support\Facades\Facade;

class ADMehdi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static string image($file, $default = '')
     * @method static $this useModel($name, $object)
     *
     * @return string
     * @see \ADMehdi
     */
    protected static function getFacadeAccessor()
    {
        return 'admehdi';
    }
}
