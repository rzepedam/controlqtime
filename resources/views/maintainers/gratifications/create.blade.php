@extends('layout.index')

@section('title_header') Crear Nueva Gratificación @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.gratifications.index') }}"><i class="fa fa-diamond"></i> Gratificaciones</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.gratifications.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.gratifications.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.gratifications.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop