@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-select.css') }}
    {{ Html::style('assets/css/bootstrap-clockpicker.css') }}

@stop

@section('title_header') Crear Nuevo Contrato @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('human-resources.contracts.index') }}"><i class="md-assignment"></i> Contratos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {{ Form::open(array('route' => 'human-resources.contracts.step1', 'method' => 'POST')) }}

        {{-- Panel Información Laboral --}}
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="icon md-assignment text-primary"></i> Información Laboral
                </h3>
            </div>
            <div class="panel-body">

                @include('human-resources.contracts.partials.labor_information')

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

                @include('human-resources.contracts.partials.remuneration')

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

                @include('human-resources.contracts.partials.terms_and_obligations')

            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-6">
                <a href="{{ route('human-resources.contracts.index') }}">Volver</a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <button class="btn btn-squared btn-danger btn-lg waves-effect waves-light pull-right"><i class="fa fa-file-pdf-o"></i> Visualizar</button>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-2">
                <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-clockpicker.js') }}
    {{ Html::script('assets/js/components/bootstrap-clockpicker.js') }}
    {{ Html::script('assets/js/bootstrap-select.js') }}
    {{ Html::script('assets/js/components/bootstrap-select.js') }}

@stop