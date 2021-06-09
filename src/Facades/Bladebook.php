<?php

namespace Tonning\Bladebook\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tonning\Bladebook\Bladebook
 */
class Bladebook extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bladebook';
    }
}
