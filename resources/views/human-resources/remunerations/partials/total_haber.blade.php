<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center danger">
            <td class="col-md-12" colspan="2">
                Total Haber
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Cargas Familiares</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->asignacion_familiar }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Locomoción</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->mobilization_money_field }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Colación</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->collation_money_field }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Bono No Imponible</td>
            <td class="col-sm-8 col-md-8 text-center">-</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Total Haber</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16"><b>$ {{ $employee->contract->total_haber }}</b></td>
        </tr>
    </tbody>
</table>