let mix = require('laravel-mix');

mix.js('src/js/app.js', 'dist/')
    .sass('src/sass/app.sass', 'dist/')
    .options({
        processCssUrls: false
    })
    .setPublicPath('dist');