@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="panel">
        {{ Form::model($vehicle, array('route' => ['maintainers.vehicles.update', $vehicle], 'method' => 'PUT' )) }}

        <div class="panel-body">

            @include('maintainers.vehicles.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.vehicles.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>
    <br />
    <br />
    <br />

    @include('maintainers.vehicles.partials.delete')

@stop

@section('scripts')

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/delete.js') }}
    {{ Html::script('me/js/changeMethods/changeTrademarkModel.js') }}

@stop
