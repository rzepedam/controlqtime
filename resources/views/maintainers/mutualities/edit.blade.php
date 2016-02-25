@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.mutualities.index') }}"><i class="fa fa-ambulance"></i> Mutualidades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="box box-success">
        {!! Form::model($mutuality, array('route' => ['maintainers.mutualities.update', $mutuality], 'method' => 'PUT' )) !!}
            <div class="box-body">
                @include('maintainers.mutualities.partials.fields')
            </div>
            <div class="box-footer">
                <a href="{{ route('maintainers.mutualities.index') }}">Volver</a>
                <button type="submit" class="btn btn-success btn-flat btn-lg pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
        {!! Form::close() !!}
    </div>
    <br><br><br>
    @include('maintainers.mutualities.partials.delete')
@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop