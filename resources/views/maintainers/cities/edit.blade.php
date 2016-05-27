@extends('layout.index')

@section('title_header') Editar Ciudad: <span class="text-primary">{{ $city->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.cities.index') }}"><i class="fa fa-flag-o"></i> Ciudades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($city, array('route' => array('maintainers.cities.update', $city), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.cities.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.cities.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.cities.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
