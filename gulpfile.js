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
    ], 'public/css/human-resources/contracts/index-contracts.css')


    // Human-Resources > Contracts > Index JS
    .scripts([
        'bower/bootstrap-table/dist/bootstrap-table.js',
        'bower/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js',
        'bower/bootstrap-table/dist/locale/bootstrap-table-es-SP.js',
        'me/js/base/human-resources/contracts/config_bootstrap_table.js'
    ], 'public/js/human-resources/contracts/index-contracts.js')


    // Human-Resources > Contracts > Create CSS
    mix.styles([
        'bower/bootstrap-select/dist/css/bootstrap-select.css',
        'bower/clockpicker/dist/bootstrap-clockpicker.css'
    ], 'public/css/human-resources/contracts/create-contracts.css')


    // Human-Resources > Contracts > Create JS
    .scripts([
        'bower/clockpicker/dist/bootstrap-clockpicker.js',
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'bower/bootstrap-select/dist/js/bootstrap-select.js',
        'components/bootstrap-clockpicker.js',
        'components/bootstrap-maxlength.js',
        'components/bootstrap-select.js'
    ], 'public/js/human-resources/contracts/create-contracts.js')


    // Maintainers > Terminals > Index CSS
    mix.styles([
        'bower/bootstrap-table/dist/bootstrap-table.css'
    ], 'public/css/maintainers/terminals/index-terminals.css')


    // Maintainers > Terminals > Index JS
    .scripts([
        'bower/bootstrap-table/dist/bootstrap-table.js',
        'bower/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js',
        'bower/bootstrap-table/dist/locale/bootstrap-table-es-SP.js',
        'me/js/base/maintainers/terminals/config_bootstrap_table.js'
    ], 'public/js/maintainers/terminals/index-terminals.js')


    // Maintainers > Terminals > Create JS
    .scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/verificaUltimosNumeros.js',
        'me/js/change/changeRegionProvince.js'
    ], 'public/js/maintainers/terminals/create-terminals.js')


    // Maintainers > Terminals > Edit JS
    .scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/verificaUltimosNumeros.js',
        'me/js/change/changeRegionProvince.js',
        'me/js/utilities/delete.js'
    ], 'public/js/maintainers/terminals/edit-terminals.js')


    /*
     *  Output with version
     */
    .version([
        'public/css/human-resources/contracts/index-contracts.css',
        'public/js/human-resources/contracts/index-contracts.js',
        'public/css/human-resources/contracts/create-contracts.css',
        'public/js/human-resources/contracts/create-contracts.js',
        'public/css/maintainers/terminals/index-terminals.css',
        'public/js/maintainers/terminals/index-terminals.js',
        'public/js/maintainers/terminals/create-terminals.js',
        'public/js/maintainers/terminals/edit-terminals.js'
    ]);

});
