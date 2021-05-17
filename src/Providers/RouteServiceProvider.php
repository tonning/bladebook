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
            'as' => 'fabrick::',
            'prefix' => 'fabrick',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }
}
