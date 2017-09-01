const { mix } = require('laravel-mix');

// Laravel
    mix.js('resources/assets/js/app.js', 'public/js')
       .sass('resources/assets/sass/app.scss', 'public/css');

// Login
    mix.combine([
        'resources/assets/custom-remark/css/login.css',
        'node_modules/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'
    ], 'public/css/login.css')
    .scripts('resources/assets/components/material.js', 'public/js/login.js');

// Fonts
    mix.combine([
        'node_modules/font-awesome/css/font-awesome.min.css',
        'resources/assets/custom-remark/css/material-design.css',
    ], 'public/css/fonts.css')
    .copy([
        'node_modules/font-awesome/fonts',
        'node_modules/material-design-iconic-font/dist/fonts',
        'node_modules/bootstrap-sass/assets/fonts/bootstrap'
    ], 'public/fonts');

// Style owned
    mix.combine('resources/assets/me/css/style.css', 'public/css/style.css')

// Core
    mix.combine([
        'resources/assets/remark/css/bootstrap.css',
        'resources/assets/remark/css/bootstrap-extend.css',
        'resources/assets/remark/css/site.css'
    ], 'public/css/core.css')
        .scripts([
            'resources/assets/remark/js/jquery.js',
            'resources/assets/remark/js/bootstrap.js',
            'node_modules/animsition/dist/js/animsition.min.js',
            'node_modules/jquery-scrollTo/dist/jquery-scrollTo.min.js',
            'node_modules/jquery-mousewheel/jquery.mousewheel.js',
            'node_modules/jquery-asScrollbar/dist/jquery-asScrollbar.js',
            'node_modules/jquery-asScrollable/dist/jquery-asScrollable.js',
            'node_modules/jquery-asHoverScroll/dist/jquery-asHoverScroll.js',
            'node_modules/node-waves/dist/waves.min.js',
            'node_modules/toastr/toastr.js'
        ], 'public/js/core.js')
        .copy([
            'resources/assets/me/img/logo.png',
            'resources/assets/me/img/favicon.ico',
            'resources/assets/me/img/remark.png',
            'resources/assets/me/img/dashboard-header.jpg',
            'resources/assets/me/img/Stop_Frenos.png',
            'resources/assets/me/img/logo_login.png',
        ], 'public/img');

// Plugins
    mix.combine([
        'node_modules/animsition/dist/css/animsition.min.css',
        'node_modules/jquery-asScrollable/dist/css/asScrollable.min.css',
        'node_modules/jquery-asScrollbar/dist/css/asScrollbar.min.css',
        'node_modules/node-waves/dist/waves.min.css',
        'node_modules/toastr/build/toastr.min.css',
        'node_modules/sweetalert/dist/sweetalert.css'
    ], 'public/css/plugins.css')
        .scripts([
            'resources/assets/remark/js/core.js',
            'resources/assets/remark/js/site.js',
            'resources/assets/remark/js/menu.js',
            'resources/assets/remark/js/menubar.js',
            'resources/assets/remark/js/sidebar.js',
            'resources/assets/remark/js/v1.js',
            'node_modules/sweetalert/dist/sweetalert.min.js',
        ], 'public/js/plugins.js');

// Images
    mix.copy([
        'node_modules/bootstrap-fileinput/img/loading.gif',
        'node_modules/bootstrap-fileinput/img/loading-sm.gif'
    ], 'public/img');

// Components
    mix.scripts([
        'resources/assets/components/animsition.js',
        'resources/assets/components/asscrollable.js'
    ], 'public/js/components.js');

// Breakpoint
    mix.scripts('node_modules/breakpoints-js/dist/breakpoints.min.js', 'public/js/breakpoints.js');

// 404
    mix.copy('resources/assets/me/css/404.css', 'public/css');

// Index
    mix.combine([
        'node_modules/bootstrap-table/dist/bootstrap-table.min.css'
    ], 'public/css/index-common.css')
        .scripts([
            'resources/assets/custom-remark/js/bootstrap-table.js',
            'node_modules/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js',
            'resources/assets/custom-remark/js/bootstrap-table-es-ES.js',
            'resources/assets/utilities/delete.js'
        ], 'public/js/index-common.js');

