@extends('layout.index')

@section('title_header') Listado de Marcas de Vehículos
    <br />
    <a href="{{ route('maintainers.trademarks.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Marca</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Marca Vehículos</li>
@stop

@section('content')

    @if ($trademarks->count())

        @include('maintainers.trademarks.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Marcas</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $trademarks->links() }}</span>
        </div>
    </div>

@stop