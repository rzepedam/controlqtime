<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 pull-left margin-bottom-5">
                <div class="pagination-detail"><span class="pagination-info">Mostrando <span class="page-list "><span class="btn-group"><button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><span class="page-size">25</span> <span class="fa fa-caret-down"></span></button><ul class="dropdown-menu" role="menu"><li class="active"><a href="javascript:void(0)" class="num_paginate">25</a></li><li><a href="javascript:void(0)" class="num_paginate">50</a></li><li><a href="javascript:void(0)" class="num_paginate">100</a></li></ul></span> elementos</span></span> </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 pull-right">
                <div class="input-group">
                    {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'autofocus']) }}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-dark waves-effect waves-light"><i class="icon md-search" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID <i class="fa fa-caret-down" aria-hidden="true"></i></th>
                        <th class="col-md-4">Nombre <i class="fa fa-caret-down" aria-hidden="true"></i></th>
                        <th class="col-md-3">Email <i class="fa fa-caret-down" aria-hidden="true"></i></th>
                        <th class="col-md-1 text-center">Documentación</th>
                        <th class="col-md-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr data-id="{{ $employee->id }}">
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->full_name }}</td>
                            <td>{{ $employee->email_employee }}</td>
                            @if ($employee->state == 'disable')
                                <td class="text-center">
                                    <a href="{{ route('human-resources.employees.attachFiles', $employee) }}" class="text-danger"><i class="fa fa-times-circle font-size-18"></i></a>
                                </td>
                            @else
                                <td class="text-center text-success">
                                    <i class="fa fa-check-circle font-size-18"></i>
                                </td>
                            @endif
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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br />
        <span class="pull-left margin-top-30">
            Hay un total de <span class="text-primary">{{ $employees->total() }}</span> registros
        </span>
        <span class="pull-right">{{ $employees->links() }}</span>
    </div>

</div>