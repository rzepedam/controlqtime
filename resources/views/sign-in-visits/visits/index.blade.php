@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Visitas
    <br />
    <a href="{{ route('visits.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Visita</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('sign-in-visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li class="active">Visitas</li>
@stop

@section('content')

    @include('sign-in-visits.visits.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('sign-in-visits') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/sign-in-visits/visits/index-custom-visits.js') }}"></script>

@stop