// Create-Edit
    mix.scripts([
        'node_modules/bootstrap-maxlength/bootstrap-maxlength.min.js',
        'resources/assets/components/bootstrap-maxlength.js',
        'resources/assets/me/js/utilities/submit-form-ajax.js',
        'resources/assets/me/js/utilities/add_csrf_token.js',
    ], 'public/js/create-edit-common.js');

// Edit
    mix.scripts([
        'resources/assets/me/js/utilities/delete.js'
    ], 'public/js/edit-common.js');

// Upload
    mix.combine([
        'node_modules/bootstrap-fileinput/css/fileinput.min.css'
    ], 'public/css/upload-common.css')
    .scripts([
        'resources/assets/me/js/utilities/add_csrf_token.js',
        'resources/assets/custom-remark/js/fileinput.js'
    ], 'public/js/upload-common.js');

// Show With Images
    mix.combine([
        'node_modules/magnific-popup/dist/magnific-popup.css'
    ], 'public/css/show-with-image-common.css')
    .scripts([
        'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
        'resources/assets/components/magnific-popup.js',
        'resources/assets/me/js/utilities/download-files.js'
], 'public/js/show-with-image-common.js');

// Administrations
    // Menú
        mix.scripts([
            'resources/assets/me/js/base/administrations/index.js'
        ], 'public/js/administrations/index.js');

    // Companies
        // Index
            mix.scripts([
                'resources/assets/me/js/base/administrations/companies/config_bootstrap_table.js'
            ], 'public/js/administrations/companies/index-custom-companies.js');

        // Create-Edit
            mix.combine([
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                'node_modules/select2/dist/css/select2.min.css'
            ], 'public/css/administrations/companies/create-edit-custom-companies.css')
            .scripts([
                'resources/assets/me/js/utilities/capitalize.js',
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'resources/assets/me/js/validations/valida_rut.js',
                'resources/assets/me/js/validations/valida_email.js',
                'resources/assets/me/js/change/change_region_province.js',
                'resources/assets/me/js/utilities/verifica_ultimos_numeros.js',
                'resources/assets/custom-remark/js/jquery.Rut.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'node_modules/bootstrap-maxlength/bootstrap-maxlength.min.js',
                'resources/assets/components/bootstrap-maxlength.js',
                'node_modules/select2/dist/js/select2.min.js',
                'resources/assets/me/js/base/administrations/companies/custom_companies.js'
            ], 'public/js/administrations/companies/create-edit-custom-companies.js');

