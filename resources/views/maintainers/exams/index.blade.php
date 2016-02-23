@extends('layout.index')

@section('title_header') Listado de Exámenes Preocupacionales
    <br>
    <a href="{{ route('maintainers.exams.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo Examen Preocupacional</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Exámenes Preocupacionales</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {!! Form::open(['route' => 'maintainers.exams.index', 'method' => 'GET']) !!}
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

    @if($exams->count())
        @include('maintainers.exams.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Exámenes Preocupacionales</h3>
    @endif

    {{ $exams->links() }}

@stop