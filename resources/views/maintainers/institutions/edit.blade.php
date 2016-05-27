@extends('layout.index')

@section('title_header') Editar Institución: <span class="text-primary">{{ $institution->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.institutions.index') }}"><i class="fa fa-graduation-cap"></i> Instituciones</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($institution, array('route' => array('maintainers.institutions.update', $institution), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.institutions.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.institutions.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}
        <br />

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.institutions.partials.delete')

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop