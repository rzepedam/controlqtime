<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center danger">
            <td class="col-md-12" colspan="2">
                Total Haber
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Cargas Familiares</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="asignacion_familiar">{{ $employee->contract->asignacion_familiar }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Locomoción</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="mobilization">{{ $employee->contract->mobilization_money_field }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Colación</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="collation">{{ $employee->contract->collation_money_field }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Bono No Imponible</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="bono_no_imponible">{{ $employee->contract->bono_no_imponible }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Total Haber</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16">
                <b>$ <span id="total_haber">{{ $employee->contract->total_haber }}</span></b>
            </td>
        </tr>
    </tbody>
</table>