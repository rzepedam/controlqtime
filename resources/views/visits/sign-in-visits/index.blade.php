@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">

@stop

@section('title_header') Listado de Visitas
    <br />
    <a href="{{ route('sign-in-visits.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Registro Visita</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li class="active">Visitas</li>
@stop

@section('content')

    @include('visits.sign-in-visits.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('visits') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/visits/sign-in-visits/index-custom-sign-in-visits.js') }}"></script>

@stop