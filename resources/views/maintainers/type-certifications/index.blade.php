@extends('layout.index')

@section('title_header') Listado de Certificaciones
    <br />
    <a href="{{ route('maintainers.type-certifications.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Certificación</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Certificaciones</li>
@stop

@section('content')

    @if ($type_certifications->count())

        @include('maintainers.type-certifications.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Certificaciones</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_certifications->links() }}</span>
        </div>
    </div>

@stop