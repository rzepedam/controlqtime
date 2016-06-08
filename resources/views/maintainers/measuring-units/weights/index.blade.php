@extends('layout.index')

@section('title_header') Listado de Unidades de Medida para Peso
    <br />
    <a href="{{ route('maintainers.measuring-units.weights.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Unidad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li class="active">Peso</li>
@stop

@section('content')

    @if ($weights->count())

        @include('maintainers.measuring-units.weights.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Unidades de Medida</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers.measuring-units') }}">Volver</a>
            <span class="pull-right">{{ $weights->links() }}</span>
        </div>
    </div>

@stop