<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/human-resources/contracts/pdf/index-pdf-contracts.css') }}">
    <title>Contrato Laboral</title>
</head>
<body>

    <p></p>
    <div class="text-center">
        <h3><b>Contrato Laboral</b></h3>
    </div>
    <br />
    <div>
        <b>INDIVIDUALIZACIÓN DEL TRABAJADOR</b>
    </div>
    <div class="row">
        <div class="col-xs-12">

            @include('human-resources.contracts.partials.pdf.partials.employee_information')

        </div>
    </div>
    <br />
    <div>
        <b>INDIVIDUALIZACIÓN DEL EMPLEADOR O EMPRESA</b>
    </div>
    <div class="row">
        <div class="col-xs-12">

            @include('human-resources.contracts.partials.pdf.partials.company_information')

        </div>
    </div>
    <br />
    <div class="text-justify">
        Entre las partes arriba individualizadas, se suscribe el presente contrato de trabajo para cuyos efectos
        los contratantes convienen en denominarse trabajador y empleador, respectivamente
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">

            @include('human-resources.contracts.partials.pdf.partials.contract_information')

        </div>
    </div>
    <br />
    <h4><b>Cláusulas y Obligaciones</b></h4>
    <br />

    @include('human-resources.contracts.partials.pdf.partials.terms_information')

</body>
</html>