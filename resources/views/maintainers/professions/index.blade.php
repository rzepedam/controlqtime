@extends('layout.index')

@section('title_header') Listado de Profesiones
    <br>
    <a href="{{ route('maintainers.professions.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Profesión</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Profesiones</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.professions.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($professions->count())
        @include('maintainers.professions.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Profesiones</h3>
    @endif

    {{ $professions->links() }}

@stop