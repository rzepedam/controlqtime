<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('css/human-resources/contracts/pdf/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/human-resources/contracts/pdf/footer-pdf-contracts.css') }}">
</head>
<body onload="subst()">

<hr />
<div class="row">
    <div class="col-md-6 pull-right">
        <span class="text-footer">Página <span class="page"></span> de <span class="topage"></span></span>
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