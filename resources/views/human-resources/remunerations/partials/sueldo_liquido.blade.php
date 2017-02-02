<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center success">
            <td class="col-md-12" colspan="2">
                Sueldo Líquido
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Impuesto</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="valor_impuesto_segunda_categoria">{{ $employee->contract->valor_impuesto_segunda_categoria }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Rebaja</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="rebaja_impuesto">{{ $employee->contract->rebaja_impuesto }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Impuesto Único</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="impuesto_unico">{{ $employee->contract->impuesto_unico }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Descuentos Varios</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Total Descuentos</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="total_descuentos">{{ $employee->contract->total_descuentos }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Anticipos</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Sueldo Líquido</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16">
                <span id="sueldo_liquido" class="text-success"><b>$ {{ $employee->contract->sueldo_liquido }}</b></span>
            </td>
        </tr>
    </tbody>
</table>