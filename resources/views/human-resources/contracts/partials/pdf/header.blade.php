<!Doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('me/css/pdf/header.css') }}">
</head>
<body>

    <div class="row">
        <div class="col-md-6 pull-left">
            <img src="{{ asset('me/img/Stop_frenos.png') }}">
        </div>
        <div class="col-md-6 pull-right">
            <span class="text-capitalize">
                {{ Date::parse(date('d-m-Y'))->format('l j F Y') }}
            </span>
        </div>
    </div>
    <hr />

</body>
</html>