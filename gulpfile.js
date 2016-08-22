var elixir = require('laravel-elixir');

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

elixir(function(mix) {

    // Human-Resources > Contracts > Index CSS
    mix.styles([
        'bower/bootstrap-table/dist/bootstrap-table.css'
    ], 'public/css/index-contracts.css')

    // Human-Resources > Contracts > Index JS
    .scripts([
        'bower/bootstrap-table/dist/bootstrap-table.js',
        'bower/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js',
        'bower/bootstrap-table/dist/locale/bootstrap-table-es-SP.js',
        'me/js/base/human-resources/contracts/config_bootstrap_table.js'
    ], 'public/js/index-contracts.js')

    // Human-Resources > Contracts > Create CSS
    mix.styles([
        'bower/bootstrap-select/dist/css/bootstrap-select.css',
        'bower/clockpicker/dist/bootstrap-clockpicker.css'
    ], 'public/css/create-contracts.css')

    // Human-Resources > Contracts > Create JS
    .scripts([
        'bower/bootstrap-select/dist/js/bootstrap-select.js',
        'bower/clockpicker/dist/bootstrap-clockpicker.js',
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'components/bootstrap-clockpicker.js',
        'components/bootstrap-select.js',
        'components/bootstrap-maxlength.js'
    ], 'public/js/create-contracts.js')

    /*
     *  Output with version
     */
    .version([
        'public/css/index-contracts.css',
        'public/js/index-contracts.js',
        'public/css/create-contracts.css',
        'public/js/create-contracts.js'
    ]);

});
