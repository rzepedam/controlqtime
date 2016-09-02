@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Cláusulas y Obligaciones
    <br />
    <a href="{{ route('maintainers.terms-and-obligatories.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Cláusula y Obligación</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Cláusulas y Obligaciones</li>
@stop

@section('content')

    @include('maintainers.terms-and-obligatories.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/terms-and-obligatories/index-custom-terms-and-obligatories.js') }}"></script>

@stop