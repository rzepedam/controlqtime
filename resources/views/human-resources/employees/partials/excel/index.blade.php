<table>
    <thead>
        <tr>
            <th style="border: 1px solid">Nombre</th>
            <th style="border: 1px solid; text-align: center">Rut</th>
            <th style="border: 1px solid; text-align: center">Email</th>
            <th style="border: 1px solid; text-align: center">Teléfono</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td style="border: 1px solid">{{ $employee->full_name }}</td>
                <td style="border: 1px solid; text-align: center">{{ $employee->rut }}</td>
                <td style="border: 1px solid; text-align: center">{{ $employee->email_employee }}</td>
                <td style="border: 1px solid; text-align: center">{{ $employee->address->phone1 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>