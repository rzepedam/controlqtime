@extends('layout.index')

@section('title_header') Listado de Empresas
    <br />
    <a href="{{ route('maintainers.companies.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Empresa</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Empresas</li>
@stop

@section('content')

    @if ($companies->count())

        @include('maintainers.companies.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Empresas</h3>

    @endif

    {{ $companies->links() }}

@stop