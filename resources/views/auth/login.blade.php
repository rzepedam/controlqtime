<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CQTime - Where questions find answers">
    <meta name="author" content="Raúl Elías Meza Mora">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ mix('css/core.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    <link rel="stylesheet" href="{{ mix('css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet">
    <script src="{{ mix('js/breakpoints.js') }}"></script>
    <script>Breakpoints();</script>
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="page-login-v3 layout-full">
    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle">
            <div class="panel">
                <div class="panel-body">
                    <div class="brand">
                        <img class="brand-img" src="{{ asset('img/logo_login.png') }}" alt="...">
                        <h2 class="brand-text font-size-18">Controlqtime</h2>
                    </div>
                    <form role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group form-material floating">
                            <input type="email" class="form-control" name="email" autocomplete="off" />
                            <label class="floating-label">Email</label>
                        </div>
                        <div class="form-group form-material floating">
                            <input type="password" class="form-control" name="password" autocomplete="off" />
                            <label class="floating-label">Password</label>
                        </div>
                        <div class="form-group clearfix">
                            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                                <input type="checkbox" id="inputCheckbox" name="remember">
                                <label for="inputCheckbox">Recuérdame</label>
                            </div>
                            <a class="pull-right" href="{{ url('/password/reset') }}">Olvidó contraseña?</a>
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible clearfix font-size-12">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible clearfix font-size-12">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">Login</button>
                    </form>
                </div>
            </div>
            <footer class="page-copyright page-copyright-inverse">
                <p>© 2016. All RIGHT RESERVED.</p>
                <div class="social">
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>

    <!-- Core  -->
    <script src="{{ mix('js/core.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/plugins.js') }}"></script>
    <!-- Components -->
    <script src="{{ mix('js/components.js') }}"></script>
    <!-- Login JS -->
    <script src="{{ mix('js/login.js') }}"></script>

</body>
</html>