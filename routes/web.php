<?php

use Tonning\Bladebook\BladebookComponentsFinder;
use Tonning\Bladebook\Http\Controllers\ComponentsController;
use Illuminate\Support\Str;
use Tonning\Bladebook\Http\Controllers\BooksController;

Route::get('/', [BooksController::class, 'index'])->name('bladebook');

foreach (app(BladebookComponentsFinder::class)->getManifest() as $alias => $class) {
    foreach ($this->app['bladebook']->getBooks() as $book) {
        Route::get(Str::slug($book['name']) . '/{category?}', [ComponentsController::class, 'index'])->name('category');

        if (Str::startsWith($class, $book['namespace'])) {
            $namespace = Str::of($book['namespace'])->replace('\\', '.')->lower()->finish('.');
            $alias = Str::of($alias)->after($namespace);

            Route::get(Str::slug($book['name']) . '/'. $alias->replace('.', '/')->__toString(), $class)
                ->name($alias->replace('.', '::')->__toString());
        }
    }
}
