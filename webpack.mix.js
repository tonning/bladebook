let mix = require('laravel-mix');

mix
    .js('resources/js/bladebook.js', 'public').setPublicPath('public')
    .postCss('resources/css/bladebook.css', 'public', [
        require("tailwindcss"),
    ]).setPublicPath('public')
