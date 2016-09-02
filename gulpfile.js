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

    // Layout > Stylesheets CSS
    mix.styles([
        'bower/packages-for-cqtime/css/bootstrap.css',
        'bower/packages-for-cqtime/css/bootstrap-extend.css',
        'bower/packages-for-cqtime/css/site.css',
    ], 'public/css/index-layout-core.css')

    // Layout > Plugins CSS
    mix.styles([
        'bower/animsition/dist/css/animsition.css',
        'bower/jquery-asScrollable/dist/css/asScrollable.css',
        'bower/Waves/dist/waves.css',
        'bower/toastr/toastr.css',
        'me/css/custom-color-toastr.css'
    ], 'public/css/index-layout-plugin.css')

    // Layout > Fonts CSS
    mix.styles([
        'bower/font-awesome/css/font-awesome.css',
        'bower/packages-for-cqtime/css/material-design.css',
    ], 'public/css/index-layout-fonts.css')

    // Layout > Style Owned CSS
    mix.styles([
        'me/css/style.css'
    ], 'public/css/style.css')

    // Layout > Script Browsers Utilities
    mix.styles([
        'bower/packages-for-cqtime/js/modernizr.js',
        'bower/breakpoints.js/dist/breakpoints.js'
    ], 'public/js/index-layout-browser-utilities.js')

    // Layout > Core JS
    .scripts([
        'bower/packages-for-cqtime/js/jquery.js',
        'bower/packages-for-cqtime/js/bootstrap.js',
        'bower/animsition/dist/js/animsition.js',
        'bower/jquery-scrollTo/dist/jquery-asScroll.js',
        'bower/jquery-wheel/jquery.mousewheel.js',
        'bower/jquery-asScrollable/dist/jquery-asScrollable.js',
        'bower/jquery-asHoverScroll/dist/jquery-asHoverScroll.js',
        'bower/Waves/dist/waves.js',
        'bower/toastr/toastr.js',
    ], 'public/js/index-layout-core.js')

    // Layout > Scripts JS
    .scripts([
        'bower/packages-for-cqtime/js/core.js',
        'bower/packages-for-cqtime/js/site.js',
        'bower/packages-for-cqtime/js/menu.js',
        'bower/packages-for-cqtime/js/menubar.js',
        'bower/packages-for-cqtime/js/sidebar.js',
        'bower/packages-for-cqtime/js/v1.js',
    ], 'public/js/index-layout-scripts.js')

    // Layout > Components JS
    .scripts([
        'components/animsition.js',
        'components/asscrollable.js',
    ], 'public/js/index-layout-components.js')



    // Index Common CSS
    mix.styles([
        'bower/bootstrap-table/dist/bootstrap-table.css'
    ], 'public/css/index-common.css')

    // Index Common JS
    .scripts([
        'bower/bootstrap-table/dist/bootstrap-table.js',
        'bower/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js',
        'bower/bootstrap-table/dist/locale/bootstrap-table-es-ES.js',
    ], 'public/js/index-common.js')



    // Administrations > Index Menú JS
    .scripts([
        'me/js/base/administrations/index.js'
    ], 'public/js/administrations/index.js')

    // Administrations > Companies > Index Custom Companies JS
    .scripts([
        'me/js/base/administrations/companies/config_bootstrap_table.js'
    ], 'public/js/administrations/companies/index-custom-companies.js')



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



    // Human-Resources > Index Menú JS
    .scripts([
        'me/js/base/human-resources/index.js'
    ], 'public/js/human-resources/index.js')

    // Human-Resources > Access-Control > Index Custom Access-Control JS
    .scripts([
        'me/js/base/human-resources/access-controls/config_bootstrap_table.js'
    ], 'public/js/human-resources/access-controls/index-custom-access-controls.js')

    // Human-Resources > Contracts > Index Custom Contracts JS
    .scripts([
        'me/js/base/human-resources/contracts/config_bootstrap_table.js'
    ], 'public/js/human-resources/contracts/index-custom-contracts.js')

    // Human-Resource > Employees > Index Custom Employees CSS
    .scripts([
        'bower/sweetalert/dist/sweetalert.css'
    ], 'public/css/human-resources/employees/index-custom-employees.css')

    // Human-Resource > Employees > Index Custom Employees JS
    .scripts([
        'bower/sweetalert/dist/sweetalert.min.js',
        'me/js/base/human-resources/employees/restore_data_session.js',
        'me/js/base/human-resources/employees/config_bootstrap_table.js'
    ], 'public/js/human-resources/employees/index-custom-employees.js')




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



    // Operations > Index Menú JS
    .scripts([
        'me/js/base/operations/index.js'
    ], 'public/js/operations/index.js')

    // Operations > Vehicles > Index Custom Vehicles JS
    .scripts([
        'me/js/base/operations/vehicles/config_bootstrap_table.js'
    ], 'public/js/operations/vehicles/index-custom-vehicles.js')



    // Maintainers > Index Menú JS
    .scripts([
        'me/js/base/maintainers/index.js'
    ], 'public/js/maintainers/index.js')

    // Maintainers > Áreas > Index Custom Áreas JS
    .scripts([
        'me/js/base/maintainers/areas/config_bootstrap_table.js'
    ], 'public/js/maintainers/areas/index-custom-areas.js')

    // Maintainers > Cities > Index Custom Cities JS
    .scripts([
        'me/js/base/maintainers/cities/config_bootstrap_table.js'
    ], 'public/js/maintainers/cities/index-custom-cities.js')

    // Maintainers > Countries > Index Custom Countries JS
    .scripts([
        'me/js/base/maintainers/countries/config_bootstrap_table.js'
    ], 'public/js/maintainers/countries/index-custom-countries.js')

    // Maintainers > Day-Trips > Index Custom Day-Trips JS
    .scripts([
        'me/js/base/maintainers/day-trips/config_bootstrap_table.js'
    ], 'public/js/maintainers/day-trips/index-custom-day-trips.js')

    // Maintainers > Degrees > Index Custom Degrees JS
    .scripts([
        'me/js/base/maintainers/degrees/config_bootstrap_table.js'
    ], 'public/js/maintainers/degrees/index-custom-degrees.js')

    // Maintainers > Forecasts > Index Custom Forecasts JS
    .scripts([
        'me/js/base/maintainers/forecasts/config_bootstrap_table.js'
    ], 'public/js/maintainers/forecasts/index-custom-forecasts.js')

    // Maintainers > Fuels > Index Custom Fuels JS
    .scripts([
        'me/js/base/maintainers/fuels/config_bootstrap_table.js'
    ], 'public/js/maintainers/fuels/index-custom-fuels.js')

    // Maintainers > Gratifications > Index Custom Gratifications JS
    .scripts([
        'me/js/base/maintainers/gratifications/config_bootstrap_table.js'
    ], 'public/js/maintainers/gratifications/index-custom-gratifications.js')

    // Maintainers > Institutions > Index Custom Institutions JS
    .scripts([
        'me/js/base/maintainers/institutions/config_bootstrap_table.js'
    ], 'public/js/maintainers/institutions/index-custom-institutions.js')

    // Maintainers > Marital-Statuses > Index Custom Marital-Statuses JS
    .scripts([
        'me/js/base/maintainers/marital-statuses/config_bootstrap_table.js'
    ], 'public/js/maintainers/marital-statuses/index-custom-marital-statuses.js')

    // Maintainers > Measuring-Units > Index Menú JS
    .scripts([
        'me/js/base/maintainers/measuring-units/index.js'
    ], 'public/js/maintainers/measuring-units/index.js')

    // Maintainers > Measuring-Units > Engine-Cubics > Index Custom Engine-Cubics JS
    .scripts([
        'me/js/base/maintainers/measuring-units/engine-cubics/config_bootstrap_table.js'
    ], 'public/js/maintainers/measuring-units/engine-cubics/index-custom-engine-cubics.js')

    // Maintainers > Measuring-Units > Weights > Index Custom Weights JS
    .scripts([
        'me/js/base/maintainers/measuring-units/weights/config_bootstrap_table.js'
    ], 'public/js/maintainers/measuring-units/weights/index-custom-weights.js')

    // Maintainers > Model-Vehicles > Index Custom Model-Vehicles JS
    .scripts([
        'me/js/base/maintainers/model-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/model-vehicles/index-custom-model-vehicles.js')

    // Maintainers > Mutualities > Index Custom Mutualities JS
    .scripts([
        'me/js/base/maintainers/mutualities/config_bootstrap_table.js'
    ], 'public/js/maintainers/mutualities/index-custom-mutualities.js')

    // Maintainers > Num-Hours > Index Custom Num-Hours JS
    .scripts([
        'me/js/base/maintainers/num-hours/config_bootstrap_table.js'
    ], 'public/js/maintainers/num-hours/index-custom-num-hours.js')

    // Maintainers > Pensions > Index Custom Pensions JS
    .scripts([
        'me/js/base/maintainers/pensions/config_bootstrap_table.js'
    ], 'public/js/maintainers/pensions/index-custom-pensions.js')

    // Maintainers > Periodicities > Index Custom Periodicities JS
    .scripts([
        'me/js/base/maintainers/periodicities/config_bootstrap_table.js'
    ], 'public/js/maintainers/periodicities/index-custom-periodicities.js')

    // Maintainers > Positions > Index Custom Positions JS
    .scripts([
        'me/js/base/maintainers/positions/config_bootstrap_table.js'
    ], 'public/js/maintainers/positions/index-custom-positions.js')

    // Maintainers > Professions > Index Custom Professions JS
    .scripts([
        'me/js/base/maintainers/professions/config_bootstrap_table.js'
    ], 'public/js/maintainers/professions/index-custom-professions.js')

    // Maintainers > Relationships > Index Custom Relationships JS
    .scripts([
        'me/js/base/maintainers/relationships/config_bootstrap_table.js'
    ], 'public/js/maintainers/relationships/index-custom-relationships.js')

    // Maintainers > Routes > Index Custom Routes JS
    .scripts([
        'me/js/base/maintainers/routes/config_bootstrap_table.js'
    ], 'public/js/maintainers/routes/index-custom-routes.js')

    // Maintainers > Terminals > Index Custom Terminals JS
    .scripts([
        'me/js/base/maintainers/terminals/config_bootstrap_table.js'
    ], 'public/js/maintainers/terminals/index-custom-terminals.js')

    // Maintainers > Terms-And-Obligatories > Index Custom Terms-And-Obligatories JS
    .scripts([
        'me/js/base/maintainers/terms-and-obligatories/config_bootstrap_table.js'
    ], 'public/js/maintainers/terms-and-obligatories/index-custom-terms-and-obligatories.js')

    // Maintainers > Trademarks > Index Custom Trademarks JS
    .scripts([
        'me/js/base/maintainers/trademarks/config_bootstrap_table.js'
    ], 'public/js/maintainers/trademarks/index-custom-trademarks.js')

    // Maintainers > Type-Certifications > Index Custom Type-Certifications JS
    .scripts([
        'me/js/base/maintainers/type-certifications/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-certifications/index-custom-type-certifications.js')

    // Maintainers > Type-Companies > Index Custom Type-Companies JS
    .scripts([
        'me/js/base/maintainers/type-companies/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-companies/index-custom-type-companies.js')

    // Maintainers > Type-Contracts > Index Custom Type-Contracts JS
    .scripts([
        'me/js/base/maintainers/type-contracts/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-contracts/index-custom-type-contracts.js')

    // Maintainers > Type-Disabilities > Index Custom Type-Disabilities JS
    .scripts([
        'me/js/base/maintainers/type-disabilities/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-disabilities/index-custom-type-disabilities.js')

    // Maintainers > Type-Diseases > Index Custom Type-Diseases JS
    .scripts([
        'me/js/base/maintainers/type-diseases/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-diseases/index-custom-type-diseases.js')

    // Maintainers > Type-Exams > Index Custom Type-Exams JS
    .scripts([
        'me/js/base/maintainers/type-exams/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-exams/index-custom-type-exams.js')

    // Maintainers > Type-Institutions > Index Custom Type-Institutions JS
    .scripts([
        'me/js/base/maintainers/type-institutions/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-institutions/index-custom-type-institutions.js')

    // Maintainers > Type-Professional-licenses > Index Custom Type-Professional-licenses JS
    .scripts([
        'me/js/base/maintainers/type-professional-licenses/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-professional-licenses/index-custom-type-professional-licenses.js')

    // Maintainers > Type-Specialities > Index Custom Type-Specialities JS
    .scripts([
        'me/js/base/maintainers/type-specialities/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-specialities/index-custom-type-specialities.js')

    // Maintainers > Type-Vehicles > Index Custom Type-Vehicles JS
    .scripts([
        'me/js/base/maintainers/type-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-vehicles/index-custom-type-vehicles.js')





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
    mix.version([
        'public/css/index-layout-core.css',
        'public/css/index-layout-plugin.css',
        'public/css/index-layout-fonts.css',
        'public/css/style.css',
        'public/js/index-layout-browser-utilities.js',
        'public/js/index-layout-core.js',
        'public/js/index-layout-scripts.js',
        'public/js/index-layout-components.js',
        'public/css/index-common.css',
        'public/js/index-common.js',
        'public/js/administrations/index.js',
        /*'public/css/administrations/companies/create-companies.css',
        'public/js/administrations/companies/create-companies.js',
        'public/css/administrations/companies/edit-companies.css',
        'public/js/administrations/companies/edit-companies.js',
        'public/css/human-resources/contracts/create-contracts.css',
        'public/js/human-resources/contracts/create-contracts.js',*/
        'public/js/human-resources/index.js',
        'public/js/administrations/companies/index-custom-companies.js',
        'public/js/human-resources/access-controls/index-custom-access-controls.js',
        'public/js/human-resources/contracts/index-custom-contracts.js',
        'public/css/human-resources/employees/index-custom-employees.css',
        'public/js/human-resources/employees/index-custom-employees.js',
        'public/js/operations/index.js',
        'public/js/operations/vehicles/index-custom-vehicles.js',
        'public/js/maintainers/index.js',
        'public/js/maintainers/areas/index-custom-areas.js',
        'public/js/maintainers/cities/index-custom-cities.js',
        'public/js/maintainers/countries/index-custom-countries.js',
        'public/js/maintainers/day-trips/index-custom-day-trips.js',
        'public/js/maintainers/degrees/index-custom-degrees.js',
        'public/js/maintainers/forecasts/index-custom-forecasts.js',
        'public/js/maintainers/fuels/index-custom-fuels.js',
        'public/js/maintainers/gratifications/index-custom-gratifications.js',
        'public/js/maintainers/institutions/index-custom-institutions.js',
        'public/js/maintainers/marital-statuses/index-custom-marital-statuses.js',
        'public/js/maintainers/measuring-units/index.js',
        'public/js/maintainers/measuring-units/engine-cubics/index-custom-engine-cubics.js',
        'public/js/maintainers/measuring-units/weights/index-custom-weights.js',
        'public/js/maintainers/model-vehicles/index-custom-model-vehicles.js',
        'public/js/maintainers/mutualities/index-custom-mutualities.js',
        'public/js/maintainers/num-hours/index-custom-num-hours.js',
        'public/js/maintainers/pensions/index-custom-pensions.js',
        'public/js/maintainers/periodicities/index-custom-periodicities.js',
        'public/js/maintainers/positions/index-custom-positions.js',
        'public/js/maintainers/professions/index-custom-professions.js',
        'public/js/maintainers/relationships/index-custom-relationships.js',
        'public/js/maintainers/routes/index-custom-routes.js',
        'public/js/maintainers/terminals/index-custom-terminals.js',
        'public/js/maintainers/terms-and-obligatories/index-custom-terms-and-obligatories.js',
        'public/js/maintainers/trademarks/index-custom-trademarks.js',
        'public/js/maintainers/type-certifications/index-custom-type-certifications.js',
        'public/js/maintainers/type-companies/index-custom-type-companies.js',
        'public/js/maintainers/type-contracts/index-custom-type-contracts.js',
        'public/js/maintainers/type-disabilities/index-custom-type-disabilities.js',
        'public/js/maintainers/type-diseases/index-custom-type-diseases.js',
        'public/js/maintainers/type-exams/index-custom-type-exams.js',
        'public/js/maintainers/type-institutions/index-custom-type-institutions.js',
        'public/js/maintainers/type-professional-licenses/index-custom-type-professional-licenses.js',
        'public/js/maintainers/type-specialities/index-custom-type-specialities.js',
        'public/js/maintainers/type-vehicles/index-custom-type-vehicles.js',
        'public/js/maintainers/terminals/create-terminals.js',
        'public/js/maintainers/terminals/edit-terminals.js'
    ]);

    // Copy fonts Font-Awesome
    mix.copy('resources/assets/bower/font-awesome/fonts', 'public/build/fonts');
    // Copy fonts Material-Design-Iconic-Font
    mix.copy('resources/assets/bower/packages-for-cqtime/fonts', 'public/build/fonts');
    // Copy fonts Owned
    mix.copy('resources/assets/me/fonts/', 'public/build/fonts', 'public/build/fonts');
    // Copy image remark.png
    mix.copy('resources/assets/me/img/remark.png', 'public/img');

});
