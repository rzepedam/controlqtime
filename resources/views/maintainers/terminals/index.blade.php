@extends('layout.index')

@section('title_header') Listado de Terminales
    <br />
    <a href="{{ route('maintainers.terminals.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Terminal</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Terminales</li>
@stop

@section('content')

    @if ($terminals->count())

        @include('maintainers.terminals.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Terminales</h3>

    @endif

    {{ $terminals->links() }}

@stop