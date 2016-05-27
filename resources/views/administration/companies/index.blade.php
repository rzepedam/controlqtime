@extends('layout.index')

@section('title_header') Listado de Empresas
    <br />
    <a href="{{ route('administration.companies.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Empresa</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li class="active">Empresas</li>
@stop

@section('content')

    @if ($companies->count())

        @include('administration.companies.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Empresas</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('administration') }}">Volver</a>
            <span class="pull-right">{{ $companies->links() }}</span>
        </div>
    </div>


@stop


