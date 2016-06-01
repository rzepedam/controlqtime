@extends('layout.index')

@section('title_header') Listado de Representante Empresas
    <br />
    <a href="{{ route('maintainers.type-representatives.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Representante</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Representante Empresas</li>
@stop

@section('content')

    @if ($type_represents->count())

        @include('maintainers.type-representatives.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Representante de Empresas</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_represents->links() }}</span>
        </div>
    </div>

@stop