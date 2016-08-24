@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/human-resources/contracts/index-contracts.css') }}">

@stop

@section('title_header') Listado de Contratos
    <br />
    <a href="{{ route('human-resources.contracts.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Contrato</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Contratos</li>
@stop

@section('content')

    @include('human-resources.contracts.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script type="text/javascript" src="{{ elixir('js/human-resources/contracts/index-contracts.js') }}"></script>

@stop