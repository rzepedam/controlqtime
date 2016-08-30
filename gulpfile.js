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

    // Layout > Index CSS
    mix.styles([
        'me/img/favicon.ico',
        'bower/bootstrap/dist/css/bootstrap.css',
        //'bower/font-awesome/css/font-awesome.css',
        //'bower/animsition/dist/css/animsition.css',
        //'bower/jquery-asScrollable/dist/css/asScrollable.css',
        //'bower/Waves/dist/waves.css',
        //'bower/toastr/toastr.css',
        //'me/css/custom-color-toastr',
        //'bower/material-design-iconic-font/dist/css/material-design-iconic-font.css'
    ], 'public/css/layout/index-layout.css')


    // Layout > Scripts JS
    .scripts([
        'bower/jquery/dist/jquery.js',
        'bower/bootstrap/dist/js/bootstrap.js',
        'bower/animsition/dist/js/animsition.js',
        'bower/jquery-wheel/jquery.mousewheel.js',
        'bower/jquery-asScrollable/dist/jquery-asScrollable.js',
        'bower/Waves/dist/waves.js',
        'bower/toastr/toastr.js',
    ], 'public/js/layout/index-layout.js')

    .scripts([
        'components/animsition.js',
        'components/asscrollable.js',
    ], 'public/js/layout/index-layout-components.js')


    // Administration > Companies > Create CSS
    mix.styles([
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/administrations/companies/create-companies.css')


    // Administration > Companies > Create JS
    .scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/validations/valida_rut.js',
        'me/js/validations/valida_email.js',
        'me/js/change/change_region_province.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'bower/jquery-rut-plugin/jquery.Rut.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-datepicker.js',
        'me/js/base/administrations/companies/create-edit.js'
    ], 'public/js/administrations/companies/create-companies.js')


    // Administration > Companies > Edit CSS
    mix.styles([
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/administrations/companies/edit-companies.css')


    // Administration > Companies > Edit JS
    .scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/validations/valida_rut.js',
        'me/js/change/change_region_province.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'me/js/utilities/delete.js',
        'me/js/base/administrations/companies/create-edit.js',
        'bower/jquery-rut-plugin/jquery.Rut.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-datepicker.js',
    ], 'public/js/administrations/companies/edit-companies.js')


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
        'bower/autoNumeric/autoNumeric.js',
        'components/bootstrap-clockpicker.js',
        'components/bootstrap-select.js',
        'components/autoNumeric.js',
        'me/js/base/human-resources/contracts/create-edit.js',
        'me/js/utilities/sanitized-money-fields.js'
    ], 'public/js/human-resources/contracts/create-contracts.js')


    // Maintainers > Marital-Status > Create CSS
    .scripts([
        'me/js/base/maintainers/marital-statuses/config_bootstrap_table.js'
    ], 'public/js/maintainers/marital-statuses/index-marital-status.js')


    // Maintainers > Index JS
    .scripts([
        'me/js/base/maintainers/index.js'
    ], 'public/js/maintainers/index.js')

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
        'me/js/utilities/verifica_ultimos_numeros.js',
        'me/js/change/change_region_province.js'
    ], 'public/js/maintainers/terminals/create-terminals.js')


    // Maintainers > Terminals > Edit JS
    .scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'me/js/change/change_region_province.js',
        'me/js/utilities/delete.js'
    ], 'public/js/maintainers/terminals/edit-terminals.js')


    /*
     *  Output with version
     */
    .version([
        'public/css/layout/index-layout.css',
        'public/js/layout/index-layout.js',
        'public/js/layout/index-layout-components.js',
        'public/css/administrations/companies/create-companies.css',
        'public/js/administrations/companies/create-companies.js',
        'public/css/administrations/companies/edit-companies.css',
        'public/js/administrations/companies/edit-companies.js',
        'public/css/human-resources/contracts/index-contracts.css',
        'public/js/human-resources/contracts/index-contracts.js',
        'public/css/human-resources/contracts/create-contracts.css',
        'public/js/human-resources/contracts/create-contracts.js',
        'public/js/maintainers/index.js',
        'public/js/maintainers/marital-statuses/index-marital-status.js',
        'public/css/maintainers/terminals/index-terminals.css',
        'public/js/maintainers/terminals/index-terminals.js',
        'public/js/maintainers/terminals/create-terminals.js',
        'public/js/maintainers/terminals/edit-terminals.js'
    ]);

});
