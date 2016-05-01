@extends('layout.index')

@section('title_header') Listado de Previsiones
    <br />
    <a href="{{ route('maintainers.forecasts.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Previsión</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Previsiones</li>
@stop

@section('content')

    @if ($forecasts->count())

        @include('maintainers.forecasts.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Previsiones</h3>

    @endif

    {{ $forecasts->links() }}

@stop