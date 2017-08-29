<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/human-resources/employees/pdf/index.css') }}">
    <title>Listado de Empleados</title>
</head>
<body>
    <div class="row form-group">
        <div class="col-xs-12 text-center form-group">
            <h4><b>LISTADO DE EMPLEADOS</b></h4>
        </div>
        <div class="col-xs-12 form-group">
            A continuación la nómina de empleados que integran <b>{{ auth()->user()->employee->contract->company->firm_name }}</b> al día de hoy <b><span class="text-capitalize">{{ Date::parse(date('d-m-Y'))->format('l j F Y') }}</span></b>
        </div>
    </div>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr class="active">
                <th class="col-xs-3">Nombre</th>
                <th class="col-xs-2 text-center">Rut</th>
                <th class="col-xs-5 text-center">Empresa</th>
                <th class="col-xs-2 text-center">Fono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td style="vertical-align: middle;">
                        {{ $employee->first_name . ' ' . $employee->male_surname . ' ' . $employee->female_surname }}</td>
                    <td class="text-center" style="vertical-align: middle;">{{ $employee->rut }}</td>
                    <td class="text-center" style="vertical-align: middle;">{{ $employee->contract->company->firm_name }}</td>
                    <td class="text-center" style="vertical-align: middle;">{{ $employee->address->phone1 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>