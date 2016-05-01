@extends('layout.index')

@section('title_header') Listado de Países
    <br />
    <a href="{{ route('maintainers.countries.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo País</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Países</li>
@stop

@section('content')

    @if ($countries->count())

        @include('maintainers.countries.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Países</h3>

    @endif

    {{ $countries->links() }}

@stop