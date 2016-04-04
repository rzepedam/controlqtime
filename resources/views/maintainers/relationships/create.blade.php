@extends('layout.index')

@section('title_header') Crear Nuevo Parentesco Familiar @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.professional_licenses.index') }}"><i class="fa fa-child"></i> Parentescos Familiares</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="panel">
    {{ Form::open(array('route' => 'maintainers.professional_licenses.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('maintainers.relationships.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.professional_licenses.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}
</div>

@stop

