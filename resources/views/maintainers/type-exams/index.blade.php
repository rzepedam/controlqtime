@extends('layout.index')

@section('title_header') Listado de Exámenes Preocupacionales
    <br />
    <a href="{{ route('maintainers.type-exams.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Examen Preocupacional</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Exámenes Preocupacionales</li>
@stop

@section('content')

    @if ($type_exams->count())

        @include('maintainers.type-exams.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Exámenes Preocupacionales</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $type_exams->links() }}</span>
        </div>
    </div>

@stop