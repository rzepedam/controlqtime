@extends('layout.index')

@section('title_header') Crear Nueva Certificación @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-certifications.index') }}"><i class="md-badge-check"></i> Certificaciones</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="panel">

    {{ Form::open(array('route' => 'maintainers.type-certifications.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('maintainers.type-certifications.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.type-certifications.index') }}">Volver</a>
                    <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}

</div>

@stop

@section('scripts')