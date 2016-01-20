@extends('layout.index')

@section('title_header') Listado de Enfermedades
    <br>
    <a href="{{ route('maintainers.diseases.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Enfermedad</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Enfermedades</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.diseases.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($diseases->count())
        @include('maintainers.diseases.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Enfermedades</h3>
    @endif

    {{ $diseases->links() }}

@stop