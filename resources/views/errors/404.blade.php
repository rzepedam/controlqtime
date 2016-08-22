<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>404 | ControlQTime</title>
    <link rel="shortcut icon" href="{{ asset('me/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">
    <script src="{{ asset('assets/js/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
</head>
<body class="page-error page-error-404 layout-full">
    <!--[if lt IE 8]>
        <p class="browserupgrade">Estas utilizando un navegador <strong>desactualizado</strong>. Porfavor, <a href="http://browsehappy.com/">actualiza tu navegador</a> y mejora tu experiencia.</p>
    <![endif]-->
    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle">
            <header>
                <h1 class="animation-slide-top">404</h1>
                <p>Page Not Found !</p>
            </header>
            <p class="error-advise">
                NECESITAS ACCEDER A NUESTRA PÁGINA PRINCIPAL?
            </p>
            <a class="btn btn-primary btn-round" href="{{ route('home') }}"><i class="icon md-home"></i> Home</a>
            <footer class="page-copyright">
                <p>WEBSITE BY @ControlQTime</p>
                <p>© 2016. Todos los derechos reservados.</p>
                <div class="social">
                    <a href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
  </div>
</body>
</html>