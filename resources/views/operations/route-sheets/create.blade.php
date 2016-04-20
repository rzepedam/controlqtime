@extends('layout.index')

@section('title_header') Crear Nueva Planilla de Ruta @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('operations.route-sheets.index') }}"><i class="fa fa-map"></i> Planillas de Ruta</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="panel">
        {{ Form::open(array('route' => 'operations.route-sheets.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('operations.route-sheets.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('operations.route-sheets.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>

@stop