<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center info">
            <td class="col-sm-12 col-md-12" colspan="2">
                Total Imponible
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Sueldo Base</td>
            <td class="col-sm-4 col-md-4 text-center">$ {{ $employee->contract->sueldo_base }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Gratificación</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->gratification }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Horas Extras</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->horas_extra }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Comisión</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Bono Imponible</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Inasistencias</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->valor_inasistencia }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Atrasos</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Total Asistencia y Atrasos</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Total Imponible</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16"><b>$ {{ $employee->contract->total_imponible }}</b></td>
        </tr>
    </tbody>
</table>