<?php

namespace Tonning\Bladebook\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        Route::group([
            'middleware' => ['web', 'auth'],
            'as' => 'bladebook::',
            'prefix' => 'bladebook',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }
}
