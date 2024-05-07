<?php

namespace Daviswwang\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelHelper
 * @method static bool upload(string $ability, array | mixed $arguments = [])
 * @package Daviswwang\LaravelHelper\Facades
 */
class LaravelHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelhelper';
    }
}
