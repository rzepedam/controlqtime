@extends('layout.index')

@section('title_header') Listado de Exámenes Preocupacionales
    <br />
    <a href="{{ route('maintainers.type-exams.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Examen Preocupacional</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Exámenes Preocupacionales</li>
@stop

@section('content')

    @if(count($type_exams) > 0)

        @include('maintainers.type-exams.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Exámenes Preocupacionales</h3>

    @endif

    {{ $type_exams->links() }}

@stop