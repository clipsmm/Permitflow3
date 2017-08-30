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

mix.js([
        'resources/assets/js/app.js',
        'resources/assets/js/intlTelInput.min.js'
    ], 'public/js')
   .styles([
           'node_modules/jquery-confirm/dist/jquery-confirm.min.css',
           'resources/assets/css/app.css',
           'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
           'node_modules/select2/dist/css/select2.css',
           'resources/assets/css/intlTelInput.css'
       ],
       'public/css/app.css');

if (mix.inProduction()) {
    mix.version();
}else{
    //change the domain as per your dev domain
    mix.browserSync('permitflowv3.app');
}
