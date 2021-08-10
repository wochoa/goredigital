const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/jquery-ui.min.js',
    'resources/js/script.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/Chart.min.js',
    'resources/js/sparkline.js',
    'resources/js/jquery.knob.min.js',
    'resources/js/moment.min.js',
    'resources/js/daterangepicker.js',
    'resources/js/tempusdominus-bootstrap-4.min.js',
    'resources/js/summernote-bs4.min.js',
    'resources/js/jquery.overlayScrollbars.min.js',
    'resources/js/adminlte.js'
],
    'public/js/app.js')
.styles([
    'resources/css/all.css',
    'resources/css/ionicons.min.css',
    'resources/css/tempusdominus-bootstrap-4.css',
    'resources/css/icheck-bootstrap.min.css',
    'resources/css/jqvmap.min.css',
    'resources/css/adminlte.min.css',
    'resources/css/OverlayScrollbars.min.css',
    'resources/css/daterangepicker.css',
    'resources/css/summernote-bs4.min.css'

],'public/css/app.css');