@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.specialities.index') }}"><i class="fa fa-wrench"></i> Especialidades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="box box-success">
        {!! Form::model($speciality, array('route' => ['maintainers.specialities.update', $speciality], 'method' => 'PUT' )) !!}
        <div class="box-body">
            @include('maintainers.specialities.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.specialities.index') }}">Volver</a>
            <button type="submit" class="btn btn-success btn-flat btn-lg pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
        </div>
        {!! Form::close() !!}
    </div>
    <br><br><br>
    @include('maintainers.specialities.partials.delete')
@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop
