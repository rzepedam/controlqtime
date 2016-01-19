@extends('layout.index')

@section('title_header') Listado de Tipos de Institución
    <br>
    <a href="{{ route('maintainers.type-institutions.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Tipo de Institución</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Tipos de Institución</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.type-institutions.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($type_institutions->count())
        @include('maintainers.type-institutions.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Tipos de Institución</h3>
    @endif

    {{ $type_institutions->links() }}

@stop
