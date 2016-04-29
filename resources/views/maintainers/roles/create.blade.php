@extends('layout.index')

@section('title_header') Crear Nuevo Cargo @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.roles.index') }}"><i class="md-seat font-size-18"></i> Cargos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.roles.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.roles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.roles.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop