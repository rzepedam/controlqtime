@extends('layout.index')

@section('title_header') Crear Nueva Mutualidad @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.mutualities.index') }}"><i class="fa fa-ambulance"></i> Mutualidades</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

<div class="panel">

    {{ Form::open(array('route' => 'maintainers.mutualities.store', 'method' => 'POST')) }}

        <div class="panel-body">

            @include('maintainers.mutualities.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.mutualities.index') }}">Volver</a>
                    <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}

</div>

@stop

