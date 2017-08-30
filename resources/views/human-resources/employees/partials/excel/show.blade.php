<table>
      <thead>
          <tr>
            <th colspan="3" style="text-align: center; border: 1px solid" >{{ $employee->full_name }}</th>
          </tr>
          <tr>
            <th colspan="3" style="text-align: center; border: 1px solid">
              {{ Date::parse($init)->format('j F Y') }} - {{ Date::parse($end)->format('j F Y') }}
            </th>
          </tr>
          <tr>
            <th style="text-align: center; border: 1px solid">Dispositivo</th>
            <th style="text-align: center; border: 1px solid">Entrada</th>
            <th style="text-align: center; border: 1px solid">Salida</th>
          </tr>
      </thead>
      <tbody>
          @foreach($assistances as $assistance)
            <tr>
                 <td style="text-align: center; border: 1px solid">{{ $assistance->num_device }}</td>
                 <td style="text-align: center; border: 1px solid">{{ Date::parse($assistance->log_in)->format('d-m-Y H:i:s') }}</td>
                 @if (! is_null($assistance->log_out) )
                    <td style="text-align: center; border: 1px solid">{{ Date::parse($assistance->log_out)->format('d-m-Y H:i:s') }}</td>
                 @else
                    <td style="text-align: center; border: 1px solid"> - </td>
                 @endif
            </tr>
          @endforeach
     </tbody>
</table>