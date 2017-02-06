const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
     mix.sass('app.scss');
    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts')
    mix.styles([
        'resources/assets/vendor/bootstrap/css/bootstrap.css',
        'resources/assets/vendor/animate/animate.css',
        'resources/assets/vendor/css/style.css',
        'resources/assets/vendor/font-awesome/css/font-awesome.css',
        'resources/assets/vendor/css/plugins/dataTables/datatables.min.css',
        'resources/assets/vendor/css/plugins/dataTables/responsive.dataTables.min.css',
        'resources/assets/vendor/css/plugins/dataTables/rowReorder.dataTables.min.css',
    ], 'public/css/vendor.css', './');
    mix.scripts([
        'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
        'resources/assets/vendor/bootstrap/js/bootstrap.js',
        'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
        'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
        'resources/assets/vendor/pace/pace.min.js',
        'resources/assets/vendor/js/plugins/datapicker/bootstrap-datepicker.js',
        'resources/assets/vendor/js/plugins/jasny/jasny-bootstrap.min.js',
        'resources/assets/vendor/js/plugins/dataTables/datatables.min.js',
        'resources/assets/vendor/js/plugins/dataTables/dataTables.responsive.min.js',
        'resources/assets/vendor/js/plugins/dataTables/dataTables.rowReorder.min.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js', './');

});
