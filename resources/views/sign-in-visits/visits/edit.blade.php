@extends('layout.index')

@section('title_header') Editar Visita @stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/sign-in-visits/visits/create-edit.css') }}">
@stop

@section('title_header') Editar Visita: <span class="text-primary">{{ $visit->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('sign-in-visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::model($visit, array('route' => ['visits.update', $visit], 'method' => 'PUT', 'id' => 'form-submit')) }}

        <div class="panel">
            <div class="panel-body">

                @include('sign-in-visits.visits.partials.fields')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('visits.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
        </div>
        
    {{ Form::close() }}

    <br />
    <br />
    <br />

    @include('sign-in-visits.visits.partials.delete')
    <br />

@stop

@section('scripts')
    <script src="{{ mix('/js/create-edit-common.js') }}"></script>
    <script src="{{ mix('/js/sign-in-visits/visits/create-edit.js') }}"></script>
    <script src="{{ mix('js/edit-common.js') }}"></script>
@stop
