@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.trademarks.index') }}"><i class="fa fa-trademark"></i> Marcas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="panel">
        {{ Form::model($trademark, array('route' => ['maintainers.trademarks.update', $trademark], 'method' => 'PUT' )) }}

        <div class="panel-body">

            @include('maintainers.trademarks.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.trademarks.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>
    <br />
    <br />
    <br />

    @include('maintainers.trademarks.partials.delete')

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
