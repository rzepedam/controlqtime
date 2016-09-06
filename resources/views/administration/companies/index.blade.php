@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Empresas
    <br />
    <a href="{{ route('companies.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Empresa</a>
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

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/administrations/companies/index-custom-companies.js') }}"></script>

@stop


