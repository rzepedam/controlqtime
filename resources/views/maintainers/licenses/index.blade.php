@extends('layout.index')

@section('title_header') Listado de Licencias Profesionales
    <br>
    <a href="{{ route('maintainers.licenses.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Licencia</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Licencias Profesionales</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.licenses.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($licenses->count())
        @include('maintainers.licenses.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Licencias Profesionales</h3>
    @endif

    {{ $licenses->links() }}

@stop