@component('mail::message')
# {{ $employee->full_name }}
<br />
A continuación el detalle de su asistencia hoy <span style="color: #1E88E5;text-transform: capitalize">{{ Date::parse($assistance->created_at)->format('l j F Y') }}</span>
<br />
<br />
@component('mail::table')
| Empresa       | Rut         | Hora  |
|:-------------:|:-----------:|:-----:|
| {{ $employee->contract->company->firm_name }} | {{ $employee->contract->company->rut }} | <span style="color: #1E88E5;">{{ Date::parse($assistance->created_at)->format('H:i:s') }}</span> |
@endcomponent
<br />
Saludos.
<br>
Equipo Controlqtime.

@endcomponent
