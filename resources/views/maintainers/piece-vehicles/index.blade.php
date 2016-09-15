@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado Piezas de Vehículos
    <br />
    <a href="{{ route('piece-vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Pieza Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Piezas de Vehículos</li>
@stop

@section('content')

    @include('maintainers.piece-vehicles.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/piece-vehicles/index-custom-piece-vehicles.js') }}"></script>

@stop