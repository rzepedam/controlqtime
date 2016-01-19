@extends('layout.index')

@section('title_header') Listado de Países
    <br>
    <a href="{{ route('maintainers.countries.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo País</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Países</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.countries.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($countries->count())
        @include('maintainers.countries.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Países</h3>
    @endif

    {{ $countries->links() }}

@stop