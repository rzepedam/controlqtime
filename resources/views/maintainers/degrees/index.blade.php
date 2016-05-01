@extends('layout.index')

@section('title_header') Listado de Grados Académicos
    <br />
    <a href="{{ route('maintainers.degrees.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Grado Académico</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Grados Académicos</li>
@stop

@section('content')

    @if ($degrees->count())

        @include('maintainers.degrees.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Grados Académicos</h3>

    @endif

    {{ $degrees->links() }}

@stop