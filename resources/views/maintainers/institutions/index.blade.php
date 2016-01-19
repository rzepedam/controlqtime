@extends('layout.index')

@section('title_header') Listado de Instituciones
    <br>
    <a href="{{ route('maintainers.institutions.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Institución</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Instituciones</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.institutions.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($institutions->count())
        @include('maintainers.institutions.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Instituciones</h3>
    @endif

    {{ $institutions->links() }}

@stop

