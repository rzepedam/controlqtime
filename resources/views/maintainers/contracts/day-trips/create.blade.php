@extends('layout.index')

@section('title_header') Crear Nueva Jornada Laboral @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.contracts') }}"><i class="md-assignment"></i> Contratos</a></li>
    <li><a href="{{ route('maintainers.contracts.day-trips.index') }}"><i class="fa fa-tasks"></i> Jornadas Laborales</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.contracts.day-trips.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.contracts.day-trips.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.contracts.day-trips.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop