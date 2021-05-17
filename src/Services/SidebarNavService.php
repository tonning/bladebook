<?php

namespace Tonning\Bladebook\Services;

use Illuminate\Support\Str;
use Tonning\Bladebook\BladebookComponentsFinder;

class SidebarNavService
{
    /**
     * @TODO: Use book configurations instead of hardcoded.
     *
     * @return array
     */
    public function group()
    {
        $all = collect(app(BladebookComponentsFinder::class)->getManifest())
            ->mapWithKeys(function ($class, $alias) {
                return [
                    $class => [
                        'name' => Str::of($class)->after('Helix\\Fabrick\\Http\\Bladebook\\')->after('\\')->snake(' ')->title()->__toString(),
                        'route' => route('bladebook::' . Str::of($alias)->after('helix.fabrick.http.bladebook.')->replace('.', '::')->__toString()),
                    ],
                ];
            })
            ->groupBy(function ($value, $key) {
                return Str::of($key)
                    ->after('Helix\\Fabrick\\Http\\Bladebook\\')
                    ->before('\\')
                    ->snake(' ')
                    ->title()
                    ->__toString();
            })
            ->transform(function ($items, $category) {
                return [
                    'route' => url('bladebook/' . Str::kebab($category)),
                    'items' => $items->toArray(),
                ];
            })
            ->toArray();

        return $all;
    }
}
