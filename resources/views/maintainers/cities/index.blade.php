@extends('layout.index')

@section('title_header') Listado de Ciudades
    <br />
    <a href="{{ route('maintainers.cities.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Ciudad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Ciudades</li>
@stop

@section('content')

    @if ($cities->count())

        @include('maintainers.cities.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Ciudades</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $cities->links() }}</span>
        </div>
    </div>

@stop