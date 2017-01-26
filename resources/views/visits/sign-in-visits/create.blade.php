@extends('layout.index')

@section('title_header') Crear Nuevo Registro Visita @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/visits/sign-in-visits/create-edit-custom-sign-in-visits.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('sign-in-visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'sign-in-visits.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-check-square-o text-primary"></i> Datos Personales</h3>
            </div>
            <div class="panel-body">

                @include('visits.sign-in-visits.partials.info_personal')

            </div>
        </div>
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i> Información de Contacto</h3>
            </div>
            <div class="panel-body">

                @include('visits.sign-in-visits.partials.info_contacto')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('sign-in-visits.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/visits/sign-in-visits/create-edit-custom-sign-in-visits.js') }}"></script>

@stop