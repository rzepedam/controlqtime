@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Periocidades
    <br />
    <a href="{{ route('maintainers.contracts.periodicities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Periocidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.contracts') }}"><i class="md-assignment"></i> Contratos</a></li>
    <li class="active">Periocidades</li>
@stop

@section('content')

    @include('maintainers.contracts.periodicities.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers.contracts') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/maintainers/contracts/periodicities/config_bootstrap_table.js') }}

@stop