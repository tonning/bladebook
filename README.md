# Storybook for Blade components

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tonning/bladebook
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Tonning\Bladebook\BladebookServiceProvider" --tag="bladebook-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Tonning\Bladebook\BladebookServiceProvider" --tag="bladebook-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$bladebook = new Tonning\Bladebook();
echo $bladebook->echoPhrase('Hello, Spatie!');
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
