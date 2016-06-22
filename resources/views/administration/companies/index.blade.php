@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Empresas
    <br />
    <a href="{{ route('administration.companies.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Empresa</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li class="active">Empresas</li>
@stop

@section('content')

    @include('administration.companies.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('administration') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/administration/companies/config_bootstrap_table.js') }}

@stop


