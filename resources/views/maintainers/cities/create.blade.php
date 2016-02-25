@extends('layout.index')

@section('title_header') Crear Nueva Ciudad @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.cities.index') }}"><i class="fa fa-flag-o"></i> Ciudades</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="box box-primary">
    {!! Form::open(array('route' => 'maintainers.cities.store', 'method' => 'POST')) !!}
    <div class="box-body">
        @include('maintainers.cities.partials.fields')
    </div>
    <div class="box-footer">
        <a href="{{ route('maintainers.cities.index') }}">Volver</a>
        <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
    {!! Form::close() !!}
</div>

@stop