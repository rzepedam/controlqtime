@extends('layout.index')

@section('title_header') Listado de Instituciones
    <br />
    <a href="{{ route('maintainers.institutions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Institución</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Instituciones</li>
@stop

@section('content')

    @if ($institutions->count())

        @include('maintainers.institutions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Instituciones</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $institutions->links() }}</span>
        </div>
    </div>

@stop