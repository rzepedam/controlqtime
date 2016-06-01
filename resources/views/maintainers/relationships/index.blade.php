@extends('layout.index')

@section('title_header') Listado de Relación-Parentesco
    <br />
    <a href="{{ route('maintainers.relationships.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Relación Familiar</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Relaciones Familiares</li>
@stop

@section('content')

    @if ($relationships->count())

        @include('maintainers.relationships.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Relaciones Familiares</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $relationships->links() }}</span>
        </div>
    </div>

@stop