@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">

@stop

@section('title_header') Listado de Licencias Profesionales
    <br />
    <a href="{{ route('type-professional-licenses.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Licencia Profesional</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Licencias Profesionales</li>
@stop

@section('content')

    @include('maintainers.type-professional-licenses.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/type-professional-licenses/index-custom-type-professional-licenses.js') }}"></script>

@stop