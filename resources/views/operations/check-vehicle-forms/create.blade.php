@extends('layout.index')

@section('title_header') Crear Nuevo Formulario Chequeo Vehículo @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-cogs"></i> Operaciones</a></li>
    <li><a href="{{ route('check-vehicle-forms.index') }}"><i class="fa fa-files-o"></i> Formulario Chequeo Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'check-vehicle-forms.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel">
            <div class="panel-body">

                @include('operations.check-vehicle-forms.partials.fields')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('check-vehicle-forms.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/operations/check-vehicle-forms/create-edit-custom-check-vehicle-forms.js') }}"></script>

@stop