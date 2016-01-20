@extends('layout.index')

@section('title_header') Crear Nueva Discapacidad @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.disabilities.index') }}"><i class="fa fa-wheelchair"></i> Discapacidades</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="box box-primary">
        {!! Form::open(array('route' => 'maintainers.disabilities.store', 'method' => 'POST')) !!}
        <div class="box-body">
            @include('maintainers.disabilities.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.disabilities.index') }}">Volver</a>
            <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>

@stop