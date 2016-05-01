@extends('layout.index')

@section('title_header') Listado de Discapacidades
    <br />
    <a href="{{ route('maintainers.type-disabilities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Discapacidad</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Discapacidades</li>
@stop

@section('content')

    @if ($type_disabilities->count())

        @include('maintainers.type-disabilities.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Discapacidades</h3>

    @endif

    {{ $type_disabilities->links() }}

@stop