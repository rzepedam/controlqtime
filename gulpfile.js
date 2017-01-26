const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

/* -------------------------------- Configuration ----------------------------------------- */

elixir.config.css.folder                 = '';
elixir.config.js.folder                  = '';
elixir.config.sourcemaps                 = false;
elixir.config.css.minifier.pluginOptions = {
    keepSpecialComments: 0
};

/* --------------------------------------------------------------------------------------- */

elixir(function (mix) {

    // Default Laravel CSS
    mix.sass('app.scss')
        .webpack('js/app.js');


    // Login CSS
    mix.styles([
        'me/css/login/login.css'
    ], 'public/css/login/login.css');

    // Login JS
    mix.scripts([
        'components/material.js'
    ], 'public/js/login/login.js');


    // Layout > Stylesheets CSS
    mix.styles([
        'bower/packages-for-cqtime/css/bootstrap.css',
        'bower/packages-for-cqtime/css/bootstrap-extend.css',
        'bower/packages-for-cqtime/css/site.css'
    ], 'public/css/index-layout-core.css');

    // Layout > Plugins CSS
    mix.styles([
        'bower/animsition/dist/css/animsition.css',
        'bower/jquery-asScrollable/dist/css/asScrollable.css',
        'bower/jquery-asScrollbar/dist/css/asScrollbar.css',
        'bower/Waves/dist/waves.css',
        'bower/toastr/toastr.css',
        'me/css/custom-color-toastr.css'
    ], 'public/css/index-layout-plugin.css');

    // Layout > Fonts CSS
    mix.styles([
        'bower/font-awesome/css/font-awesome.css',
        'bower/packages-for-cqtime/css/material-design.css',
    ], 'public/css/index-layout-fonts.css');

    // Layout > Style Owned CSS
    mix.styles([
        'me/css/style.css'
    ], 'public/css/style.css');

    // Layout > Script Browsers Utilities
    mix.scripts([
        'bower/packages-for-cqtime/js/modernizr.js',
        'bower/breakpoints.js/dist/breakpoints.js'
    ], 'public/js/index-layout-browser-utilities.js');

    // Layout > Core JS
    mix.scripts([
        'bower/packages-for-cqtime/js/jquery.js',
        'bower/packages-for-cqtime/js/bootstrap.js',
        'bower/animsition/dist/js/animsition.js',
        'bower/jquery-scrollTo/dist/jquery-scrollTo.js',
        'bower/jquery-mousewheel/jquery.mousewheel.js',
        'bower/jquery-asScrollbar/dist/jquery-asScrollbar.js',
        'bower/jquery-asScrollable/dist/jquery-asScrollable.js',
        'bower/jquery-asHoverScroll/dist/jquery-asHoverScroll.js',
        'bower/Waves/dist/waves.js',
        'bower/toastr/toastr.js'
    ], 'public/js/index-layout-core.js');

    // Layout > Scripts JS
    mix.scripts([
        'bower/packages-for-cqtime/js/core.js',
        'bower/packages-for-cqtime/js/site.js',
        'bower/packages-for-cqtime/js/menu.js',
        'bower/packages-for-cqtime/js/menubar.js',
        'bower/packages-for-cqtime/js/sidebar.js',
        'bower/packages-for-cqtime/js/v1.js',
    ], 'public/js/index-layout-scripts.js');

    // Layout > Components JS
    mix.scripts([
        'components/animsition.js',
        'components/asscrollable.js'
    ], 'public/js/index-layout-components.js');


    // Index Common CSS
    mix.styles([
        'bower/bootstrap-table/dist/bootstrap-table.css'
    ], 'public/css/index-common.css');

    // Index Common JS
    mix.scripts([
        'custom-configuration/js/bootstrap-table.js',
        'bower/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js',
        'custom-configuration/js/bootstrap-table-es-ES.js'
    ], 'public/js/index-common.js');

    // Create-Edit Common CSS
    mix.styles([
        'bower/sweetalert/dist/sweetalert.css'
    ], 'public/css/create-edit-common.css');

    // Create-Edit Common JS
    mix.scripts([
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'components/bootstrap-maxlength.js',
        'bower/sweetalert/dist/sweetalert.min.js',
        'me/js/utilities/submit-form-ajax.js',
        'me/js/utilities/add_csrf_token.js',
    ], 'public/js/create-edit-common.js');

    // Edit Common JS
    mix.scripts([
        'me/js/utilities/delete.js'
    ], 'public/js/edit-common.js');

    // Show With Images Common CSS
    mix.styles([
        'bower/magnific-popup/dist/magnific-popup.css'
    ], 'public/css/show-with-image-common.css');

    // Show With Images Common JS
    mix.scripts([
        'bower/magnific-popup/dist/jquery.magnific-popup.js',
        'components/magnific-popup.js',
        'me/js/utilities/download-files.js'
    ], 'public/js/show-with-image-common.js');

    // Upload Common CSS
    mix.styles([
        'bower/bootstrap-fileinput/css/fileinput.css'
    ], 'public/css/upload-common.css');

    // Upload Common JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'custom-configuration/js/fileinput.js'
    ], 'public/js/upload-common.js');


    // Administrations > Index Menú JS
    mix.scripts([
        'me/js/base/administrations/index.js'
    ], 'public/js/administrations/index.js');

    // Administrations > Companies > Index Custom Companies JS
    mix.scripts([
        'me/js/base/administrations/companies/config_bootstrap_table.js'
    ], 'public/js/administrations/companies/index-custom-companies.js');

    // Administration > Companies > Create-Edit Custom CSS
    mix.styles([
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/administrations/companies/create-edit-custom-companies.css');

    // Administration > Companies > Create-Edit Custom JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/validations/valida_rut.js',
        'me/js/validations/valida_email.js',
        'me/js/change/change_region_province.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'custom-configuration/js/jquery.Rut.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-datepicker.js',
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'components/bootstrap-maxlength.js',
        'me/js/utilities/submit-form-ajax.js'
    ], 'public/js/administrations/companies/create-edit-custom-companies.js');


    // Human-Resources > Index Menú JS
    mix.scripts([
        'me/js/base/human-resources/index.js'
    ], 'public/js/human-resources/index.js');

    // Human-Resources > Daily-Assistances > Index Custom Daily-Assistances CSS
    mix.styles([
        'custom-configuration/css/bootstrap-select.css',
        'me/css/human-resources/daily-assistances/index.css',
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/human-resources/daily-assistances/index-custom-daily-assistances.css');

    // Human-Resources > Daily-Assistances > Index Custom Daily-Assistances JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'bower/bootstrap-select/dist/js/bootstrap-select.js',
        'components/bootstrap-select.js',
        'components/bootstrap-datepicker.js',
        'me/js/base/human-resources/daily-assistances/index-custom.js'
    ], 'public/js/human-resources/daily-assistances/index-custom-daily-assistances.js');

    // Human-Resources > Contracts > Index Custom Contracts JS
    mix.scripts([
        'me/js/base/human-resources/contracts/config_bootstrap_table.js'
    ], 'public/js/human-resources/contracts/index-custom-contracts.js');

    // Human-Resource > Employees > Index Custom Employees CSS
    mix.scripts([
        'bower/sweetalert/dist/sweetalert.css'
    ], 'public/css/human-resources/employees/index-custom-employees.css');

    // Human-Resource > Employees > Index Custom Employees JS
    mix.scripts([
        'bower/sweetalert/dist/sweetalert.min.js',
        'me/js/base/human-resources/employees/restore_data_session.js',
        'me/js/base/human-resources/employees/config_bootstrap_table.js'
    ], 'public/js/human-resources/employees/index-custom-employees.js');

    // Human-Resources > Contracts > Create CSS
    mix.styles([
        'custom-configuration/css/bootstrap-select.css',
        'bower/clockpicker/dist/bootstrap-clockpicker.css'
    ], 'public/css/human-resources/contracts/create-custom-contracts.css');

    // Human-Resources > Contracts > Create JS
    mix.scripts([
        'bower/clockpicker/dist/bootstrap-clockpicker.js',
        'bower/bootstrap-select/dist/js/bootstrap-select.js',
        'bower/autoNumeric/autoNumeric.js',
        'components/bootstrap-clockpicker.js',
        'components/bootstrap-select.js',
        'components/autoNumeric.js',
        'me/js/utilities/sanitized-fields.js',
        'me/js/base/human-resources/contracts/custom-contracts.js'
    ], 'public/js/human-resources/contracts/create-custom-contracts.js');

    // Human-Resources > Employees > Create-Edit Custom CSS
    mix.styles([
        'custom-configuration/css/wizard.css',
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/human-resources/employees/create-edit-custom-employees.css');

    // Human-Resources > Employees > Create-Edit Custom JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'me/js/utilities/capitalize.js',
        'me/js/change/change_region_province.js',
        'me/js/validations/valida_email.js',
        'me/js/validations/valida_rut.js',
        'me/js/validations/employees/step1.js',
        'me/js/validations/employees/step2.js',
        'me/js/validations/employees/step3.js',
        'custom-configuration/js/jquery-wizard.js',
        'custom-configuration/js/jquery.Rut.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-datepicker.js',
        'me/js/utilities/scrollTop.js'
    ], 'public/js/human-resources/employees/create-edit-custom-employees.js');


    // Visits > Index Menú JS
    mix.scripts([
        'me/js/base/visits/index.js'
    ], 'public/js/visits/index.js');

    // Visits > Sign-In-Visits > Index Custom Sign-In-Visits JS
    mix.scripts([
        'me/js/base/visits/sign-in-visits/config_bootstrap_table.js'
    ], 'public/js/visits/sign-in-visits/index-custom-sign-in-visits.js');

    // Visits > Sign-In-Visits > Create-Edit Custom Sign-In-Visits CSS
    mix.styles([
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
        'bower/sweetalert/dist/sweetalert.css'
    ], 'public/css/visits/sign-in-visits/create-edit-custom-sign-in-visits.css');

    // Visits > Sign-In-Visits > Create-Edit Custom Sign-In-Visits JS
    mix.scripts([
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'components/bootstrap-maxlength.js',
        'bower/sweetalert/dist/sweetalert.min.js',
        'me/js/utilities/submit-form-ajax.js',
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/capitalize.js',
        'me/js/validations/valida_rut.js',
        'custom-configuration/js/jquery.Rut.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-datepicker.js',
        'me/js/validations/valida_email.js',
        'me/js/base/visits/sign-in-visits/custom_sign_in_visits.js'
    ], 'public/js/visits/sign-in-visits/create-edit-custom-sign-in-visits.js');

    // Visits > Sign-In-Visits > Show Sign-In-Visits CSS
    mix.styles([
        'bower/dropzone/dist/dropzone.css',
        'bower/lity/dist/lity.css',
    ], 'public/css/visits/sign-in-visits/show-custom-sign-in-visits.css');

    // Visits > Sign-In-Visits > Show Sign-In-Visits JS
    mix.scripts([
        'bower/dropzone/dist/dropzone.js',
        'custom-configuration/js/dropzone.js',
        'bower/lity/dist/lity.js'
    ], 'public/js/visits/sign-in-visits/show-custom-sign-in-visits.js');


    // Maintainers > Index Menú JS
    mix.scripts([
        'me/js/base/maintainers/index.js'
    ], 'public/js/maintainers/index.js');

    // Maintainers > Áreas > Index Custom Áreas JS
    mix.scripts([
        'me/js/base/maintainers/areas/config_bootstrap_table.js'
    ], 'public/js/maintainers/areas/index-custom-areas.js');

    // Maintainers > Cities > Index Custom Cities JS
    mix.scripts([
        'me/js/base/maintainers/cities/config_bootstrap_table.js'
    ], 'public/js/maintainers/cities/index-custom-cities.js');

    // Maintainers > Countries > Index Custom Countries JS
    mix.scripts([
        'me/js/base/maintainers/countries/config_bootstrap_table.js'
    ], 'public/js/maintainers/countries/index-custom-countries.js');

    // Maintainers > Day-Trips > Index Custom Day-Trips JS
    mix.scripts([
        'me/js/base/maintainers/day-trips/config_bootstrap_table.js'
    ], 'public/js/maintainers/day-trips/index-custom-day-trips.js');

    // Maintainers > Degrees > Index Custom Degrees JS
    mix.scripts([
        'me/js/base/maintainers/degrees/config_bootstrap_table.js'
    ], 'public/js/maintainers/degrees/index-custom-degrees.js');

    // Maintainers > Forecasts > Index Custom Forecasts JS
    mix.scripts([
        'me/js/base/maintainers/forecasts/config_bootstrap_table.js'
    ], 'public/js/maintainers/forecasts/index-custom-forecasts.js');

    // Maintainers > Fuels > Index Custom Fuels JS
    mix.scripts([
        'me/js/base/maintainers/fuels/config_bootstrap_table.js'
    ], 'public/js/maintainers/fuels/index-custom-fuels.js');

    // Maintainers > Institutions > Index Custom Institutions JS
    mix.scripts([
        'me/js/base/maintainers/institutions/config_bootstrap_table.js'
    ], 'public/js/maintainers/institutions/index-custom-institutions.js');

    // Maintainers > Labor-Unions > Index Custom Labor-Unions JS
    mix.scripts([
        'me/js/base/maintainers/labor-unions/config_bootstrap_table.js'
    ], 'public/js/maintainers/labor-unions/index-custom-labor-unions.js');

    // Maintainers > Marital-Statuses > Index Custom Marital-Statuses JS
    mix.scripts([
        'me/js/base/maintainers/marital-statuses/config_bootstrap_table.js'
    ], 'public/js/maintainers/marital-statuses/index-custom-marital-statuses.js');

    // Maintainers > Measuring-Units > Index Menú JS
    mix.scripts([
        'me/js/base/maintainers/measuring-units/index.js'
    ], 'public/js/maintainers/measuring-units/index.js');

    // Maintainers > Measuring-Units > Engine-Cubics > Index Custom Engine-Cubics JS
    mix.scripts([
        'me/js/base/maintainers/measuring-units/engine-cubics/config_bootstrap_table.js'
    ], 'public/js/maintainers/measuring-units/engine-cubics/index-custom-engine-cubics.js');

    // Maintainers > Measuring-Units > Weights > Index Custom Weights JS
    mix.scripts([
        'me/js/base/maintainers/measuring-units/weights/config_bootstrap_table.js'
    ], 'public/js/maintainers/measuring-units/weights/index-custom-weights.js');

    // Maintainers > Model-Vehicles > Index Custom Model-Vehicles JS
    mix.scripts([
        'me/js/base/maintainers/model-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/model-vehicles/index-custom-model-vehicles.js');

    // Maintainers > Mutualities > Index Custom Mutualities JS
    mix.scripts([
        'me/js/base/maintainers/mutualities/config_bootstrap_table.js'
    ], 'public/js/maintainers/mutualities/index-custom-mutualities.js');

    // Maintainers > Pensions > Index Custom Pensions JS
    mix.scripts([
        'me/js/base/maintainers/pensions/config_bootstrap_table.js'
    ], 'public/js/maintainers/pensions/index-custom-pensions.js');

    // Maintainers > Piece-Vehicles > Index Custom Piece-Vehicles JS
    mix.scripts([
        'me/js/base/maintainers/piece-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/piece-vehicles/index-custom-piece-vehicles.js');

    // Maintainers > Positions > Index Custom Positions JS
    mix.scripts([
        'me/js/base/maintainers/positions/config_bootstrap_table.js'
    ], 'public/js/maintainers/positions/index-custom-positions.js');

    // Maintainers > Professions > Index Custom Professions JS
    mix.scripts([
        'me/js/base/maintainers/professions/config_bootstrap_table.js'
    ], 'public/js/maintainers/professions/index-custom-professions.js');

    // Maintainers > Relationships > Index Custom Relationships JS
    mix.scripts([
        'me/js/base/maintainers/relationships/config_bootstrap_table.js'
    ], 'public/js/maintainers/relationships/index-custom-relationships.js');

    // Maintainers > Routes > Index Custom Routes JS
    mix.scripts([
        'me/js/base/maintainers/routes/config_bootstrap_table.js'
    ], 'public/js/maintainers/routes/index-custom-routes.js');

    // Maintainers > State-Piece-Vehicle > Index Custom State-Piece-Vehicle JS
    mix.scripts([
        'me/js/base/maintainers/state-piece-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/state-piece-vehicles/index-custom-state-piece-vehicles.js');

    // Maintainers > Terminals > Index Custom Terminals JS
    mix.scripts([
        'me/js/base/maintainers/terminals/config_bootstrap_table.js'
    ], 'public/js/maintainers/terminals/index-custom-terminals.js');

    // Maintainers > Terminals > Create-Edit Custom Terminals JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/utilities/verifica_ultimos_numeros.js',
        'me/js/change/change_region_province.js'
    ], 'public/js/maintainers/terminals/create-edit-custom-terminals.js');

    // Maintainers > Terms-And-Obligatories > Index Custom Terms-And-Obligatories JS
    mix.scripts([
        'me/js/base/maintainers/terms-and-obligatories/config_bootstrap_table.js'
    ], 'public/js/maintainers/terms-and-obligatories/index-custom-terms-and-obligatories.js');

    // Maintainers > Terms-And-Obligatories > Create-Edit Custom Terms-And-Obligatories CSS
    mix.scripts([
        'bower/switchery/dist/switchery.css'
    ], 'public/css/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.css');

    // Maintainers > Terms-And-Obligatories > Create-Edit Custom Terms-And-Obligatories JS
    mix.scripts([
        'bower/switchery/dist/switchery.js',
        'components/switchery.js'
    ], 'public/js/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.js');

    // Maintainers > Trademarks > Index Custom Trademarks JS
    mix.scripts([
        'me/js/base/maintainers/trademarks/config_bootstrap_table.js'
    ], 'public/js/maintainers/trademarks/index-custom-trademarks.js');

    // Maintainers > Type-Certifications > Index Custom Type-Certifications JS
    mix.scripts([
        'me/js/base/maintainers/type-certifications/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-certifications/index-custom-type-certifications.js');

    // Maintainers > Type-Companies > Index Custom Type-Companies JS
    mix.scripts([
        'me/js/base/maintainers/type-companies/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-companies/index-custom-type-companies.js');

    // Maintainers > Type-Contracts > Index Custom Type-Contracts JS
    mix.scripts([
        'me/js/base/maintainers/type-contracts/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-contracts/index-custom-type-contracts.js');

    // Maintainers > Type-Contracts > Create-Edit Custom Type-Contracts JS
    mix.scripts([
        'me/js/utilities/capitalize.js',
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'components/bootstrap-maxlength.js',
        'me/js/base/maintainers/type-contracts/custom-type-contracts.js'
    ], 'public/js/maintainers/type-contracts/create-edit-custom-type-contracts.js');

    // Maintainers > Type-Disabilities > Index Custom Type-Disabilities JS
    mix.scripts([
        'me/js/base/maintainers/type-disabilities/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-disabilities/index-custom-type-disabilities.js');

    // Maintainers > Type-Diseases > Index Custom Type-Diseases JS
    mix.scripts([
        'me/js/base/maintainers/type-diseases/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-diseases/index-custom-type-diseases.js');

    // Maintainers > Type-Exams > Index Custom Type-Exams JS
    mix.scripts([
        'me/js/base/maintainers/type-exams/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-exams/index-custom-type-exams.js');

    // Maintainers > Type-Institutions > Index Custom Type-Institutions JS
    mix.scripts([
        'me/js/base/maintainers/type-institutions/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-institutions/index-custom-type-institutions.js');

    // Maintainers > Type-Professional-licenses > Index Custom Type-Professional-licenses JS
    mix.scripts([
        'me/js/base/maintainers/type-professional-licenses/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-professional-licenses/index-custom-type-professional-licenses.js');

    // Maintainers > Type-Specialities > Index Custom Type-Specialities JS
    mix.scripts([
        'me/js/base/maintainers/type-specialities/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-specialities/index-custom-type-specialities.js');

    // Maintainers > Type-Vehicles > Index Custom Type-Vehicles JS
    mix.scripts([
        'me/js/base/maintainers/type-vehicles/config_bootstrap_table.js'
    ], 'public/js/maintainers/type-vehicles/index-custom-type-vehicles.js');


    // Operations > Index Menú JS
    mix.scripts([
        'me/js/base/operations/index.js'
    ], 'public/js/operations/index.js');

    // Operations > Vehicles > Index Custom Vehicles JS
    mix.scripts([
        'me/js/base/operations/vehicles/config_bootstrap_table.js'
    ], 'public/js/operations/vehicles/index-custom-vehicles.js');

    // Operations > Vehicles > Create-Edit Custom Vehicles CSS
    mix.styles([
        'bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'
    ], 'public/css/operations/vehicles/create-edit-custom-vehicles.css');

    // Operations > Vehicles > Create-Edit Custom Vehicles JS
    mix.scripts([
        'me/js/utilities/add_csrf_token.js',
        'me/js/change/change_trademark_model.js',
        'bower/bootstrap-maxlength/src/bootstrap-maxlength.js',
        'bower/autoNumeric/autoNumeric.js',
        'bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
        'components/bootstrap-maxlength.js',
        'components/autoNumeric.js',
        'components/bootstrap-datepicker.js',
        'me/js/utilities/sanitized-fields.js',
        'bower/sweetalert/dist/sweetalert.min.js',
        'me/js/base/operations/vehicles/custom-vehicles.js'
    ], 'public/js/operations/vehicles/create-edit-custom-vehicles.js');

    // Operations > Master-Form-Piece-Vehicles > Index Custom Master-Form-Piece-Vehicles JS
    mix.scripts([
        'me/js/base/operations/master-form-piece-vehicles/config_bootstrap_table.js'
    ], 'public/js/operations/master-form-piece-vehicles/index-custom-master-form-piece-vehicles.js');

    // Operations > Check-Vehicle-Forms > Index Custom Check-Vehicle-Forms JS
    mix.scripts([
        'me/js/base/operations/check-vehicle-forms/config_bootstrap_table.js'
    ], 'public/js/operations/check-vehicle-forms/index-custom-check-vehicle-forms.js');

    // Operations > Check-Vehicle-Forms > Create-Edit Custom Check-Vehicle-Forms JS
    mix.scripts([
        'me/js/utilities/select-unique-checkbox-group.js',
        'me/js/utilities/add_csrf_token.js',
        'me/js/base/operations/check-vehicle-forms/load-detail-vehicle.js'
    ], 'public/js/operations/check-vehicle-forms/create-edit-custom-check-vehicle-forms.js');


    // Copy fonts Font-Awesome
    mix.copy('resources/assets/bower/font-awesome/fonts', 'public/build/fonts');
    // Copy fonts Material-Design-Iconic-Font
    mix.copy('resources/assets/bower/packages-for-cqtime/fonts', 'public/build/fonts');
    // Copy fonts Owned
    mix.copy('resources/assets/me/fonts/', 'public/build/fonts', 'public/build/fonts');


    // Copy image logo.png
    mix.copy('resources/assets/me/img/logo.png', 'public/img');
    // Copy image favicon.ico
    mix.copy('resources/assets/me/img/favicon.ico', 'public/img');
    // Copy image remark.png
    mix.copy('resources/assets/me/img/remark.png', 'public/img');
    // Copy image sidebar dashboard-header.png
    mix.copy('resources/assets/me/img/dashboard-header.jpg', 'public/img');
    // Copy image for Header PDF-Contracts Stop_Frenos.png
    mix.copy('resources/assets/me/img/Stop_Frenos.png', 'public/img');
    // Copy image for Login logo_login.png
    mix.copy('resources/assets/me/img/logo_login.png', 'public/img');
    // Copy image Bootstrap-FileInput loading.gif
    mix.copy('resources/assets/bower/bootstrap-fileinput/img/loading.gif', 'public/build/img');
    // Copy image Bootstrap-FileInput loading-sm.gif
    mix.copy('resources/assets/bower/bootstrap-fileinput/img/loading-sm.gif', 'public/build/img');


    // Copy Bootstrap for Pdf-Contracts
    mix.copy('resources/assets/bower/packages-for-cqtime/css/bootstrap.css', 'public/css/human-resources/contracts/pdf');
    // Copy Index PDF Contracts
    mix.copy('resources/assets/me/css/human-resources/contracts/pdf/index-pdf-contracts.css', 'public/css/human-resources/contracts/pdf');
    // Copy Header PDF Contracts
    mix.copy('resources/assets/me/css/human-resources/contracts/pdf/header-pdf-contracts.css', 'public/css/human-resources/contracts/pdf');
    // Copy Footer PDF Contracts
    mix.copy('resources/assets/me/css/human-resources/contracts/pdf/footer-pdf-contracts.css', 'public/css/human-resources/contracts/pdf');
    // Copy 404 Page CSS
    mix.copy('resources/assets/me/css/404.css', 'public/css');


    /*
     *  Output with version
     */
    mix.version([
        'public/css/login/login.css',
        'public/js/login/login.js',

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
        'public/css/create-edit-common.css',
        'public/js/create-edit-common.js',
        'public/js/edit-common.js',
        'public/css/show-with-image-common.css',
        'public/js/show-with-image-common.js',
        'public/css/upload-common.css',
        'public/js/upload-common.js',

        'public/js/administrations/index.js',
        'public/js/administrations/companies/index-custom-companies.js',
        'public/css/administrations/companies/create-edit-custom-companies.css',
        'public/js/administrations/companies/create-edit-custom-companies.js',

        'public/js/human-resources/index.js',
        'public/css/human-resources/daily-assistances/index-custom-daily-assistances.css',
        'public/js/human-resources/daily-assistances/index-custom-daily-assistances.js',
        'public/js/human-resources/contracts/index-custom-contracts.js',
        'public/css/human-resources/employees/index-custom-employees.css',
        'public/js/human-resources/employees/index-custom-employees.js',
        'public/css/human-resources/contracts/create-custom-contracts.css',
        'public/js/human-resources/contracts/create-custom-contracts.js',
        'public/css/human-resources/employees/create-edit-custom-employees.css',
        'public/js/human-resources/employees/create-edit-custom-employees.js',

        'public/js/visits/index.js',
        'public/js/visits/sign-in-visits/index-custom-sign-in-visits.js',
        'public/css/visits/sign-in-visits/create-edit-custom-sign-in-visits.css',
        'public/js/visits/sign-in-visits/create-edit-custom-sign-in-visits.js',
        'public/css/visits/sign-in-visits/show-custom-sign-in-visits.css',
        'public/js/visits/sign-in-visits/show-custom-sign-in-visits.js',

        'public/js/maintainers/index.js',
        'public/js/maintainers/areas/index-custom-areas.js',
        'public/js/maintainers/cities/index-custom-cities.js',
        'public/js/maintainers/countries/index-custom-countries.js',
        'public/js/maintainers/day-trips/index-custom-day-trips.js',
        'public/js/maintainers/degrees/index-custom-degrees.js',
        'public/js/maintainers/forecasts/index-custom-forecasts.js',
        'public/js/maintainers/fuels/index-custom-fuels.js',
        'public/js/maintainers/institutions/index-custom-institutions.js',
        'public/js/maintainers/marital-statuses/index-custom-marital-statuses.js',
        'public/js/maintainers/piece-vehicles/index-custom-piece-vehicles.js',
        'public/js/maintainers/measuring-units/index.js',
        'public/js/maintainers/measuring-units/engine-cubics/index-custom-engine-cubics.js',
        'public/js/maintainers/measuring-units/weights/index-custom-weights.js',
        'public/js/maintainers/model-vehicles/index-custom-model-vehicles.js',
        'public/js/maintainers/mutualities/index-custom-mutualities.js',
        'public/js/maintainers/pensions/index-custom-pensions.js',
        'public/js/maintainers/positions/index-custom-positions.js',
        'public/js/maintainers/professions/index-custom-professions.js',
        'public/js/maintainers/relationships/index-custom-relationships.js',
        'public/js/maintainers/routes/index-custom-routes.js',
        'public/js/maintainers/state-piece-vehicles/index-custom-state-piece-vehicles.js',
        'public/js/maintainers/terminals/index-custom-terminals.js',
        'public/js/maintainers/terminals/create-edit-custom-terminals.js',
        'public/js/maintainers/terms-and-obligatories/index-custom-terms-and-obligatories.js',
        'public/css/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.css',
        'public/js/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.js',
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

        'public/js/operations/index.js',
        'public/js/operations/vehicles/index-custom-vehicles.js',
        'public/css/operations/vehicles/create-edit-custom-vehicles.css',
        'public/js/operations/vehicles/create-edit-custom-vehicles.js',
        'public/js/operations/master-form-piece-vehicles/index-custom-master-form-piece-vehicles.js',
        'public/js/operations/check-vehicle-forms/index-custom-check-vehicle-forms.js',
        'public/js/operations/check-vehicle-forms/create-edit-custom-check-vehicle-forms.js'
    ]);

})

/*
 *  Cuando se agrega un custom JS, no agregar en vista create-edit-common, copiar estos archivos
 *  y agregar a su sección custom y eliminar el submit-form, ya que en el custom, ya está el submit del form.
 */