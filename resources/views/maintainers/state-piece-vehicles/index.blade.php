@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Estado Pieza Vehículos
    <br />
    <a href="{{ route('state-piece-vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Estado Pieza Vehículo</a>
@stop

@section('breadcumb')

    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Estado Pieza Vehículos</li>

@stop

@section('content')

    @include('maintainers.state-piece-vehicles.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/state-piece-vehicles/index-custom-state-piece-vehicles.js') }}"></script>

@stop