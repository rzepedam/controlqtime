<table border="1px solid #E0E0E0" cellpadding="7" cellspacing="0" width="100%">
    <tr style="background-color: #1E88E5; font-size: 14px; color: #FFFFFF">
        <td align="center" colspan="2">
            Trabajador
        </td>
    </tr>
    <tr>
        <td width="30%">
            Nombre
        </td>
        <td align="center" width="70%">
            {{ $employee->full_name }}
        </td>
    </tr>
    <tr>
        <td>
            Rut
        </td>
        <td align="center">
            {{ $employee->rut }}
        </td>
    </tr>
    <tr style="background-color: #1E88E5; font-size: 14px; color: #FFFFFF"">
    <td align="center" colspan="4">
        Empleador
    </td>
    </tr>
    <tr>
        <td>
            Rut
        </td>
        <td align="center">
            {{ $employee->contract->company->rut }}
        </td>
    </tr>
    <tr>
        <td>
            Razón Social
        </td>
        <td align="center">
            {{ $employee->contract->company->firm_name }}
        </td>
    </tr>
    <tr>
        <td>
            Dirección
        </td>
        <td align="center">
            {{-- $employee->contract->company->address->address }}{{ ($employee->contract->company->address->detailAddressCompany->lot) ? ', Lote ' . $employee->contract->company->address->detailAddressCompany->lot : '' }}{{ ($employee->contract->company->address->detailAddressCompany->bod) ? ', Bodega ' . $employee->contract->company->address->detailAddressCompany->bod : '' }}{{ ($employee->contract->company->address->detailAddressCompany->ofi) ? ', Oficina ' . $employee->contract->company->address->detailAddressCompany->ofi : '' }}{{ ($employee->contract->company->address->detailAddressCompany->floor) ? ', Piso ' . $employee->contract->company->address->detailAddressCompany->floor : '' }}{{ ". " . $employee->contract->company->address->commune->name . ", " . $employee->contract->company->address->commune->province->name . ". " . $employee->contract->company->address->commune->province->region->name --}}
        </td>
    </tr>
</table>