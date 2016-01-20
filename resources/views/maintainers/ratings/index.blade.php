@extends('layout.index')

@section('title_header') Listado de Cargos
    <br>
    <a href="{{ route('maintainers.ratings.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Cargo</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Cargos</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.ratings.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($ratings->count())
        @include('maintainers.ratings.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Cargos</h3>
    @endif

    {{ $ratings->links() }}

@stop