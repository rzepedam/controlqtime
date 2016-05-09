@extends('layout.index')

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                @if ($vehicle->state == 'available')
                    <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-success">
                        <span class="ribbon-inner">Estado : Activado</span>
                    </div>
                @else
                    <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-danger">
                        <span class="ribbon-inner">Estado : No Activado</span>
                    </div>
                @endif
                <div class="ribbon ribbon-bookmark ribbon-info">
                    <span class="ribbon-inner">Cód. Interno : {{ $vehicle->code }}</span>
                </div>
                <div class="panel-body">
                    <br />
                    <br />
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-3">Empresa</td>
                                            <td class="text-center"><i class="fa fa-building"></i> <a href="{{ route('maintainers.companies.show', $vehicle->company->id) }}" style="color: #757575"> {{ $vehicle->company->firm_name }}</a></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Terminal</td>
                                            <td class="text-center"><i class="fa fa-road"></i> {{ $vehicle->terminal->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Tipo Vehículo</td>
                                            <td class="text-center"><i class="fa fa-bus"></i> {{ $vehicle->typeVehicle->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Marca</td>
                                            <td class="text-center">{{ $vehicle->modelVehicle->trademark->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Modelo</td>
                                            <td class="text-center"> {{ $vehicle->modelVehicle->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Año</td>
                                            <td class="text-center">{{ $vehicle->year }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Patente</td>
                                            <td class="text-center">{{ $vehicle->patent }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Ingresado</td>
                                            <td class="text-center text-capitalize">{{ Date::parse($vehicle->created_at)->format('l j F Y H:i:s') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers.vehicles.index') }}">Volver</a>
        </div>
    </div>

@stop