@extends('layout.index')

@section('title_header') Listado de Sindicatos
    <br />
    <a href="{{ route('maintainers.labor-unions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Sindicato</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Sindicatos</li>
@stop

@section('content')

    @if ($labor_unions->count())

        @include('maintainers.labor-unions.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Sindicatos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $labor_unions->links() }}</span>
        </div>
    </div>

@stop