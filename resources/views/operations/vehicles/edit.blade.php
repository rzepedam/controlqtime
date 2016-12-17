@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/create-edit-common.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/operations/vehicles/create-edit-custom-vehicles.css') }}">

@stop

@section('title_header') Editar Vehículo: <span class="text-primary">{{ $vehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::model($vehicle, array('route' => array('vehicles.update', $vehicle), 'method' => 'PUT', 'id' => 'form-submit')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-bus text-primary" aria-hidden="true"></i> Información del Vehículo</h3>
            </div>
            <div class="panel-body">

                @if ($vehicle->type_vehicle_id == 1 || $vehicle->type_vehicle_id == 3)
                    @include('operations.vehicles.partials.edit.info_car_moto_vehicle')
                @endif

                @if ($vehicle->type_vehicle_id == 2)
                    @include('operations.vehicles.partials.edit.info_bus_vehicle')
                @endif

            </div>
            <br />
        </div>
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-folder-open text-warning" aria-hidden="true"></i> Información de Documentación</h3>
            </div>
            <div class="panel-body">

                @include('operations.vehicles.partials.fields.info_documentation')

            </div>
            <br />
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('vehicles.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
        </div>

    {{ Form::close() }}

    <br />
    <br />
    <br />

    @include('operations.vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/operations/vehicles/create-edit-custom-vehicles.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
