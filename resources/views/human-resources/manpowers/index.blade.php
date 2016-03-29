@extends('layout.index')

@section('title_header') Listado de Trabajadores
    <br>
    <a href="{{ route('human-resources.manpowers.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-users"></i> RR.HH</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('content')

    @if($manpowers->count())
        @include('human-resources.manpowers.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Trabajadores</h3>
    @endif

    {{ $manpowers->links() }}

@stop