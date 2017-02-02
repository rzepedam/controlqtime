<table class="table table-bordered table-condensed">
    <tbody>
        <tr class="text-center warning">
            <td class="col-md-12" colspan="2">
                Base Tributable
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">AFP</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="total_pension">{{ $employee->contract->total_pension }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">APV</td>
            <td class="col-sm-8 col-md-8 text-center">$ 0</td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Seguro Cesantía</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="seguro_cesantia">{{ $employee->contract->seguro_cesantia }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8">Salud</td>
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="total_forecast">{{ $employee->contract->total_forecast }}</span>
            </td>
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
            <td class="col-sm-8 col-md-8 text-center">
                $ <span id="descuentos_afectos">{{ $employee->contract->descuentos_afectos }}</span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-8 col-md-8" style="visibility: collapse">Base Tributable</td>
            <td class="col-sm-8 col-md-8 text-center font-size-16">
                <b>$ <span id="base_tributable">{{ $employee->contract->base_tributable }}</span></b>
            </td>
        </tr>
    </tbody>
</table>