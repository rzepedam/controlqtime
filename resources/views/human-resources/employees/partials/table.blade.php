<div class="panel">
    <div class="panel-body">
        <div id="myToolbar" class="pull-left margin-bottom-10 padding-left-0 col-xs-9 col-sm-8 col-md-6">

        </div>
        <table class="table-hover table-condensed" id="employee_table" data-sort-name="name" data-sort-order="desc">
            <thead class="active">
                <tr>
                    <th data-field="id" data-sortable="true" class="col-md-1">ID</th>
                    <th data-field="full_name" data-sortable="true" class="col-md-3">Nombre</th>
                    <th data-field="email_employee" data-sortable="true" class="col-md-3">Email</th>
                    <th data-field="company_id" data-sortable="true" class="col-md-2 text-center">Empresa</th>
                    <th class="col-md-3 text-center">Acciones</th>
                </tr>
            </thead>
            {{--<tbody>
                @foreach($employees as $employee)
                    <tr data-id="{{ $employee->id }}">
                        @if ($employee->state == 'disable')
                            <td><a class="text-danger tooltip-danger" data-toggle="tooltip" data-original-title="Activar trabajador" href="{{ route('human-resources.employees.attachFiles', $employee) }}">{{ $employee->id }}</a></td>
                        @else
                            <td>{{ $employee->id }}</td>
                        @endif
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->email_employee }}</td>
                        <td></td>
                        <td class="text-center">
                            <a href="{{ route('human-resources.employees.show', $employee) }}" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a>
                            <a href="{{ route('human-resources.employees.edit', $employee) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('human-resources.employees.attachFiles', $employee->id) }}" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a>
                            @if ($employee->state == 'enable')
                                <a class="btn btn-squared btn-success waves-effect waves-light btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="{{ $employee->id }}"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                            @else
                                <a class="btn btn-squared btn-success waves-effect waves-light disabled btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="{{ $employee->id }}"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                {{-- Form::open(['route' => ['human-resources.employees.updateDailyAssistance', $employee->id], 'method' => 'POST', 'id' => 'form-assistance-update', 'style' => 'display: inline-block']) --}}
                                {{--<a class="btn btn-squared btn-primary waves-effect waves-light mitooltip btnUpdateDailyAssistance" data-id="{{ $employee->id }}" title="Detener Asistencia Diaria"><i class="fa fa-hourglass-half" aria-hidden="true"></i></a>--}}
                                {{-- Form::close() --}}
                            {{--@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>--}}
        </table>
    </div>
</div>