<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ControlQTime</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v1.min.css') }}">
    {{ Html::style('assets/css/toastr.css') }}
    {{ Html::style('assets/css/custom-color-toastr.css') }}
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.min.css') }}">
    {{ Html::style('me/css/style.css') }}
    <script src="{{ asset('assets/js/breakpoints.js') }}"></script>

    @yield('css')

    {{ Html::style('me/css/style.css') }}
    <script src="{{ asset('assets/js/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="dashboard">

    {{-- Header --}}
    @include('layout.sections.header')

    {{-- Sidebar --}}
    @include('layout.sections.sidebar')

    {{-- Content --}}
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">

                @yield('title_header')

            </h1>
            <div class="page-header-actions">
                <ol class="breadcrumb breadcrumb-arrow">

                    @yield('breadcumb')

                </ol>
            </div>
        </div>
        <div class="page-content">

            @yield('content')

        </div>
    </div>

    {{-- Footer --}}
    {{-- @include('layout.sections.footer') --}}

    <script src="{{ elixir('js/layout/index-layout.js') }}"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/site.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/menubar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/v1.min.js') }}"></script>
    <script src="{{ elixir('js/layout/index-layout-components.js') }}"></script>

    @yield('scripts')

    @include('layout.messages.success')

</body>
</html>