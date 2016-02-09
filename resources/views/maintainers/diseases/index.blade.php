@extends('layout.index')

@section('title_header') Listado de Enfermedades
    <br>
    <a href="{{ route('maintainers.diseases.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nueva Enfermedad</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Enfermedades</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {!! Form::open(['route' => 'maintainers.diseases.index', 'method' => 'GET']) !!}
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

    @if($diseases->count())
        @include('maintainers.diseases.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Enfermedades</h3>
    @endif

    {{ $diseases->links() }}

@stop