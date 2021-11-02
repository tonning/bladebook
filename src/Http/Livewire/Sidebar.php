<?php

namespace Tonning\Bladebook\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Component;
use Tonning\Bladebook\BladebookComponentsFinder;
use Tonning\Bladebook\Facades\Bladebook;

class Sidebar extends Component
{
    public string $book = '';

    public array $elements = [];

    public function mount()
    {
        $book = Cookie::has('bladebook')
            ? json_decode(Cookie::get('bladebook'))->book
            : Bladebook::getBooks()[0]['name'];

        $this->book = $book;
        $this->elements = $this->getElementsFor($book);
    }

    public function updatingBook($value)
    {
        $this->elements = $this->getElementsFor($value);

        Cookie::queue('bladebook', json_encode(['book' => $value]), 60 * 60);
    }

    public function getElementsFor($bookName) : array
    {
        $bookConfig = collect(Bladebook::getBooks())->firstWhere('name', $bookName);

        if (! $bookConfig) {
            return [];
        }

        return collect(app(BladebookComponentsFinder::class)->getManifest())
            ->filter(function ($class) use ($bookConfig) {
                return Str::startsWith($class, $bookConfig['namespace']);
            })
            ->mapWithKeys(function ($class, $alias) use ($bookConfig, $bookName) {
                return [
                    $class => [
                        'name' => Str::of($class)->after($bookConfig['namespace'] . '\\')->after('\\')->snake(' ')->title()->__toString(),
                        'route' => route('bladebook::' . Str::of($alias)->after(Str::of($bookConfig['namespace'])->replace('\\', '.')->lower()->finish('.'))->replace('.', '::')->__toString()),
                    ],
                ];
            })
            ->groupBy(function ($value, $key) use ($bookConfig) {
                return Str::of($key)
                    ->after($bookConfig['namespace'] . '\\')
                    ->before('\\')
                    ->snake(' ')
                    ->title()
                    ->__toString();
            })
            ->transform(function ($items, $category) {
                return [
                    'route' => route('bladebook::category', Str::kebab($category)),
                    'items' => $items->toArray(),
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('book::livewire.sidebar');
    }
}
