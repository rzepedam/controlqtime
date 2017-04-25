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
        'node_modules/toastr/build/toastr.min.css'
    ], 'public/css/plugins.css')
        .scripts([
            'resources/assets/remark/js/core.js',
            'resources/assets/remark/js/site.js',
            'resources/assets/remark/js/menu.js',
            'resources/assets/remark/js/menubar.js',
            'resources/assets/remark/js/sidebar.js',
            'resources/assets/remark/js/v1.js',
        ], 'public/js/plugins.js');

// Components
    mix.scripts([
        'resources/assets/components/animsition.js',
        'resources/assets/components/asscrollable.js'
    ], 'public/js/components.js');

// Breakpoint
mix.scripts('node_modules/breakpoints-js/dist/breakpoints.min.js', 'public/js/breakpoints.js');

