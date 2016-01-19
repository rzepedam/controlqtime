@extends('layout.index')

@section('title_header') Crear Nueva Institución
    <br>

@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.institutions.index') }}"><i class="fa fa-graduation-cap"></i> Instituciones</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="box box-primary">
        {!! Form::open(array('route' => 'maintainers.institutions.store', 'method' => 'POST')) !!}
        <div class="box-body">
            @include('maintainers.institutions.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.institutions.index') }}">Volver</a>
            <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>

@stop

