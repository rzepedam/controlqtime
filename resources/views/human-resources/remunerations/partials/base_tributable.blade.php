<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center warning">
            <td class="col-md-12" colspan="2">
                Base Tributable
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">AFP</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->total_pension }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">APV</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Seguro Cesantía</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->seguro_cesantia }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Salud</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->total_forecast }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Cotización Adicional Isapre</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Valor Plan</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Descuentos Afectos</td>
            <td class="col-sm-8 col-md-8 text-center">$ {{ $employee->contract->descuentos_afectos }}</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Base Tributable</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16"><b>$ {{ $employee->contract->base_tributable }}</b></td>
        </tr>
    </tbody>
</table>