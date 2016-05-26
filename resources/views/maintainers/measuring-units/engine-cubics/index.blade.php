@extends('layout.index')

@section('title_header') Listado de Unidades de Medida para Cilindraje Motor
    <br />
    <a href="{{ route('maintainers.measuring-units.engine-cubics.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Unidad</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li class="active">Cilindraje Motor</li>
@stop

@section('content')

    @if ($engine_cubics->count())

        @include('maintainers.measuring-units.engine-cubics.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Unidades de Medida</h3>

    @endif

    {{ $engine_cubics->links() }}

@stop