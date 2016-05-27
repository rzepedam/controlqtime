@extends('layout.index')

@section('title_header') Listado de Grados Académicos
    <br />
    <a href="{{ route('maintainers.degrees.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Grado Académico</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Grados Académicos</li>
@stop

@section('content')

    @if ($degrees->count())

        @include('maintainers.degrees.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Grados Académicos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $degrees->links() }}</span>
        </div>
    </div>

@stop