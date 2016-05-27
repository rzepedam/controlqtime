@extends('layout.index')

@section('title_header') Listado de Recorridos
    <br />
    <a href="{{ route('maintainers.routes.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Recorrido</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Recorridos</li>
@stop

@section('content')

    @if ($routes->count())

        @include('maintainers.routes.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Recorridos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $routes->links() }}</span>
        </div>
    </div>

@stop