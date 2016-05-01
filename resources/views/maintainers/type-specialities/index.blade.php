@extends('layout.index')

@section('title_header') Listado de Especialidades
    <br />
    <a href="{{ route('maintainers.type-specialities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Especialidad</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Especialidades</li>
@stop

@section('content')

    @if ($type_specialities->count())

        @include('maintainers.type-specialities.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Especialidades</h3>

    @endif

    {{ $type_specialities->links() }}

@stop