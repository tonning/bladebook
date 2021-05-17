<?php

namespace Tonning\Bladebook\Providers;

use Tonning\Bladebook\BladebookComponentsFinder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        foreach (app(BladebookComponentsFinder::class)->getManifest() as $alias => $class) {
            Livewire::component($alias, $class);
        }
    }
}
