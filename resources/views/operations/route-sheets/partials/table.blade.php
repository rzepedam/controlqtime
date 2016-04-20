<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">Nº Planilla</th>
                        <th class="col-md-3 text-center">Conductor</th>
                        <th class="col-md-1 text-center">Turno</th>
                        <th class="col-md-1 text-center">Estado</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($route_sheets as $route_sheet)
                    <tr data-id="{{ $route_sheet->id }}">
                        <td>{{ $route_sheet->num_sheet }}</td>
                        <td class="text-center">{{ $route_sheet->manpower->full_name }}</td>
                        <td class="text-center">{{ $route_sheet->turn }}</td>
                        @if ($route_sheet)
                            <td class="text-center"><a href="javascript:void(0)" class="label label-round label-success">Open</a></td>
                        @else
                            <td class="text-center"><a href="javascript:void(0)" class="label label-round label-danger">Closed</a></td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('operations.route-sheets.show', $route_sheet) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i> </a>
                            <a href="{{ route('operations.route-sheets.edit', $route_sheet) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                            <a id="btnAssignRoute" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" data-target="#assignRouteModal" data-id="{{ $route_sheet->id }}" data-toggle="modal" title="Asignar Recorrido"><i class="fa fa-map-signs" aria-hidden="true"></i> </a>
                            <a id="btnFinishedRouteSheet" class="btn btn-squared btn-dark waves-effect waves-light mitooltip" data-target="#finishedRouteSheet" data-id="{{ $route_sheet->id }}" data-toggle="modal"  title="Finalizar Planilla de Ruta"><i class="fa fa-check-square-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="assignRouteModal" aria-hidden="false" aria-labelledby="assignRouteModalLabel"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">

        {{ Form::open(array('route' => 'operations.rounds.store', 'method' => 'POST', 'class' => 'modal-content', 'id' => 'form-assign-route') ) }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="assignRouteModalLabel">Asociar Recorrido</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('route_id', 'Recorrido', ['class' => 'control-label']) }}
                        {{ Form::select('route_id', $routes, null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6 form-group">
                        {{ Form::label('vehicle_id', 'Bus', ['class' => 'control-label']) }}
                        {{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        <button id="btnSaveRoute" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-download" aria-hidden="true"></i> Asignar Recorrido</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div class="modal fade" id="finishedRouteSheet" aria-hidden="false" aria-labelledby="finishedRouteSheetLabel"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">

        {{-- Form::open(array('route' => 'operations.rounds.store', 'method' => 'POST', 'class' => 'modal-content', 'id' => 'form-assign-route') ) --}}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="finishedRouteSheetLabel">Asociar Recorrido</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('route_id', 'Recorrido', ['class' => 'control-label']) }}

                </div>
                <div class="col-md-6 form-group">
                    {{ Form::label('vehicle_id', 'Bus', ['class' => 'control-label']) }}

                </div>
                <div class="col-md-12">
                    <button id="btnSaveRoute" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-download" aria-hidden="true"></i> Asignar Recorrido</button>
                </div>
            </div>
        </div>

        {{-- Form::close() --}}

    </div>
</div>
<!-- End Modal -->