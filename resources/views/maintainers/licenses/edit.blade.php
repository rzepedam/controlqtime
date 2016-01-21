@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.licenses.index') }}"><i class="fa fa-star"></i> Licencias Profesionales</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="box box-success">
        {!! Form::model($license, array('route' => ['maintainers.licenses.update', $license], 'method' => 'PUT' )) !!}
        <div class="box-body">
            @include('maintainers.licenses.partials.fields')
        </div>
        <div class="box-footer">
            <a href="{{ route('maintainers.licenses.index') }}">Volver</a>
            <button type="submit" class="btn btn-success btn-flat btn-lg pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
        </div>
        {!! Form::close() !!}
    </div>
    <br><br><br>
    @include('maintainers.licenses.partials.delete')
@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop
