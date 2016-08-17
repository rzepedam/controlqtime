@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Nº de Horas
    <br />
    <a href="{{ route('maintainers.num-hours.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Nº de Horas</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Nº de Horas</li>
@stop

@section('content')

    @include('maintainers.num-hours.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/maintainers/num-hours/config_bootstrap_table.js') }}

@stop