// RR.HH
    // Menú
        mix.scripts([
            'resources/assets/me/js/base/human-resources/index.js'
        ], 'public/js/human-resources/index.js');

    // Daily-Assistances
        // Index
            mix.combine([
                'resources/assets/custom-remark/css/bootstrap-select.css',
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                // Datatables
                'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
                'resources/assets/custom-remark/css/datatables-custom.css'
            ], 'public/css/human-resources/daily-assistances/index-custom-daily-assistances.css')
            .scripts([
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
                'resources/assets/components/bootstrap-select.js',
                'node_modules/moment/moment.js',
                'node_modules/moment/locale/es.js',
                // Datatables
                'node_modules/datatables.net/js/jquery.dataTables.js',
                'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
            ], 'public/js/human-resources/daily-assistances/index-custom-daily-assistances.js');

    // Contracts
        // Index
            mix.scripts([
                'resources/assets/me/js/base/human-resources/contracts/config_bootstrap_table.js'
            ], 'public/js/human-resources/contracts/index-custom-contracts.js');

        // Create
            mix.combine([
                'resources/assets/custom-remark/css/bootstrap-select.css',
                'node_modules/clockpicker/dist/bootstrap-clockpicker.min.css',
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                'resources/assets/me/css/human-resources/contracts/preview/preview-contracts.css'
            ], 'public/css/human-resources/contracts/create-custom-contracts.css')
            .scripts([
                'node_modules/clockpicker/dist/bootstrap-clockpicker.min.js',
                'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
                'node_modules/autonumeric/autoNumeric-min.js',
                'resources/assets/components/bootstrap-clockpicker.js',
                'resources/assets/components/bootstrap-select.js',
                'resources/assets/components/autoNumeric.js',
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'resources/assets/me/js/utilities/sanitized-fields.js',
                'resources/assets/components/tabs.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'resources/assets/me/js/base/human-resources/contracts/custom-contracts.js'
            ], 'public/js/human-resources/contracts/create-custom-contracts.js');

        // Show
            mix.scripts('resources/assets/me/js/utilities/delete.js', 'public/js/human-resources/contracts/show.js');

        // Pdf
        mix.copy(
            'resources/assets/me/css/human-resources/contracts/pdf/index.css', 
            'public/css/human-resources/contracts/pdf/index.css'
        );

    // Remunerations
        // Index
            mix.scripts([
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'resources/assets/me/js/base/human-resources/remunerations/custom-remunerations.js'
            ], 'public/js/human-resources/remunerations/index-custom-remunerations.js');

    // Employees
        // Index
            mix.scripts([
                'resources/assets/me/js/base/human-resources/employees/restore_data_session.js',
                'resources/assets/me/js/base/human-resources/employees/config_bootstrap_table.js'
            ], 'public/js/human-resources/employees/index-custom-employees.js');

        // Create-Edit
            mix.combine([
                'resources/assets/custom-remark/css/wizard.css',
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
            ], 'public/css/human-resources/employees/create-edit-custom-employees.css')
            .scripts([
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'resources/assets/me/js/utilities/verifica_ultimos_numeros.js',
                'resources/assets/me/js/utilities/capitalize.js',
                'resources/assets/me/js/change/change_region_province.js',
                'resources/assets/me/js/validations/valida_email.js',
                'resources/assets/me/js/validations/valida_rut.js',
                'resources/assets/me/js/validations/employees/step1.js',
                'resources/assets/me/js/validations/employees/step2.js',
                'resources/assets/me/js/validations/employees/step3.js',
                'resources/assets/custom-remark/js/jquery-wizard.js',
                'resources/assets/custom-remark/js/jquery.Rut.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'resources/assets/me/js/utilities/scrollTop.js'
            ], 'public/js/human-resources/employees/create-edit-custom-employees.js');

        // Show
            mix.combine([
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                // Datatables
                'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
                'resources/assets/custom-remark/css/datatables-custom.css'
            ], 'public/css/human-resources/employees/show.css')
            .scripts([
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'node_modules/moment/moment.js',
                'node_modules/moment/locale/es.js',
                // Datatables
                'node_modules/datatables.net/js/jquery.dataTables.js',
                'node_modules/datatables.net-bs/js/dataTables.bootstrap.js'
            ], 'public/js/human-resources/employees/show.js');

        // Pdf
        mix.copy(
            'resources/assets/me/css/human-resources/employees/pdf/index.css',
            'public/css/human-resources/employees/pdf/index.css'
        );

// Operations
    // Menú
        mix.scripts([
            'resources/assets/me/js/base/operations/index.js'
        ], 'public/js/operations/index.js');

    // Vehicles
        // Index
            mix.scripts([
                'resources/assets/me/js/base/operations/vehicles/config_bootstrap_table.js'
            ], 'public/js/operations/vehicles/index-custom-vehicles.js');

        // Create-Edit
            mix.combine([
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'
            ], 'public/css/operations/vehicles/create-edit-custom-vehicles.css')
            .scripts([
                'resources/assets/me/js/change/change_trademark_model.js',
                'node_modules/autonumeric/autoNumeric-min.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'resources/assets/components/autoNumeric.js',
                'resources/assets/me/js/utilities/sanitized-fields.js',
                'resources/assets/me/js/base/operations/vehicles/custom-vehicles.js'
        ], 'public/js/operations/vehicles/create-edit-custom-vehicles.js');

    // Master-Form-Piece-Vehicles
        // Index
            mix.scripts([
                'resources/assets/me/js/base/operations/master-form-piece-vehicles/config_bootstrap_table.js'
            ], 'public/js/operations/master-form-piece-vehicles/index-custom-master-form-piece-vehicles.js');

    // Check-Vehicle-Form
        // Index
            mix.scripts([
                'resources/assets/me/js/base/operations/check-vehicle-forms/config_bootstrap_table.js'
            ], 'public/js/operations/check-vehicle-forms/index-custom-check-vehicle-forms.js');

        // Create-Edit
        mix.scripts([
            'resources/assets/me/js/utilities/select-unique-checkbox-group.js',
            'resources/assets/me/js/utilities/add_csrf_token.js',
            'resources/assets/me/js/base/operations/check-vehicle-forms/load-detail-vehicle.js'
        ], 'public/js/operations/check-vehicle-forms/create-edit-custom-check-vehicle-forms.js');

