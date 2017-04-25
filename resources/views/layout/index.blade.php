<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CQTime - Where questions find answers">
    <meta name="author" content="Raúl Elías Meza Mora">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Controlqtime</title>
    <link rel="stylesheet" href="{{ elixir('css/core.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" href="{{ elixir('css/style.css') }}">
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ elixir('js/breakpoints.js') }}"></script>
    <script>Breakpoints();</script>
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

    <script src="{{ elixir('js/core.js') }}"></script>
    <script src="{{ elixir('js/plugins.js') }}"></script>
    <script src="{{ elixir('js/components.js') }}"></script>

    @yield('scripts')

    @include('layout.messages.success')

    @include('layout.messages.error')

</body>
</html>