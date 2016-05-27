@extends('layout.index')

@section('title_header') Listado de Licencias Profesionales
    <br />
    <a href="{{ route('maintainers.type-professional-licenses.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Licencia Profesional</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Licencias Profesionales</li>
@stop

@section('content')

    @if ($type_professional_licenses->count())

        @include('maintainers.type-professional-licenses.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Licencias Profesionales</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_professional_licenses->links() }}</span>
        </div>
    </div>

@stop