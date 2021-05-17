<?php

namespace Tonning\Bladebook;

use Tonning\Bladebook\Commands\Discover;
use Tonning\Bladebook\Providers\LivewireServiceProvider;
use Tonning\Bladebook\Providers\RouteServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladebookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'book');

        Blade::componentNamespace('Tonning\\Bladebook\\Views\\Components', 'book');

        $this->registerCommands();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bladebook.php', 'bladebook');

        $this->registerServiceProviders();
    }

    private function registerServiceProviders()
    {
        $this->registerLivewireSingleton();
        $this->registerComponentAutoDiscovery();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(LivewireServiceProvider::class);
    }

    protected function registerLivewireSingleton()
    {
        $this->app->singleton(BladebookManager::class);
        $this->app->alias(BladebookManager::class, 'bladebook');
    }

    protected function registerComponentAutoDiscovery()
    {
        // Rather than forcing users to register each individual component,
        // we will auto-detect the component's class based on its kebab-cased
        // alias. For instance: 'examples.foo' => App\Http\Livewire\Examples\Foo

        // We will generate a manifest file so we don't have to do the lookup every time.
        $defaultManifestPath = $this->app['bladebook']->isOnVapor()
            ? '/tmp/storage/bootstrap/cache/bladebook-components.php'
            : app()->bootstrapPath('cache/bladebook-components.php');

        $this->app->singleton(BladebookComponentsFinder::class, function () use ($defaultManifestPath) {
            return new BladebookComponentsFinder(
                new Filesystem,
                $defaultManifestPath,
                $this->app['config']['bladebook']['books'],
            );
        });
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
}
