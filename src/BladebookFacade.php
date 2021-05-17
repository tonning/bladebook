<?php

namespace Tonning\Bladebook;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tonning\Bladebook\Bladebook
 */
class BladebookFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bladebook';
    }
}
