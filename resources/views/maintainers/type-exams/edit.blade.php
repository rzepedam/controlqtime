@extends('layout.index')

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.type-exams.index') }}"><i class="fa fa-stethoscope"></i> Exámenes Preocupacionales</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

<div class="panel">

    {{ Form::model($type_exam, array('route' => ['maintainers.type-exams.update', $type_exam], 'method' => 'PUT' )) }}

        <div class="panel-body">

            @include('maintainers.type-exams.partials.fields')

        </div>
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('maintainers.type-exams.index') }}">Volver</a>
                    <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

    {{ Form::close() }}

</div>
<br />
<br />
<br />

    @include('maintainers.type-exams.partials.delete')

@stop

@section('scripts')
    {{ Html::script('me/js/delete.js') }}
@stop
