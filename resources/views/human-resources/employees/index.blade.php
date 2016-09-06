@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/index-common.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/human-resources/employees/index-custom-employees.css') }}">

@stop

@section('title_header') Listado de Trabajadores
    <br/>
    @if (Session::get('step1'))
        <a href="{{ route('employees.create') }}" class="btn btn-primary waves-effect waves-light" id="modalSessionConfirmation"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @else
        <a href="{{ route('employees.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @endif
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('content')

    @include('human-resources.employees.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>
    <script src="{{ elixir('js/human-resources/employees/index-custom-employees.js') }}"></script>

@stop