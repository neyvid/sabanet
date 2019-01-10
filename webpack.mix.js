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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/frontend/customJs.js','public/js/frontend/customJs.js')
    .js(['resources/js/admin/pages/dashboard.js','resources/js/admin/pages/dashboard2.js','resources/js/admin/adminlte.min.js','resources/js/admin/demo.js','resources/js/admin/persian-date.js','resources/js/admin/persian-date-0.1.8.min.js','resources/js/admin/persian-datepicker-0.4.5.min.js'],'public/js/admin/adminJs.js')
    .js('resources/js/admin/customAdminJs.js','public/js/admin/customAdminJs.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles('resources/css/frontend/frontendCss.css','public/css/frontendCss.css')
    .styles('resources/css/frontend/swiper.css','public/css/frontend/swiper.css')
    .styles('resources/css/admin/adminCustom.css','public/css/admin/adminCustom.css')
    .styles(['resources/css/admin/AdminLTE.css','resources/css/admin/bootstrap-theme.css','resources/css/admin/jquery-ui.min.css','resources/css/admin/persian-datepicker-0.4.5.min.css','resources/css/admin/rtl.css','resources/css/admin/skins/_all-skins.css'],'public/css/admin/admin.css');
