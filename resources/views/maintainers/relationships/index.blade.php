@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Relaciones Familiares
    <br />
    <a href="{{ route('relationships.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Relación Familiar</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Relaciones Familiares</li>
@stop

@section('content')

    @include('maintainers.relationships.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/relationships/index-custom-relationships.js') }}"></script>

@stop