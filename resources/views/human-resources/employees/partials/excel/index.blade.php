<table class="table table-striped table-condensed table-responsive table-bordered">
      <thead>
          <tr>
                <th>Nombre</th>
                <th>Rut</th>
                <th>Email</th>
                <th>Teléfono</th>
          </tr>
      </thead>
      <tbody>
          @foreach($employees as $employee)
            <tr>
                 <td>{{ $employee->full_name }}</td>
                 <td>{{ $employee->rut }}</td>
                 <td>{{ $employee->email_employee }}</td>
                 <td>{{ $employee->address->phone1 }}</td>
            </tr>
          @endforeach
     </tbody>
</table>