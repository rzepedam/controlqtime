<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
        {{-- Patente Vehículo Form Select --}}
        <div class="form-group">
            {{ Form::label('vehicle_id', 'Patente Vehículo', ['class' => 'control-label']) }}
            {{ Form::select('vehicle_id', ['default' => 'Seleccione Vehículo...'] + $vehicles->toArray(), null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2 hide show-detail-vehicle">
        <div class="well well-sm">
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-bus" aria-hidden="true"></i> Vehículo
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    <span id="trademark_vehicle"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-road" aria-hidden="true"></i> Terminal
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    <span id="terminal_name"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Km Actual
                </div>
                <div class="col-xs-7 col-sm-9 col-md-9">
                    <span id="km"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
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
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[0]->id }}" />
                                <label></label>
                            </span>
                        </td>
                        <td>
                            <span class="checkbox-custom checkbox-primary">
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[1]->id }}" />
                                <label></label>
                            </span>
                        </td>
                        <td>
                            <span class="checkbox-custom checkbox-primary">
                                <input type="checkbox" name="state_piece_vehicle_id[]{{ $loop->iteration }}" value="{{ $statePieceVehicles[2]->id }}" />
                                <label></label>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>