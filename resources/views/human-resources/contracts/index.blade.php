@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Contratos
    <br />
    <a href="{{ route('human-resources.contracts.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Contrato</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Contratos</li>
@stop

@section('content')

    @include('human-resources.contracts.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/human-resources/contracts/config_bootstrap_table.js') }}

@stop