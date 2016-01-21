@extends('layout.index')

@section('title_header') Listado de Especialidades
<br>
<a href="{{ route('maintainers.specialities.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Especialidad</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Especialidades</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.specialities.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($specialities->count())
        @include('maintainers.specialities.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Especialidades</h3>
    @endif

    {{ $specialities->links() }}

@stop