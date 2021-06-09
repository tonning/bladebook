<?php

namespace Tonning\Bladebook;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Tonning\Bladebook\Commands\Discover;
use Tonning\Bladebook\Providers\AuthServiceProvider;
use Tonning\Bladebook\Providers\LivewireServiceProvider;
use Tonning\Bladebook\Providers\RouteServiceProvider;

class BladebookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'book');

        Blade::componentNamespace('Tonning\\Bladebook\\Views\\Components', 'book');

        if ($this->app->runningInConsole()) {
            $this->publishFiles();
            $this->registerCommands();
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bladebook.php', 'bladebook');

        $this->app->register(AuthServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(LivewireServiceProvider::class);

        // Rather than forcing users to register each individual component,
        // we will auto-detect the component's class based on its kebab-cased
        // alias. For instance: 'examples.foo' => App\Http\Bladebook\Examples\Foo
        $this->app->singleton(BladebookComponentsFinder::class, function () {
            return new BladebookComponentsFinder(new Filesystem);
        });
        $this->app->alias(BladebookComponentsFinder::class, 'bladebook');
    }

    protected function registerCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Discover::class,
        ]);
    }

    protected function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../config/bladebook.php' => config_path('bladebook.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/bladebook'),
        ], 'bladebook:assets');
    }
}
