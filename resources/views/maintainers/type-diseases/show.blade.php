@extends('layout.index')

@section('title_header') Detalle Registro : <span class="text-primary">{{ $type_disease->name }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-diseases.index') }}"><i class="fa fa-wheelchair"></i> Enfermedades</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="panel panel-bordered">
        <div class="panel-body">

            {{ $type_disease->description }}

        </div>
        <div class="panel-footer">

            <a href="{{ route('maintainers.type-diseases.index') }}">Volver</a>

        </div>
    </div>

@stop