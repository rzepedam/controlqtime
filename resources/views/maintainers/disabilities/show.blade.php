@extends('layout.index')

@section('title_header') Detalle Registro : <span class="text-primary">{{ $disability->name }}</span> @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.disabilities.index') }}"><i class="fa fa-wheelchair"></i> Discapacidades</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="panel panel-bordered">
        <div class="panel-body">

            {{ $disability->description }}

        </div>
        <div class="panel-footer">

            <a href="{{ route('maintainers.disabilities.index') }}">Volver</a>

        </div>
    </div>

@stop