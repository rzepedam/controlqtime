@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.areas.index') }}"><i class="fa fa-sitemap"></i> Áreas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="panel">

        {{ Form::model($area, array('route' => array('maintainers.areas.update', $area), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.areas.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.areas.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>


        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.areas.partials.delete')

@stop

@section('scripts')

    {{ Html::script('me/js/delete.js') }}

@stop
