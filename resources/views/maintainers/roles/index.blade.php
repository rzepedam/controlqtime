@extends('layout.index')

@section('title_header') Listado de Cargos
    <br />
    <a href="{{ route('maintainers.roles.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Cargo</a>
@stop

@section('breadcumb')

    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Cargos</li>

@stop

@section('content')

    @if ($roles->count())

        @include('maintainers.roles.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Cargos</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('maintainers') }}">Volver</a>
            <span class="pull-right">{{ $roles->links() }}</span>
        </div>
    </div>

@stop