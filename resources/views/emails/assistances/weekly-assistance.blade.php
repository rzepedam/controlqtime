@component('mail::message')

# {{ $employee->full_name }}
<br />
A continuación el resumen semanal de su asistencia
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
        <td align="center">
            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                <tr>
                    <td align="center">
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
                                    Raúl Elías Meza Mora
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Rut
                                </td>
                                <td align="center">
                                    17.032.680-6
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
                                    76.150.396-0
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Razón Social
                                </td>
                                <td align="center">
                                    Stop Frenos, Alejandro Ulises Piña Ocayo, E.I.R.L.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dirección
                                </td>
                                <td align="center">
                                    Palacio Riesco 3819, Bodega 14. Huechuraba, Santiago. Región Metropolitana de Santiago
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table border="1px solid #E0E0E0" cellpadding="7" cellspacing="0" width="100%">
                            <tr style="background-color: #1E88E5; font-size: 14px; color: #FFFFFF"">
                            <td align="center" colspan="4">Asistencia Semanal</td>
                            </tr>
                            <tr style="background-color: #E0E0E0" font-size: 13px; color: #FFFFFF">
                            <th align="left">Día</th>
                            <th align="center">Entrada</th>
                            <th align="center">Salida</th>
                            <th align="center">Hrs. Efectivas</th>
                            </tr>
                            <tr>
                                <td align="left">Lunes 07 Agosto</td>
                                <td align="center">08:50:55</td>
                                <td align="center">17:55:10</td>
                                <td align="center">9 hrs 10 min</td>
                            </tr>
                            <tr>
                                <td align="left">Martes 08 Agosto</td>
                                <td align="center">08:30:42</td>
                                <td align="center">18:20:10</td>
                                <td align="center">10 hrs 20 min</td>
                            </tr>
                            <tr>
                                <td align="left">Miércoles 9 Agosto</td>
                                <td align="center">09:15:02</td>
                                <td align="center">18:01:46</td>
                                <td align="center">9 hrs 02 min</td>
                            </tr>
                            <tr>
                                <td align="left">Jueves 10 Agosto</td>
                                <td align="center">08:57:19</td>
                                <td align="center">17:58:49</td>
                                <td align="center">8 hrs 50 min</td>
                            </tr>
                            <tr>
                                <td align="left">Viernes 11 Agosto</td>
                                <td align="center">10:25:09</td>
                                <td align="center">18:30:40</td>
                                <td align="center">8 hrs 40 min</td>
                            </tr>
                        </table>
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
