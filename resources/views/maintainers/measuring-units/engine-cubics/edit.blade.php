@extends('layout.index')

@section('title_header') Editar Unidad de Medida: <span class="text-primary">{{ $engine_cubic->id }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li><a href="{{ route('maintainers.measuring-units.engine-cubics.index') }}"><i class="fa fa-tachometer"></i> Cilindraje Motor</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($engine_cubic, array('route' => array('maintainers.measuring-units.engine-cubics.update', $engine_cubic), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.measuring-units.engine-cubics.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.measuring-units.engine-cubics.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.measuring-units.engine-cubics.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
