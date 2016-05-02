@extends('layout.index')

@section('title_header') Listado de Áreas
    <br />
    <a href="{{ route('maintainers.areas.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Área</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Áreas</li>
@stop

@section('content')

    @if ($areas->count())

        @include('maintainers.areas.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Áreas</h3>

    @endif

    {{ $areas->links() }}

@stop