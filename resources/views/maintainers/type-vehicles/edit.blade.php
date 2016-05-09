@extends('layout.index')

@section('title_header') Editar Tipo de Vehículo: <span class="text-primary">{{ $type_vehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-vehicles.index') }}"><i class="fa fa-subway"></i> Tipos de Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="panel">

        {{ Form::model($type_vehicle, array('route' => array('maintainers.type-vehicles.update', $type_vehicle), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.type-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.type-vehicles.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-vehicles.partials.delete')

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
