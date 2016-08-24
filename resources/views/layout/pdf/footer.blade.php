<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('me/css/pdf/footer.css') }}">
</head>
<body onload="subst()">

    <hr />
    <div class="row">
        <div class="col-md-6 pull-left">
            <span class="title"></span> al día [{{ date('d-m-Y') }}]
        </div>
        <div class="col-md-6 pull-right">
            Página <span class="page text-primary"></span> de <span class="topage"></span>
        </div>
    </div>

    <script src="{{ asset('assets/js/wkhtmltopdf.js') }}"></script>

</body>
</html>