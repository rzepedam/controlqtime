@extends('layout.index')

@section('title_header') Listado de Certificaciones
    <br>
    <a href="{{ route('maintainers.certifications.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Certificación</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Certificaciones</li>
@stop

@section('form_search')
    {!! Form::open(['route' => 'maintainers.certifications.index', 'method' => 'GET']) !!}
@stop

@section('content')

    @if($certifications->count())
        @include('maintainers.certifications.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Certificaciones</h3>
    @endif

    {{ $certifications->links() }}

@stop