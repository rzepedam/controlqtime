<table>
    <thead>
        <tr>
            <th colspan="5" style="text-align: center">
                Desde {{ Date::parse($init)->format('l j F Y') }} hasta {{ Date::parse($end)->format('l j F Y') }}
            </th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th style="text-align: center; border: 1px solid">Rut</th>
            <th style="text-align: center; border: 1px solid">Área</th>
            <th style="text-align: center; border: 1px solid">Entrada</th>
            <th style="text-align: center; border: 1px solid">Salida</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assistances as $assistance)
            <tr>
                <td style="vertical-align: middle; border: 1px solid;">
                    {{ $assistance->full_name }}
                </td>
                <td style="vertical-align: middle; border: 1px solid; text-align: center;">
                    {{ $assistance->rut }}
                </td>
                <td style="vertical-align: middle; border: 1px solid; text-align: center;">
                    {{ $assistance->name }}
                </td>
                <td style="vertical-align: middle; border: 1px solid; text-align: center;">
                    {{ Date::parse($assistance->log_in)->format('d-m-Y H:i:s') }}
                </td>
                <td style="vertical-align: middle; border: 1px solid; text-align: center;">
                    @if ( ! is_null($assistance->log_out))
                        {{ Date::parse($assistance->log_out)->format('d-m-Y H:i:s') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>