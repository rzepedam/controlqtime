@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Control de Acceso @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Control de Acceso</li>
@stop

@section('content')

    @include('human-resources.access-controls.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/sweetalert.min.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/human-resources/access-controls/config_bootstrap_table.js') }}

@stop