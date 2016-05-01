@extends('layout.index')

@section('title_header') Listado de Fondos de Pensiones
    <br />
    <a href="{{ route('maintainers.pensions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Fondo de Pensión</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Fondos de Pensiones</li>
@stop

@section('content')

    @if ($pensions->count())

        @include('maintainers.pensions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Fondos de Pensiones</h3>

    @endif

    {{ $pensions->links() }}

@stop