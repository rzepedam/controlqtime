@extends('layout.index')

@section('title_header') Editar Marca: <span class="text-primary">{{ $trademark->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.trademarks.index') }}"><i class="fa fa-trademark"></i> Marca Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($trademark, array('route' => array('maintainers.trademarks.update', $trademark), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.trademarks.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.trademarks.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.trademarks.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
