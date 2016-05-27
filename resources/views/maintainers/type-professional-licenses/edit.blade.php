@extends('layout.index')

@section('title_header') Editar Licencia Profesional: <span class="text-primary">{{ $type_professional_license->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-professional-licenses.index') }}"><i class="fa fa-bookmark"></i> Licencias Profesionales</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($type_professional_license, array('route' => array('maintainers.type-professional-licenses.update', $type_professional_license), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.type-professional-licenses.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.type-professional-licenses.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-professional-licenses.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
