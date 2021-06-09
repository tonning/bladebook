# WORK IN PROGRESS

Not ready for production just yet.

# Storybook for Blade components

To come.

## Installation

You can install the package via composer:

```bash
composer require tonning/bladebook
```

You need to publish the assets to your applications `public/vendor` directory:

```bash
php artisan vendor:publish --provider="Tonning\Bladebook\BladebookServiceProvider" --tag="bladebook:assets"
```

You are free to also publish the config file:
```bash
php artisan vendor:publish --provider="Tonning\Bladebook\BladebookServiceProvider" --tag="config"
```

## Discover Bladebook components
```bash
php artisan bladebook:discover
```


## Creating Bladebook components

After you've created your normal [Blade components](https://laravel.com/docs/8.x/blade#components) you need to write some simple wrappers around them in order for them to be visible in the Bladebook UI.
Let's say you've already created a simple Blade card component.

`app/Views/Components/Layouts/Card.php`
```php
<?php

namespace App\Views\Components\Layouts;

use Illuminate\View\Component;

class Card extends Component
{
    public ?string $title = null;

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.layouts.card');
    }
}
```

`resources/views/components.layouts.card.blade.php`
```html
<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow rounded-md']) }}>
    @if($title)
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $title }}
            </h3>
        </div>
    @endif

    <div class="px-4 py-5 sm:p-6 space-y-6">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            {{ $footer }}
        </div>
    @endisset
</div>
```

## Register books

To register a book, you need to provide three (3) pieces of information;
* The name of the book
* The Blade component namespace that your components use
* And the namespace where you Bladebook components live (usually `App\Http\Bladebook`)

This is usually done `register` method in your service provider i.e. `AppServiceProvider`:

```php
$this->callAfterResolving(BladebookComponentsFinder::class, function (BladebookComponentsFinder $bladebook) {
    $bladebook->registerBook(name: 'fabrick', bladeComponentNamespace: 'fab', namespace: 'App\Http\Bladebook');
});
```

## Styles and Scripts
Normally you application has it's own set of styles and scripts that are needed to render your components correctly. You can register the paths to these so Bladebook is able to display your components as intended.

```php
$this->callAfterResolving(BladebookComponentsFinder::class, function (BladebookComponentsFinder $bladebook) {
    $bladebook->registerBook(name: 'fabrick', bladeComponentNamespace: 'fab', namespace: 'App\Http\Bladebook')
        ->registerStylePaths('/css/app.css')
        ->registerScriptPaths('/js/app.js');;
});
```

## Auth
You can lockdown access to Bladebook's UI by defining a gate in one of your service provider's `boot` method. `AuthServiceProvider` is a good place to put it.
Bladebook's UI is always available in your local environment.

```php
Gate::define('viewBladebook', function ($user) {
    return true;
});
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kristoffer Tonning](https://github.com/tonning)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
