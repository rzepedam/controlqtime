@extends('layout.index')

@section('title_header') Listado de Vehículos
    <br />
    <a href="{{ route('operations.vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li class="active">Vehículos</li>
@stop

@section('content')

    @if ($vehicles->count())

        @include('operations.vehicles.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Vehículos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('operations') }}">Volver</a>
            <span class="pull-right">{{ $vehicles->links() }}</span>
        </div>
    </div>

@stop