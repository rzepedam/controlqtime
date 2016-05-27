@extends('layout.index')

@section('title_header') Editar Especialidad: <span class="text-primary">{{ $type_speciality->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-specialities.index') }}"><i class="fa fa-wrench"></i> Especialidades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($type_speciality, array('route' => array('maintainers.type-specialities.update', $type_speciality), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.type-specialities.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.type-specialities.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-specialities.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
