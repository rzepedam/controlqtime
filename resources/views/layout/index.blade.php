<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CQTime - Where questions find answers">
    <meta name="author" content="Raúl Elías Meza Mora">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ControlQTime</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ elixir('css/index-layout-core.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ elixir('css/index-layout-plugin.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ elixir('css/index-layout-fonts.css') }}">
    @yield('css')

    <!-- Style Owned -->
    <link rel="stylesheet" href="{{ elixir('css/style.css') }}">
    <!-- Script Default Laravel -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Browsers Utilities -->
    <script src="{{ elixir('js/index-layout-browser-utilities.js') }}"></script>
    <script>
        Breakpoints();
    </script>

</head>
<body class="dashboard">
    <div id="app">
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

    </div>

    <!-- Core  -->
    <script src="{{ elixir('js/index-layout-core.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ elixir('js/index-layout-scripts.js') }}"></script>
    <!-- Components -->
    <script src="{{ elixir('js/index-layout-components.js') }}"></script>

    @yield('scripts')

    @include('layout.messages.success')

</body>
</html>