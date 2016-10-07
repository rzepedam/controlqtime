<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('css/human-resources/contracts/pdf/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/human-resources/contracts/pdf/index-pdf-contracts.css') }}">
    <title>Contrato de Trabajo</title>
</head>
<body>

    <p></p>
    <div class="row">
        <div class="col-xs-12 text-center">
            <h4><b>CONTRATO DE TRABAJO</b></h4>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">
            En <b>{{ $contract->company->commune->province->name }}</b> a <span class="text-capitalize"><b>{{ Date::parse(date('d-m-Y'))->format('l j F Y') }}</b></span>, entre las partes a continuación individualizadas, que convienen en denominarse empleador y trabajador, se suscribe el siguiente contrato de trabajo <b>{{ $contract->typeContract->name }}</b>.
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">
            <b>INDIVIDUALIZACIÓN DEL EMPLEADOR</b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.company_information')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">
            <b>INDIVIDUALIZACIÓN DEL TRABAJADOR</b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.employee_information')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.first')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.second')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.third')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.fourth')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.fifth')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.sixth')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.seventh')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.eighth')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.nineth')

        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-justify">

            @include('human-resources.contracts.partials.pdf.partials.terms.tenth')

        </div>
    </div>
</body>
</html>