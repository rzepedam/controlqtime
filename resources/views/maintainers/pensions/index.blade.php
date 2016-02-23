@extends('layout.index')

@section('title_header') Listado de Fondos de Pensiones
    <br>
    <a href="{{ route('maintainers.pensions.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Fondo de Pensión</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Fondos de Pensiones</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {!! Form::open(['route' => 'maintainers.pensions.index', 'method' => 'GET']) !!}
        <div class="input-group input-group-sm" style="width: 250px;">
            {{ Form::text('table_search', null, ['class' => 'form-control pull-right', 'placeholder' => 'Buscar...', 'autofocus']) }}
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('content')

    @if($pensions->count())
        @include('maintainers.pensions.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Fondos de Pensiones</h3>
    @endif

    {{ $pensions->links() }}

@stop