@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/operations/vehicles/create-edit-custom-vehicles.css') }}">

@stop

@section('title_header') Crear Nuevo Vehículo @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'vehicles.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-bus text-primary" aria-hidden="true"></i> Información del Vehículo</h3>
            </div>
            <div class="panel-body">

                @include('operations.vehicles.partials.fields.info_vehicle')

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
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/operations/vehicles/create-edit-custom-vehicles.js') }}"></script>

@stop