@extends('layout.index')

@section('css')

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

    <div class="panel">

        {{ Form::model($vehicle, array('route' => array('vehicles.update', $vehicle), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('operations.vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('vehicles.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
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

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/operations/vehicles/create-edit-custom-vehicles.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
