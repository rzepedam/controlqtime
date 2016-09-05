@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/operations/vehicles/create-edit-custom-vehicles.css') }}">

@stop

@section('title_header') Editar Vehículo: <span class="text-primary">{{ $vehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('operations.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($vehicle, array('route' => array('operations.vehicles.update', $vehicle), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('operations.vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('operations.vehicles.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('operations.vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>
    <script src="{{ elixir('js/operations/vehicles/create-edit-custom-vehicles.js') }}"></script>

@stop
