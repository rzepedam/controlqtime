@extends('layout.index')

@section('title_header') Remuneraciones @stop

@section('content')

    <div class="row">
        {{-- Trabajador Select Field --}}
        <div class="col-md-3 form-group">
            {{ Form::label('employee_id', 'Trabajador') }}
            {{ Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <br />
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Sueldo Base</td>
                <td>{{ $employee->contract->salary }}</td>
            </tr>
            <tr>
                <td>Gratificación</td>
                <td>{{ $employee->contract->gratification() }}</td>
            </tr>
            <tr>
                <td>Horas Extras</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Comisión</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Bono Imponible</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Inasistencias</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Atrasos</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Total Asistencia y Atrasos</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Total Imponible</td>
                <td>{{ $employee->contract->totalImponible() }}</td>
            </tr>
            <tr>
                <td>Cargas Familiares</td>
                <td>{{ $employee->contract->asignacionFamiliar() }}</td>
            </tr>
            <tr>
                <td>Locomoción</td>
                <td>{{ $employee->contract->mobilization }}</td>
            </tr>
            <tr>
                <td>Colación</td>
                <td>{{ $employee->contract->collation }}</td>
            </tr>
            <tr>
                <td>Bono No Imponible</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Total Haber</td>
                <td>{{ $employee->contract->totalHaber() }}</td>
            </tr>
            <tr>
                <td>AFP</td>
                <td>{{ $employee->contract->totalPension() }}</td>
            </tr>
            <tr>
                <td>APV</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Seguro Cesantía</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Salud</td>
                <td>{{ $employee->contract->totalForecast() }}</td>
            </tr>
            <tr>
                <td>Cotización Adicional Isapre</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Valor Plan</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Descuentos Afectos</td>
                <td>{{ $employee->contract->descuentosAfectos() }}</td>
            </tr>
            <tr>
                <td>Base Tributable</td>
                <td>{{ $employee->contract->baseTributable() }}</td>
            </tr>
            <tr>
                <td>Impuesto</td>
                <td>{{ $employee->contract->valorImpuestoSegundaCategoria() }}</td>
            </tr>
            <tr>
                <td>Rebaja</td>
                <td>{{ $employee->contract->rebajaImpuesto() }}</td>
            </tr>
            <tr>
                <td>Impuesto Único</td>
                <td>{{ $employee->contract->impuestoUnico() }}</td>
            </tr>
            <tr>
                <td>Descuentos Varios</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Total Descuentos</td>
                <td>{{ $employee->contract->totalDescuentos() }}</td>
            </tr>
            <tr>
                <td>Anticipos</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Sueldo Líquido</td>
                <td>{{ $employee->contract->sueldoLiquido() }}</td>
            </tr>
        </tbody>
    </table>

@endsection