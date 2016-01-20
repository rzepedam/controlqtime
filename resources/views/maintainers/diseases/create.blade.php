@extends('layout.index')

@section('title_header') Crear Nueva Enfermedad @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.diseases.index') }}"><i class="fa fa-bed"></i> Enfermedades</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="box box-primary">
        {!! Form::open(array('route' => 'maintainers.diseases.store', 'method' => 'POST')) !!}
        <div class="box-body">
            @include('maintainers.diseases.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.diseases.index') }}">Volver</a>
            <button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
        {!! Form::close() !!}
    </div>

@stop