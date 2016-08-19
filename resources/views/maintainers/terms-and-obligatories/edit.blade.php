@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/switchery.css') }}

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

    {{ Html::script('me/js/delete.js') }}
    {{ Html::script('assets/js/switchery.js') }}
    {{ Html::script('me/js/common/config_switchery.js') }}

@stop
