@component('mail::message')
# {{ $employee->full_name }}
<br />
A continuación el detalle de su asistencia hoy <span style="color: #1E88E5;text-transform: capitalize">{{ Date::parse($assistance->created_at)->format('l j F Y') }}</span>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
<tr>
<td align="center">
<table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
<tr>
<td align="center">
    <table border="1px solid #E0E0E0" cellpadding="7" cellspacing="0" width="100%">
    <tr style="background-color: #1E88E5; font-size: 14px; color: #FFFFFF">
    <td align="center" colspan="2">
    Asistencia
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
    <tr>
    <td>
    Fecha
    </td>
    <td align="center">
    <span style="color: #1E88E5;">{{ Date::parse($assistance->created_at)->format('d/m/Y') }}</span>
    </td>
    </tr>
    <tr>
    <td>
    Hora
    </td>
    <td align="center">
    <span style="color: #1E88E5;">{{ Date::parse($assistance->created_at)->format('H:i:s') }}</span>
    </td>
    </tr>
    <tr style="background-color: #1E88E5; font-size: 14px; color: #FFFFFF"">
    <td align="center" colspan="2">
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
    Dirección
    </td>
    <td align="center">
    {{ $employee->contract->company->firm_name }}
    </td>
    </tr>
    <tr>
    <td>
    Razón Social
    </td>
    <td align="center">
    {{ $employee->contract->company->address->address }}{{ ($employee->contract->company->address->detailAddressCompany->lot) ? ', Lote ' . $employee->contract->company->address->detailAddressCompany->lot : '' }}{{ ($employee->contract->company->address->detailAddressCompany->bod) ? ', Bodega ' . $employee->contract->company->address->detailAddressCompany->bod : '' }}{{ ($employee->contract->company->address->detailAddressCompany->ofi) ? ', Oficina ' . $employee->contract->company->address->detailAddressCompany->ofi : '' }}{{ ($employee->contract->company->address->detailAddressCompany->floor) ? ', Piso ' . $employee->contract->company->address->detailAddressCompany->floor : '' }}{{ ". " . $employee->contract->company->address->commune->name . ", " . $employee->contract->company->address->commune->province->name . ". " . $employee->contract->company->address->commune->province->region->name }}
    </td>
    </tr>
    </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br />
Si deseas más detalle de tu asistencia, recuerda que puedes visitar tu perfil
@component('mail::button', ['url' => config('app.url') . '/human-resources/employees/' . $employee->id, 'color' => 'blue'])
Visitar Perfil
@endcomponent
<br />
Saludos.
<br>
Equipo Controlqtime.

@endcomponent
