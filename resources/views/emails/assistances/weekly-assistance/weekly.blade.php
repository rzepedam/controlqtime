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
    {{--@foreach($assistances as $assistance)
        @php
            $effectiveHrs = $assistance->last()->created_at->diff($assistance->first()->created_at)
        @endphp
        <tr>
            <td  style="text-transform: capitalize" align="left">
                {{ Date::parse(\Carbon\Carbon::createFromFormat('d-m', $assistances->keys()[$loop->index]))->format('l j F') }}
            </td>
            <td align="center">{{ $assistance->first()->created_at->format('H:i:s') }}</td>
            <td align="center">{{ $assistance->last()->created_at->format('H:i:s') }}</td>
            <td align="center">{{ $effectiveHrs->h . " hrs. " . $effectiveHrs->i . "min." }}</td>
        </tr>
    @endforeach--}}
</table>