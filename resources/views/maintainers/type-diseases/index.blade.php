@extends('layout.index')

@section('title_header') Listado de Enfermedades
    <br />
    <a href="{{ route('maintainers.type-diseases.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Enfermedad</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Enfermedades</li>
@stop

@section('content')

    @if(count($type_diseases) > 0)

        @include('maintainers.type-diseases.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Enfermedades</h3>

    @endif

    {{ $type_diseases->links() }}

@stop