// Sign-in-Visits
    // Menú
        mix.scripts([
            'resources/assets/me/js/base/sign-in-visits/index.js'
        ], 'public/js/sign-in-visits/index.js');

    // Visits
        // Index
            mix.scripts([
                'resources/assets/me/js/base/sign-in-visits/visits/config_bootstrap_table.js'
            ], 'public/js/sign-in-visits/visits/index.js');

        // Create-Edit
            mix.combine([
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                'node_modules/clockpicker/dist/bootstrap-clockpicker.min.css'
            ], 'public/css/sign-in-visits/visits/create-edit.css')
            .scripts([
                'resources/assets/me/js/utilities/capitalize.js',
                'resources/assets/me/js/validations/valida_rut.js',
                'resources/assets/custom-remark/js/jquery.Rut.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'node_modules/clockpicker/dist/bootstrap-clockpicker.min.js',
                'resources/assets/components/bootstrap-clockpicker.js',
                'resources/assets/me/js/validations/valida_email.js',
                'node_modules/moment/moment.js',
                'node_modules/moment/locale/es.js',
                'resources/assets/me/js/base/sign-in-visits/visits/changeTypeVisit.js'
            ], 'public/js/sign-in-visits/visits/create-edit.js');

        // Show
            mix.scripts([
                'resources/assets/me/js/base/sign-in-visits/visits/visit_authorization.js'
            ], 'public/js/sign-in-visits/visits/show.js');

    // Form Visit
        //  Create
            mix.scripts([
                'node_modules/bootstrap-maxlength/bootstrap-maxlength.min.js',
                'resources/assets/components/bootstrap-maxlength.js',
                'resources/assets/me/js/base/sign-in-visits/visits/custom-submit-form-ajax.js',
                'resources/assets/me/js/utilities/add_csrf_token.js',
            ], 'public/js/sign-in-visits/form-visits/create-edit.js');

