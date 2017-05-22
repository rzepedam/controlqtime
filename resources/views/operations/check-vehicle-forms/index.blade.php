@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado Formulario Chequeo Vehículos
    <br />
    <a href="{{ route('check-vehicle-forms.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Formulario Chequeo Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li class="active">Formulario Chequeo Vehículos</li>
@stop

@section('content')

    @include('operations.check-vehicle-forms.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('operations') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/operations/check-vehicle-forms/index-custom-check-vehicle-forms.js') }}"></script>

@stop