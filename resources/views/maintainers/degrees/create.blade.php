@extends('layout.index')

@section('title_header') Crear Nuevo Grado Académico @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.degrees.index') }}"><i class="fa fa-star-half-o"></i> Grados Académicos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="box box-primary">
    {!! Form::open(array('route' => 'maintainers.degrees.store', 'method' => 'POST')) !!}
    <div class="box-body">
        @include('maintainers.degrees.partials.fields')
    </div>
    <div class="box-footer">
        <a href="{{ route('maintainers.degrees.index') }}">Volver</a>
        <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
    {!! Form::close() !!}
</div>

@stop