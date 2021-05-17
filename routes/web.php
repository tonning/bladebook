<?php

use Tonning\Bladebook\BladebookComponentsFinder;
use Tonning\Bladebook\Http\Controllers\ComponentsController;
use Illuminate\Support\Str;

Route::get('/{category?}', [ComponentsController::class, 'index']);

foreach (app(BladebookComponentsFinder::class)->getManifest() as $alias => $class) {
    foreach ($this->app['config']['bladebook']['books'] as $book) {
        if (Str::startsWith($class, $book['namespace'])) {
            $namespace = Str::of($book['namespace'])->replace('\\', '.')->lower()->finish('.');
            $alias = Str::of($alias)->after($namespace);

            Route::get($alias->replace('.', '/')->__toString(), $class)->name($alias->replace('.', '::')->__toString());
        }
    }

}
