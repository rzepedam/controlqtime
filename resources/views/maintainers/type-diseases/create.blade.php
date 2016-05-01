@extends('layout.index')

@section('title_header') Crear Nueva Enfermedad @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-diseases.index') }}"><i class="fa fa-bed"></i> Enfermedades</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="panel">

    {{ Form::open(array('route' => 'maintainers.type-diseases.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('maintainers.type-diseases.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.type-diseases.index') }}">Volver</a>
                    <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}

</div>

@stop