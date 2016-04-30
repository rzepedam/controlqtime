@extends('layout.index')

@section('title_header') Listado de Certificaciones
    <br />
    <a href="{{ route('maintainers.type-certifications.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Certificación</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Certificaciones</li>
@stop

@section('content')

    @if (count($type_certifications) > 0)

        @include('maintainers.type-certifications.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Certificaciones</h3>

    @endif

    {{ $type_certifications->links() }}

@stop