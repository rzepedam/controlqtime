<!doctype html>
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
        {{--Listado de Empleados al día [{{ date('d-m-Y') --}}
    </div>
    <div class="col-md-6 pull-right">
        Página <span class="page"></span> de <span class="topage"></span>
    </div>
</div>

<script>
    function subst() {
        var vars={};
        var x=window.location.search.substring(1).split('&');
        for (var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
        var x=['frompage','topage','page','webpage','section','subsection','subsubsection'];
        for (var i in x) {
            var y = document.getElementsByClassName(x[i]);
            for (var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
        }
    }
</script>

</body>
</html>