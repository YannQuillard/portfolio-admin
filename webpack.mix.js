const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/scss/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });
mix.copy('resources/assets/images/', 'public/images/')
