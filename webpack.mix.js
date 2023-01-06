const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.minify('resources/js/main.js', 'public/js/main.js');

mix.minify('resources/js/components/home_init.js', 'public/js/components/home_init.js')
    .minify('resources/js/pages/blog_show.js', 'public/js/pages/blog_show.js');


mix.sass('resources/css/styles.scss', 'public/css/styles.css')
    .version();

mix.copy('resources/admin', 'public/assets/admin')
    .copy('resources/img', 'public/img')
    .inProduction();

mix.copy('resources/js/libs', 'public/js/libs');

mix.sass('resources/admin/css/admin.scss', 'public/assets/admin/css');
