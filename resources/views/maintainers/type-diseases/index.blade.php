@extends('layout.index')

@section('title_header') Listado de Enfermedades
    <br />
    <a href="{{ route('maintainers.type-diseases.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Enfermedad</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Enfermedades</li>
@stop

@section('content')

    @if ($type_diseases->count())

        @include('maintainers.type-diseases.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Enfermedades</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_diseases->links() }}</span>
        </div>
    </div>

@stop
