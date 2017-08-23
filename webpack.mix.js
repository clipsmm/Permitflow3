let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .styles(['resources/assets/brs_assets/brs.css'], 'public/css/app.css');

if (mix.inProduction()) {
    mix.version();
}else{
    //change the domain as per your dev domain
    mix.browserSync('permitflowv3.app');
}
