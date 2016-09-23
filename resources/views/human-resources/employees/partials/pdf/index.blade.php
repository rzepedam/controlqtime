<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"
    <link rel="stylesheet" href="{{ asset('me/css/pdf/index.css') }}">
    <title>Listado de Empleados</title>
</head>
<body>

    @include('human-resources.employees.partials.pdf.content')

</body>
</html>