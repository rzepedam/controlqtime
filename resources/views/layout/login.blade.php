<!DOCTYPE html>
<html class="no-js css-menubar" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="{{ asset('me/img/favicon.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/waves.css') }}">
    {{ Html::style('me/css/style.css') }}
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/font-awesome.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset('assets/js/media.match.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="page-login-v3 layout-full">

    @yield('content')

    {{-- Core  --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/animsition.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-asScroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.asScrollable.all.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-asHoverScroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/site.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/menubar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/v1.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/asscrollable.js') }}"></script>
    <script src="{{ asset('assets/js/components/animsition.js') }}"></script>
    <script src="{{ asset('assets/js/components/tabs.js') }}"></script>
    {{ Html::script('assets/js/config.js') }}

</body>
</html>