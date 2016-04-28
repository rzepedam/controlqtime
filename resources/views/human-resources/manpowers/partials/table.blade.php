<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-3">Nombre</th>
                        <th class="col-md-4">Email</th>
                        <th class="col-md-1 text-center">Estado</th>
                        <th class="col-md-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manpowers as $manpower)
                        <tr data-id="{{ $manpower->id }}">
                            <td>{{ $manpower->id }}</td>
                            <td>{{ $manpower->full_name }}</td>
                            <td>{{ $manpower->email }}</td>

                            @if ($manpower->status == 'available')
                                <td class="text-center">
                                    <span class="label label-round label-success">Disponible</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="label label-round label-primary">No Disponible</span>
                                </td>
                            @endif

                            <td class="text-center">
                                <a href="{{ route('human-resources.manpowers.show', $manpower) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i></a>
                                <a href="{{ route('human-resources.manpowers.edit', $manpower) }}" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                @if ($manpower->status == 'available')
                                    <a class="btn btn-squared btn-success waves-effect waves-light mitooltip btnStartDailyAssistance" data-id="{{ $manpower->id }}" title="Iniciar Asistencia Diaria"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                @else
                                    {{ Form::open(['route' => ['human-resources.manpowers.updateDailyAssistance', $manpower->id], 'method' => 'POST', 'id' => 'form-assistance-update', 'style' => 'display: inline-block']) }}
                                        <a class="btn btn-squared btn-primary waves-effect waves-light mitooltip btnUpdateDailyAssistance" data-id="{{ $manpower->id }}" title="Detener Asistencia Diaria"><i class="fa fa-hourglass-half" aria-hidden="true"></i></a>
                                    {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>