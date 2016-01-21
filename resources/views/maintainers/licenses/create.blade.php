@extends('layout.index')

@section('title_header') Crear Nueva Licencia Profesional @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.licenses.index') }}"><i class="fa fa-star"></i> Licencias Profesionales</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="box box-primary">
        {!! Form::open(array('route' => 'maintainers.licenses.store', 'method' => 'POST')) !!}
        <div class="box-body">
            @include('maintainers.licenses.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.licenses.index') }}">Volver</a>
            <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>

@stop