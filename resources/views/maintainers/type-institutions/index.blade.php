@extends('layout.index')

@section('title_header') Listado de Tipos de Institución
    <br />
    <a href="{{ route('maintainers.type-institutions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Tipo de Institución</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Tipos de Institución</li>
@stop

@section('content')

    @if ($type_institutions->count())

        @include('maintainers.type-institutions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Tipos de Institución</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_institutions->links() }}</span>
        </div>
    </div>

@stop