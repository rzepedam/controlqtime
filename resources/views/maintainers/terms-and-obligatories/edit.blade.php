@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.css') }}">

@stop

@section('title_header') Editar Cláusula y Obligación: <span class="text-primary">{{ $termAndObligatory->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.terms-and-obligatories.index') }}"><i class="md-lock-open"></i> Cláusulas y Obligaciones</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($termAndObligatory, array('route' => array('maintainers.terms-and-obligatories.update', $termAndObligatory), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.terms-and-obligatories.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.terms-and-obligatories.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.terms-and-obligatories.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/terms-and-obligatories/create-edit-custom-terms-and-obligatories.js') }}"></script>

@stop
