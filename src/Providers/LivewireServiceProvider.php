<?php

namespace Tonning\Bladebook\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Tonning\Bladebook\BladebookComponentsFinder;
use Tonning\Bladebook\Http\Livewire\Sidebar;

class LivewireServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        Livewire::component('tonning.bladebook.http.livewire.sidebar', Sidebar::class);

        foreach (app(BladebookComponentsFinder::class)->getManifest() as $alias => $class) {
            Livewire::component($alias, $class);
        }
    }
}
