@extends('layout.index')

@section('title_header') Listado de Profesiones
    <br />
    <a href="{{ route('maintainers.professions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Profesión</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Profesiones</li>
@stop

@section('content')

    @if ($professions->count())

        @include('maintainers.professions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Profesiones</h3>

    @endif

    {{ $professions->links() }}

@stop