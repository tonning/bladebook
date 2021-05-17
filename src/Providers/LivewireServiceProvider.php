<?php

namespace Tonning\Bladebook\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Tonning\Bladebook\BladebookComponentsFinder;

class LivewireServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        foreach (app(BladebookComponentsFinder::class)->getManifest() as $alias => $class) {
            Livewire::component($alias, $class);
        }
    }
}
