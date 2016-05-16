@extends('layout.index')

@section('title_header') Listado de Tipos de Empresa
    <br />
    <a href="{{ route('maintainers.type-companies.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Tipo de Empresa</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Tipos de Empresa</li>
@stop

@section('content')

    @if ($type_companies->count())

        @include('maintainers.type-companies.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Tipos de Empresa</h3>

    @endif

    {{ $type_companies->links() }}

@stop