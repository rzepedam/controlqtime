@extends('layout.index')

@section('title_header') Crear Nuevo Modelo de Vehículo @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.model-vehicles.index') }}"><i class="fa fa-car"></i> Modelo de Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="panel">
        {{ Form::open(array('route' => 'maintainers.model-vehicles.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.model-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.model-vehicles.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}
    </div>

@stop