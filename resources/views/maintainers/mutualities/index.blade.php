@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Mutualidades
    <br />
    <a href="{{ route('mutualities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Mutualidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Mutualidades</li>
@stop

@section('content')

    @include('maintainers.mutualities.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/mutualities/index-custom-mutualities.js') }}"></script>

@stop