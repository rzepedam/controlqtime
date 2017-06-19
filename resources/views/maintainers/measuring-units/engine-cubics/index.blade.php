@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Unidades de Medida para Cilindraje Motor
    <br />
    <a href="{{ route('engine-cubics.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Unidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li class="active">Cilindraje Motor</li>
@stop

@section('content')

    @include('maintainers.measuring-units.engine-cubics.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers.measuring-units') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/measuring-units/engine-cubics/index.js') }}"></script>

@stop