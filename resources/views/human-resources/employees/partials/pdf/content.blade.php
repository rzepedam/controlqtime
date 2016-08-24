<!doctype html>
<html lang="es">
<body>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr class="active">
                <th class="col-md-1 text-center">ID</th>
                <th class="col-md-4">Nombre</th>
                <th class="col-md-3">Email</th>
                <th class="col-md-4">Nacionalidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td class="text-center">{{ $employee->id }}</td>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->email_employee }}</td>
                    <td>{{ $employee->nationality->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>