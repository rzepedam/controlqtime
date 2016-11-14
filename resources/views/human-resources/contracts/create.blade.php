@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/human-resources/contracts/create-custom-contracts.css') }}">

@stop

@section('title_header') Crear Nuevo Contrato Laboral @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('contracts.index') }}"><i class="md-assignment"></i> Contratos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'contracts.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        {{-- Panel Información Laboral --}}
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="icon md-assignment text-primary"></i> Información Laboral
                </h3>
            </div>
            <div class="panel-body">

                @include('human-resources.contracts.partials.fields.labor_information')

            </div>
        </div>

        {{-- Panel Remuneraciones --}}
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="icon md-money text-success"></i> Remuneraciones
                </h3>
            </div>
            <div class="panel-body">

                @include('human-resources.contracts.partials.fields.remuneration')

            </div>
        </div>

        {{-- Panel Cláusulas y Obligaciones --}}
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="icon md-lock-open text-info"></i> Cláusulas y Obligaciones
                </h3>
            </div>
            <div class="panel-body">

                @include('human-resources.contracts.partials.fields.terms_and_obligations')

            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-6">
                <a href="{{ route('contracts.index') }}">Volver</a>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-6">
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/human-resources/contracts/create-custom-contracts.js') }}"></script>

@stop