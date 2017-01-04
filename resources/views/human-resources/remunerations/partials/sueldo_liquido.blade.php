<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center success">
            <td class="col-md-12" colspan="2">
                Sueldo Líquido
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Impuesto</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->valor_impuesto_segunda_categoria }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Rebaja</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->rebaja_impuesto }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Impuesto Único</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->impuesto_unico }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Descuentos Varios</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Total Descuentos</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->total_descuentos }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Anticipos</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Sueldo Líquido</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16"><span class="text-success"><b>$ {{ $employee->contract->sueldo_liquido }}</b></span></td>
        </tr>
    </tbody>
</table>