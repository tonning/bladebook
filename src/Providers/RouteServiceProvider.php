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
            'domain' => config('bladebook.domain', null),
            'prefix' => config('bladebook.path'),
            'middleware' => config('bladebook.middleware', 'web'),
            'as' => 'bladebook::',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }
}
