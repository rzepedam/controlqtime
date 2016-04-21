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
                        <td>
                            {{ $route_sheet->num_sheet }}
                        </td>
                        <td class="text-center">
                            {{ $route_sheet->manpower->full_name }}
                        </td>
                        <td class="text-center">
                            {{ $route_sheet->turn }}
                        </td>

                        @if ($route_sheet->status == 'open')
                            <td class="text-center">
                                <span class="label label-round label-success">Abierta</span>
                            </td>
                        @else
                            <td class="text-center">
                                <span class="label label-round label-danger">Cerrada</span></td>
                        @endif

                        <td class="text-center">
                            <a href="{{ route('operations.route-sheets.show', $route_sheet) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i> </a>
                            <a href="{{ route('operations.route-sheets.edit', $route_sheet) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                            @if ($route_sheet->num_rounds > 0)
                                <a class="btn btn-squared btn-danger waves-effect waves-light mitooltip btnConfirmFinishedRoute" data-target="#confirmFinishedRouteModal" data-id="{{ $route_sheet->id_open_round }}" data-toggle="modal" title="Confirmar Término Recorrido"><i class="fa fa-map-signs" aria-hidden="true"></i> </a>
                            @else
                                <a id="btnAssignRoute" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" data-target="#assignRouteModal" data-id="{{ $route_sheet->id }}" data-toggle="modal" title="Asignar Recorrido"><i class="fa fa-map-signs" aria-hidden="true"></i> </a>
                            @endif
                            <a id="btnFinishedRouteSheet" class="btn btn-squared btn-dark waves-effect waves-light mitooltip" data-target="#finishedRouteSheet" data-id="{{ $route_sheet->id }}" data-toggle="modal"  title="Finalizar Planilla de Ruta"><i class="fa fa-check-square-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Assign Route -->
<div class="modal fade modal-primary modal-fade-in-scale-up" id="assignRouteModal" aria-hidden="false" aria-labelledby="assignRouteModalLabel"
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


<!-- Modal Confirm Finished Route -->
<div class="modal fade modal-danger modal-fade-in-scale-up" id="confirmFinishedRouteModal" aria-hidden="false" aria-labelledby="confirmFinishedRouteModalLabel"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">

        {{ Form::open(array('route' => 'operations.rounds.store', 'method' => 'POST', 'class' => 'modal-content', 'id' => 'form-assign-route') ) }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="confirmFinishedRouteModalLabel">Desea confirmar el término del siguiente Recorrido?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('route_select_id', 'Recorrido', ['class' => 'control-label']) }}
                        {{ Form::select('route_select_id', $routes, null, ['class' => 'form-control', 'disabled']) }}
                    </div>
                    <div class="col-md-6 form-group">
                        {{ Form::label('vehicle_select_id', 'Bus', ['class' => 'control-label']) }}
                        {{ Form::select('vehicle_select_id', $vehicles, null, ['class' => 'form-control', 'disabled']) }}
                    </div>
                    <div class="col-md-12">
                        <button id="btnFinishedRoute" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-check" aria-hidden="true"></i> Confirmar Término Recorrido</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
</div>
<!-- End Modal -->
