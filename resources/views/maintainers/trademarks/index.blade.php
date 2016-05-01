@extends('layout.index')

@section('title_header') Listado de Marcas
    <br />
    <a href="{{ route('maintainers.trademarks.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Marca</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Marcas</li>
@stop

@section('content')

    @if ($trademarks->count())

        @include('maintainers.trademarks.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Marcas</h3>

    @endif

    {{ $trademarks->links() }}

@stop