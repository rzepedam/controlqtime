@extends('layout.index')

@section('title_header') Listado de Modelo de Vehículos
    <br />
    <a href="{{ route('maintainers.model-vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Modelo de Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Modelo Vehículos</li>
@stop

@section('content')

    @if ($model_vehicles->count())

        @include('maintainers.model-vehicles.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Modelo de Vehículos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $model_vehicles->links() }}</span>
        </div>
    </div>

@stop