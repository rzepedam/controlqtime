@extends('layout.index')

@section('title_header') Detalle Formulario Chequeo Vehículo : <span class="text-primary">{{ $checkVehicleForm->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('check-vehicle-forms.index') }}"><i class="fa fa-pencil-square-o"></i> Formulario Chequeo Vehículos</a></li>
    <li class="active">Ver</li>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <i class="fa fa-bus" aria-hidden="true"></i> Vehículo :  {{ $checkVehicleForm->vehicle->modelVehicle->trademark->name . ', ' . $checkVehicleForm->vehicle->modelVehicle->name . '. Año ' . $checkVehicleForm->vehicle->year }}
                    </div>
                    <div class="col-md-5">
                        <i class="fa fa-user" aria-hidden="true"></i> Revisor : {{ $checkVehicleForm->user->employee->full_name }}
                    </div>
                    <span class="visible-xs visible-sm"><br /></span>
                    <div class="col-md-offset-1 col-md-5">
                        <i class="fa fa-tag" aria-hidden="true"></i> Patente : {{ $checkVehicleForm->vehicle->patent }}
                    </div>
                    <div class="col-md-5">
                        <i class="fa fa-road" aria-hidden="true"></i> Terminal : <span class="text-primary">Pendiente</span>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
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
                        @foreach($checkVehicleForm->masterFormPieceVehicle->pieceVehicles as $pieceVehicle)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $pieceVehicle->name }}
                                    </td>
                                    <td>
                                        <span class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" disabled {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Bueno') ? 'checked' : null }} />
                                            <label></label>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" disabled {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Dañado') ? 'checked' : null }} />
                                            <label></label>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" disabled {{ ($checkVehicleForm->statePieceVehicles[$loop->index]->name == 'Faltante') ? 'checked' : null }} />
                                            <label></label>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('check-vehicle-forms.index') }}">Volver</a>
        </div>
    </div>

@stop