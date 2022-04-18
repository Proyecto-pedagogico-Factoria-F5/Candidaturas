const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js', 'resources/js/datepicker.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
