@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Vehículos
    <br />
    <a href="{{ route('operations.vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li class="active">Vehículos</li>
@stop

@section('content')

    @include('operations.vehicles.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('operations') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/operations/vehicles/config_bootstrap_table.js') }}

@stop