@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-datepicker.css') }}

@stop

@section('title_header') Editar Vehículo: <span class="text-primary">{{ $vehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('operations.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($vehicle, array('route' => array('operations.vehicles.update', $vehicle), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('operations.vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('operations.vehicles.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('operations.vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/changeMethods/changeTrademarkModel.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.es.min.js') }}
    {{ Html::script('me/js/delete.js') }}
    {{ Html::script('me/js/base/operations/vehicles/base.js') }}

@stop
