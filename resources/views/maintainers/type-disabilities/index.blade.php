@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Discapacidades
    <br />
    <a href="{{ route('type-disabilities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Discapacidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Discapacidades</li>
@stop

@section('content')

    @include('maintainers.type-disabilities.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/type-disabilities/index-custom-type-disabilities.js') }}"></script>

@stop