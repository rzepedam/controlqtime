@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-institutions.index') }}"><i class="fa fa-university"></i> Tipos de Institución</a></li>
    <li class="active">Editar</li>
@stop

@section('content')
    <div class="box box-success">
        {!! Form::model($type_institution, array('route' => ['maintainers.type-institutions.update', $type_institution], 'method' => 'PUT' )) !!}
        <div class="box-body">
            @include('maintainers.type-institutions.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.type-institutions.index') }}">Volver</a>
            <button type="submit" class="btn btn-success btn-flat btn-lg pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
        </div>
        {!! Form::close() !!}
    </div>
    <br><br><br>
    @include('maintainers.type-institutions.partials.delete')
@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop