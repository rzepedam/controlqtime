const { mix } = require('laravel-mix');

// Laravel
    mix.js('resources/assets/js/app.js', 'public/js')
       .sass('resources/assets/sass/app.scss', 'public/css');

// Login
    mix.combine('resources/assets/custom-remark/css/login.css', 'public/css/login.css')
        .scripts('resources/assets/components/material.js', 'public/js/login.js');

// Fonts
    mix.combine([
        'node_modules/font-awesome/css/font-awesome.min.css',
        'node_modules/material-design-iconic-font/dist/css/material-design-iconic-font.min.css',
    ], 'public/css/fonts.css')
    .copy([
        'node_modules/material-design-iconic-font/dist/fonts',
        'node_modules/font-awesome/fonts'
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

// Index
    mix.combine([
        'node_modules/bootstrap-table/dist/bootstrap-table.min.css'
    ], 'public/css/index-common.css')
        .scripts([
            'resources/assets/custom-remark/js/bootstrap-table.js',
            'node_modules/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js',
            'resources/assets/custom-remark/js/bootstrap-table-es-ES.js'
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
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'
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
                'resources/assets/me/css/human-resources/daily-assistances/index.css',
                'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'
            ], 'public/css/human-resources/daily-assistances/index-custom-daily-assistances.css')
            .scripts([
                'resources/assets/me/js/utilities/add_csrf_token.js',
                'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js',
                'resources/assets/components/bootstrap-datepicker.js',
                'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
                'resources/assets/components/bootstrap-select.js',
                'resources/assets/me/js/base/human-resources/daily-assistances/index-custom.js'
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