// Maintainers
    // Menú
        mix.scripts([
            'resources/assets/me/js/base/maintainers/index.js'
        ], 'public/js/maintainers/index.js');

    // Áreas
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/areas/config_bootstrap_table.js'
            ], 'public/js/maintainers/areas/index.js');

    // Cities
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/cities/config_bootstrap_table.js'
            ], 'public/js/maintainers/cities/index.js');

    // Countries
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/countries/config_bootstrap_table.js'
            ], 'public/js/maintainers/countries/index.js');

    // Daytrips
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/day-trips/config_bootstrap_table.js'
            ], 'public/js/maintainers/day-trips/index.js');

    // Forecast
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/forecasts/config_bootstrap_table.js'
            ], 'public/js/maintainers/forecasts/index.js');

    // Fuels
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/fuels/config_bootstrap_table.js'
            ], 'public/js/maintainers/fuels/index.js');

    // Institutions
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/institutions/config_bootstrap_table.js'
            ], 'public/js/maintainers/institutions/index.js');

    // Labor Unions
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/labor-unions/config_bootstrap_table.js'
            ], 'public/js/maintainers/labor-unions/index.js');

    // Marital Status
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/marital-statuses/config_bootstrap_table.js'
            ], 'public/js/maintainers/marital-statuses/index.js');

    // Measuring Units
        // Menú
            mix.scripts([
                'resources/assets/me/js/base/maintainers/measuring-units/index.js'
            ], 'public/js/maintainers/measuring-units/index.js');

        // Engine Cubics
            // Index
                mix.scripts([
                    'resources/assets/me/js/base/maintainers/measuring-units/engine-cubics/config_bootstrap_table.js'
                ], 'public/js/maintainers/measuring-units/engine-cubics/index.js');

        // Weights
            // Index
                mix.scripts([
                    'resources/assets/me/js/base/maintainers/measuring-units/weights/config_bootstrap_table.js'
                ], 'public/js/maintainers/measuring-units/weights/index.js');

    // Model Vehicles
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/model-vehicles/config_bootstrap_table.js'
            ], 'public/js/maintainers/model-vehicles/index.js');

    // Mutualities
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/mutualities/config_bootstrap_table.js'
            ], 'public/js/maintainers/mutualities/index.js');

    // Piece Vehicles
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/piece-vehicles/config_bootstrap_table.js'
            ], 'public/js/maintainers/piece-vehicles/index.js');

    // Positions
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/positions/config_bootstrap_table.js'
            ], 'public/js/maintainers/positions/index.js');

    // Professions
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/professions/config_bootstrap_table.js'
            ], 'public/js/maintainers/professions/index.js');

    // Relationships
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/relationships/config_bootstrap_table.js'
            ], 'public/js/maintainers/relationships/index.js');

    // Terminals
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/terminals/config_bootstrap_table.js'
            ], 'public/js/maintainers/terminals/index.js');

        // Create Edit
            mix.scripts([
                'resources/assets/me/js/utilities/verifica_ultimos_numeros.js',
                'resources/assets/me/js/change/change_region_province.js'
            ], 'public/js/maintainers/terminals/create-edit.js');

    // Terms-and-obligatories
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/terms-and-obligatories/config_bootstrap_table.js'
            ], 'public/js/maintainers/terms-and-obligatories/index.js');

        // Create Edit
            mix.combine([
                'node_modules/switchery/switchery.css'
            ], 'public/css/maintainers/terms-and-obligatories/create-edit.css');
            
            mix.scripts([
                'node_modules/switchery/switchery.js'
            ], 'public/js/maintainers/terms-and-obligatories/create-edit.js');

    // Trademarks
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/trademarks/config_bootstrap_table.js'
            ], 'public/js/maintainers/trademarks/index.js');

    // Type Certifications
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-certifications/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-certifications/index.js');

    // Type Companies
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-companies/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-companies/index.js');

    // Type Contracts
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-contracts/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-contracts/index.js');

        // Create Edit
            mix.scripts([
                'me/js/utilities/capitalize.js',
                'me/js/base/maintainers/type-contracts/custom-type-contracts.js'
            ], 'public/js/maintainers/type-contracts/create-edit.js');

    // Type Disabilities
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-disabilities/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-disabilities/index.js');

    // Type Diseases
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-diseases/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-diseases/index.js');

    // Type Exams
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-exams/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-exams/index.js');

    // Type Institutions
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-institutions/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-institutions/index.js');

    // Type Professional Licenses
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-professional-licenses/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-professional-licenses/index.js');

    // Type Specialities
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-specialities/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-specialities/index.js');

    // Type Vehicles
        // Index
            mix.scripts([
                'resources/assets/me/js/base/maintainers/type-vehicles/config_bootstrap_table.js'
            ], 'public/js/maintainers/type-vehicles/index.js');

// Graphics
    // Index
    mix.scripts([
        'resources/assets/me/js/base/graphics/index.js'
    ], 'public/js/graphics/index.js');

    // assistances
        mix.combine([
            'resources/assets/custom-remark/css/bootstrap-select.css',
            'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        ], 'public/css/graphics/assistance.css')
        .scripts([
            'node_modules/chart.js/dist/Chart.min.js',
            'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
            'resources/assets/components/bootstrap-select.js',
            'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
            'resources/assets/components/bootstrap-datepicker.js',
            'node_modules/moment/moment.js',
        ], 'public/js/graphics/assistance.js');

// Support
    // Index
    mix.scripts([
        'resources/assets/me/js/base/support/index.js',
    ], 'public/js/support/index.js');

    // Passport
        mix.copy('resources/assets/passport/app.css', 'public/css/passport.css');
        mix.copy('resources/assets/passport/app.js', 'public/js/passport.js');

    // Global Pdf
    mix.copy([
        'resources/assets/me/css/pdf/header.css',
        'resources/assets/me/css/pdf/footer.css'
    ], 'public/css/pdf');

// Versioning
    mix.version();