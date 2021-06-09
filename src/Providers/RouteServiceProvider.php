<?php

namespace Tonning\Bladebook\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        Route::group([
            'domain' => config('bladebook.domain', null),
            'prefix' => config('bladebook.path'),
            'middleware' => array_merge(Arr::wrap(config('bladebook.middleware', 'web')), ['can:viewBladebook']),
            'as' => 'bladebook::',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }
}
