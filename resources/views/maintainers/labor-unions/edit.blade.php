@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/create-edit-common.css') }}">

@stop

@section('title_header') Editar Sindicato: <span class="text-primary">{{ $labor_union->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('labor-unions.index') }}"><i class="fa fa-users"></i> Sindicato de Trabajadores</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($labor_union, array('route' => array('labor-unions.update', $labor_union), 'method' => 'PUT', 'id' => 'form-submit')) }}

            {{ Form::hidden('entity', 'laborUnion', ['id' => 'entity'])  }}
            <div class="panel-body">

                @include('maintainers.labor-unions.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('labor-unions.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.labor-unions.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
