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
    'node_modules/cropperjs/dist/cropper.min.js'
], 'public/js')
    .styles([
            'node_modules/jquery-confirm/dist/jquery-confirm.min.css',
            'resources/assets/css/app.css',
            'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
            'node_modules/chosen-js/chosen.css',
            'node_modules/intl-tel-input/build/css/intlTelInput.css',
            'node_modules/cropperjs/dist/cropper.min.css'
        ],
        'public/css/app.css')

    .copyDirectory('node_modules/intl-tel-input/build/img', 'public/images')
    .copy([
            'node_modules/chosen-js/chosen-sprite.png',
            'node_modules/chosen-js/chosen-sprite@2x.png'],
        'public/css')
    .copy('node_modules/intl-tel-input/build/js/utils.js',
        'public/js/intl-tel-input-util.js');

if (mix.inProduction()) {
    mix.version();
} else {
    //change the domain as per your dev domain
    mix.browserSync('permitflowv3.app');
}
