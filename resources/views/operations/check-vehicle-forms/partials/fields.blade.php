<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
        {{-- Patente Vehículo Form Select --}}
        <div class="form-group">
            {{ Form::label('vehicle_id', 'Patente Vehículo', ['class' => 'control-label']) }}
            @if ( Route::is('check-vehicle-forms.create') )
                {{ Form::select('vehicle_id', ['default' => 'Seleccione Vehículo...'] + $vehicles->toArray(), null, ['class' => 'form-control']) }}
            @else
                {{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) }}
            @endif
        </div>
    </div>
    @if ( Route::is('check-vehicle-forms.create') )
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 hide show-detail-vehicle">
    @else
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 show-detail-vehicle">
    @endif
        <div class="well well-sm">
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-bus" aria-hidden="true"></i> Vehículo
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    @if ( Route::is('check-vehicle-forms.create') )
                        <span id="trademark_vehicle"></span>
                    @else
                        <span id="trademark_vehicle">: {{ $checkVehicleForm->vehicle->patent }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-road" aria-hidden="true"></i> Terminal
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    @if ( Route::is('check-vehicle-forms.create') )
                        <span id="terminal_name"class="text-primary">: Pendiente</span>
                    @else
                        <span id="terminal_name" class="text-primary">: Pendiente</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-user" aria-hidden="true"></i> Revisor
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    @if ( Route::is('check-vehicle-forms.create') )
                        : {{ auth()->user()->employee->full_name }}
                    @else
                        : {{ $checkVehicleForm->user->employee->full_name }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <h4>Seleccione estado actual de las piezas listadas a continuación: </h4>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="col-md-1 text-center">#</th>
                    <th class="col-md-5">Nombre</th>
                    <th class="col-md-2 text-center">Bueno <i class="fa fa-check-circle text-success" aria-hidden="true"></i></th>
                    <th class="col-md-2 text-center">Dañado <i class="fa fa-exclamation-circle text-warning" aria-hidden="true"></i></th>
                    <th class="col-md-2 text-center">Faltante <i class="fa fa-times-circle text-danger" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($masterFormPieceVehicle as $pieceVehicle)
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $pieceVehicle->name }}
                        </td>
                        <td>
                        <span class="checkbox-custom checkbox-primary">
                            @if ( Route::is('check-vehicle-forms.create') )
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[0]->id }}" />
                            @else
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[0]->id }}" {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Bueno') ? 'checked' : null }} />
                            @endif
                            <label></label>
                        </span>
                        </td>
                        <td>
                        <span class="checkbox-custom checkbox-primary">
                            @if ( Route::is('check-vehicle-forms.create') )
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[1]->id }}" />
                            @else
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[1]->id }}" {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Dañado') ? 'checked' : null }} />
                            @endif
                            <label></label>
                        </span>
                        </td>
                        <td>
                        <span class="checkbox-custom checkbox-primary">
                            @if ( Route::is('check-vehicle-forms.create') )
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[2]->id }}" />
                            @else
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[2]->id }}" {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Faltante') ? 'checked' : null }} />
                            @endif
                            <label></label>
                        </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>