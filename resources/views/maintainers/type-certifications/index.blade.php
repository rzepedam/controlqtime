@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Certificaciones
    <br />
    <a href="{{ route('maintainers.type-certifications.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Certificación</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Certificaciones</li>
@stop

@section('content')

    @include('maintainers.type-certifications.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/type-certifications/index-custom-type-certifications.js') }}"></script>

@stop