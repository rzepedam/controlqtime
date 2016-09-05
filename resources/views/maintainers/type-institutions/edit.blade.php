@extends('layout.index')

@section('title_header') Editar Tipo Institución: <span class="text-primary">{{ $type_institution->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-institutions.index') }}"><i class="fa fa-university"></i> Tipos de Instituciones</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($type_institution, array('route' => array('maintainers.type-institutions.update', $type_institution), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.type-institutions.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.type-institutions.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-institutions.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop