@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.css') }}">

@stop

@section('title_header') Crear Nueva Cláusula y Obligación @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.terms-and-obligatories.index') }}"><i class="md-lock-open"></i> Cláusulas y Obligaciones</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.terms-and-obligatories.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.terms-and-obligatories.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.terms-and-obligatories.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.js') }}"></script>

@stop