@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/maintainers/terminals/index-terminals.css') }}">

@stop

@section('title_header') Listado de Terminales
    <br />
    <a href="{{ route('maintainers.terminals.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Terminal</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Terminales</li>
@stop

@section('content')

    @include('maintainers.terminals.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/maintainers/terminals/index-terminals.js') }}"></script>

@stop