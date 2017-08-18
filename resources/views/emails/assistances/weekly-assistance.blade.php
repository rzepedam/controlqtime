@component('mail::message')

# {{ $employee->full_name }}
<br />
A continuación el resumen semanal de su asistencia desde el <span style="color: #1E88E5; text-transform: capitalize">{{ Date::parse(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $init))->format('l j F') }}</span> al <span style="color: #1E88E5; text-transform: capitalize">{{ Date::parse(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $end))->format('l j F') }}</span>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
        <td align="center">
            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                <tr>
                    <td align="center">

                        @include('emails.assistances.partials.company_employee')

                    </td>
                </tr>
                <tr>
                    <td align="center">

                        @include('emails.assistances.partials.weekly')

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br />
<br />

Saludos.
<br />
Equipo Controlqtime.

@endcomponent
