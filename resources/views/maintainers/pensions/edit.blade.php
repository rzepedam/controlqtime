@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.pensions.index') }}"><i class="fa fa-tags"></i> Fondos de Pensiones</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

<div class="panel">
    {{ Form::model($pension, array('route' => ['maintainers.pensions.update', $pension], 'method' => 'PUT' )) }}

        <div class="panel-body">

            @include('maintainers.pensions.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.pensions.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}
</div>
<br />
<br />
<br />

    @include('maintainers.pensions.partials.delete')

@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop