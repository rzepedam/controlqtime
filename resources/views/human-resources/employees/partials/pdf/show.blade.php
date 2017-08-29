<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/human-resources/employees/pdf/index.css') }}">
    <title>Resumen Asistencia</title>
</head>
<body>
    <div class="row form-group">
        <div class="col-xs-12 text-center form-group">
            <h4><b>Resumen de Asistencia</b></h4>
        </div>
        <div class="col-xs-12 form-group">
            A continuación el detalle de asistencia del trabajador <b>{{ $employee->full_name }}</b> compendida entre los días <b><span class="text-capitalize">{{ Date::parse($init)->format('l j F Y') }}</span></b> y <b><span class="text-capitalize">{{ Date::parse($end)->format('l j F Y') }}</span></b>.
        </div>
    </div>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr class="active">
                <th class="col-xs-6 text-center">Dispositivo</th>
                <th class="col-xs-3 text-center">Entrada</th>
                <th class="col-xs-3 text-center">Salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assistances as $assistance)
                <tr>
                    <td class="text-center" style="vertical-align: middle;">{{ $assistance->num_device }}</td>
                    <td class="text-center" style="vertical-align: middle;">{{ Date::parse($assistance->log_in)->format('d-m-Y H:i:s') }}</td>
                    @if ( ! is_null($assistance->log_out) ) 
                        <td class="text-center" style="vertical-align: middle;">{{ Date::parse($assistance->log_out)->format('d-m-Y H:i:s') }}</td>
                    @else
                        <td class="text-center" style="vertical-align: middle;"> - </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>