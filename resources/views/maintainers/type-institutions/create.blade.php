@extends('layout.index')

@section('title_header') Crear Nuevo Tipo de Institución @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-institutions.index') }}"><i class="fa fa-university"></i> Tipos de Institución</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="panel">
    {{ Form::open(array('route' => 'maintainers.type-institutions.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('maintainers.type-institutions.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.type-institutions.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}
</div>

@stop