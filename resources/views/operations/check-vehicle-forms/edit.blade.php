@extends('layout.index')

@section('title_header') Editar Formulario Chequeo Vehículo : <span class="text-primary">{{ $checkVehicleForm->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('check-vehicle-forms.index') }}"><i class="fa fa-pencil-square-o"></i> Formulario Chequeo Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::model($checkVehicleForm, array('route' => array('check-vehicle-forms.update', $checkVehicleForm), 'method' => 'PUT', 'id' => 'form-submit')) }}

        <div class="panel">
            <div class="panel-body">

                @include('operations.check-vehicle-forms.partials.fields')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('check-vehicle-forms.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/operations/check-vehicle-forms/create-edit-custom-check-vehicle-forms.js') }}"></script>

@stop