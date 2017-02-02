<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center info">
            <td class="col-sm-12 col-md-12" colspan="2">
                Total Imponible
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Sueldo Base</td>
            <td class="col-sm-4 col-md-4 text-center">
                $ <span id="sueldo_base">{{ $employee->contract->sueldo_base }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Gratificación</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="gratification">{{ $employee->contract->gratification }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Horas Extras</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="valor_total_horas_extra">{{ $employee->contract->valor_total_horas_extra }}</span>
            </td>
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
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="valor_inasistencia">{{ $employee->contract->valor_inasistencia }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Atrasos</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="valor_atraso">{{ $employee->contract->valor_atraso }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Total Asistencia y Atrasos</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="total_asistencia_atrasos">{{ $employee->contract->total_asistencia_atrasos }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Total Imponible</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16">
                <b>$ <span id="total_imponible">{{ $employee->contract->total_imponible }}</span></b>
            </td>
        </tr>
    </tbody>
</table>