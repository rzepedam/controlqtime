@extends('layout.index')

@section('title_header') Listado de Trabajadores
    <br>
    <a href="{{ route('human-resources.manpowers.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
@stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {!! Form::open(['route' => 'human-resources.manpowers.index', 'method' => 'GET']) !!}
        <div class="input-group input-group-sm" style="width: 250px;">
            {{ Form::text('table_search', null, ['class' => 'form-control pull-right', 'placeholder' => 'Buscar...', 'autofocus']) }}
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('content')

    @if($manpowers->count())
        @include('human-resources.manpowers.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Trabajadores</h3>
    @endif

    {{ $manpowers->links() }}

@stop