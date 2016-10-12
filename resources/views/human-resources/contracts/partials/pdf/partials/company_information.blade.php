<table class="table table-bordered table-condensed">
    <tbody>
        <tr>
            <td class="col-xs-4">
                Empleador
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->company->firm_name }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4 ">
                Rut
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->company->rut }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Dirección
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->company->address->address . ", " . $contract->company->address->commune->name . ". " . $contract->company->address->commune->province->name . ". " . $contract->company->address->commune->province->region->name }}</b>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                Representante Legal
            </td>
            <td class="col-xs-1 text-center">:</td>
            <td class="col-xs-7 text-left">
                <b>{{ $contract->company->legalRepresentative->full_name }}. Rut {{ $contract->company->legalRepresentative->rut_representative }}</b>
            </td>
        </tr>
    </tbody>
</table>