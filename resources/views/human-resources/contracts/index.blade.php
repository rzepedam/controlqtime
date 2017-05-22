@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Contratos
    <br />
    <a href="{{ route('contracts.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Contrato Laboral</a>
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

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/human-resources/contracts/index-custom-contracts.js') }}"></script>

@stop