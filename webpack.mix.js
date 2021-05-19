let mix = require('laravel-mix');

mix
    .js('resources/js/bladebook.js', 'public').setPublicPath('public')
    .copy('resources/js/renderjson.js', 'public/renderjson.js')
    .postCss('resources/css/bladebook.css', 'public', [
        require("tailwindcss"),
    ]).setPublicPath('public')
