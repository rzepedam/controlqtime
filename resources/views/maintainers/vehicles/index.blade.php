@extends('layout.index')

@section('title_header') Listado de Vehículos
    <br />
    <a href="{{ route('maintainers.vehicles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Vehículo</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Vehículos</li>
@stop

@section('content')

    @if ($vehicles->count())

        @include('maintainers.vehicles.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Vehículos</h3>

    @endif

    {{ $vehicles->links() }}

@stop