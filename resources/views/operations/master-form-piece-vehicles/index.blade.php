@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Maestros Formulario Pieza Vehículos
    <br />
    <a href="{{ route('master-form-piece-vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Maestro Formulario Pieza Vehículos</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li class="active">M.F.P. Vehículos</li>
@stop

@section('content')

    @include('operations.master-form-piece-vehicles.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('operations') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/operations/master-form-piece-vehicles/index-custom-master-form-piece-vehicles.js') }}"></script>

@stop