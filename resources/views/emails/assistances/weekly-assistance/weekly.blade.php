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
    @foreach($assistances as $assistance)
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
    @endforeach
</table>