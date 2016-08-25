<table class="table table-bordered table-condensed">
    <tbody>
        <tr>
            <td class="col-xs-4">
                Nombre
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->employee->full_name }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Rut
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->employee->rut }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Nacionalidad
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->employee->nationality->name }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Fecha de Nacimiento
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <span class="text-capitalize">
                    <b>{{ Date::parse($contract->employee->birthday)->format('l j F Y') }}</b>
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Estado Civil
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>PENDIENTE</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Domicilio
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->employee->address . ", " . $contract->employee->commune->name . ". " . $contract->employee->commune->province->name . ". " . $contract->employee->commune->province->region->name }}</b>
            </td>
        </tr>
    </tbody>
</table>