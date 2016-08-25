<table class="table table-bordered table-condensed">
    <tbody>
        <tr>
            <td class="col-xs-4">
                Nombre del Empleador
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left text-primary">
                <b>{{ $contract->company->firm_name }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4 ">
                Rut
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left text-primary">
                <b>{{ $contract->company->rut }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Representante Legal
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left text-primary">
                <b>PENDIENTE</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Dirección
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->company->address . ", " . $contract->company->commune->name . ". " . $contract->company->commune->province->name . ". " . $contract->company->commune->province->region->name }}</b>
            </td>
        </tr>
    </tbody>
</table>