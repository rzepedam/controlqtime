@extends('layout.index')

@section('title_header') Editar Maestro de Formulario Pieza Vehículos: {{ $masterFormPieceVehicle->id }} @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('master-form-piece-vehicles.index') }}"><i class="md-assignment"></i> M.F.P. Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::model($masterFormPieceVehicle, array('route' => array('master-form-piece-vehicles.update', $masterFormPieceVehicle), 'method' => 'PUT', 'id' => 'form-submit')) }}

        <div class="panel">

                <div class="panel-body">

                    @include('operations.master-form-piece-vehicles.partials.fields')

                </div>
                <br />

        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('master-form-piece-vehicles.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop