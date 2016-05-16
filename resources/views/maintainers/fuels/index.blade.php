@extends('layout.index')

@section('title_header') Listado de Combustibles
    <br />
    <a href="{{ route('maintainers.fuels.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Combustible</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Combustibles</li>
@stop

@section('content')

    @if ($fuels->count())

        @include('maintainers.fuels.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Combustibles</h3>

    @endif

    {{ $fuels->links() }}

@stop