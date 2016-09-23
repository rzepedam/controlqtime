@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Unidades de Medida para Peso
    <br />
    <a href="{{ route('weights.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Unidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li class="active">Peso</li>
@stop

@section('content')

    @include('maintainers.measuring-units.weights.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers.measuring-units') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/measuring-units/weights/index-custom-weights.js') }}"></script>

@stop