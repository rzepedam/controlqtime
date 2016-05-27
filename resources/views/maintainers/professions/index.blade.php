@extends('layout.index')

@section('title_header') Listado de Profesiones
    <br />
    <a href="{{ route('maintainers.professions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Profesión</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Profesiones</li>
@stop

@section('content')

    @if ($professions->count())

        @include('maintainers.professions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Profesiones</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $professions->links() }}</span>
        </div>
    </div>

@stop