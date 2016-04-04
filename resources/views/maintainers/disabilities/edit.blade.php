@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.disabilities.index') }}"><i class="fa fa-wheelchair"></i> Discapacidades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

<div class="panel">
    {{ Form::model($disability, array('route' => ['maintainers.disabilities.update', $disability], 'method' => 'PUT' )) }}

        <div class="panel-body">

            @include('maintainers.disabilities.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.disabilities.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}
</div>
<br />
<br />
<br />

    @include('maintainers.disabilities.partials.delete')

@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop