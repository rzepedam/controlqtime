@extends('layout.index')

@section('title_header') Listado de Mutualidades
    <br />
    <a href="{{ route('maintainers.mutualities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Mutualidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Mutualidades</li>
@stop

@section('content')

    @if ($mutualities->count())

        @include('maintainers.mutualities.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Mutualidades</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $mutualities->links() }}</span>
        </div>
    </div>

@stop