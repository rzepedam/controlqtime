@extends('layout.index')

@section('title_header') Listado de Patentescos Familiares
    <br>
    <a href="{{ route('maintainers.kins.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Parentesco</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Parentescos</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.kins.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($kins->count())
        @include('maintainers.kins.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Parentescos Familiares</h3>
    @endif

    {{ $kins->links() }}

@stop