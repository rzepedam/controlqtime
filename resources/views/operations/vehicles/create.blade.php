@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/operations/vehicles/create-edit-custom-vehicles.css') }}">

@stop

@section('title_header') Crear Nuevo Vehículo @stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'vehicles.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-bus text-primary" aria-hidden="true"></i> Información del Vehículo</h3>
            </div>
            <div class="panel-body">
                <span class="content_info_vehicle">

                    @include('operations.vehicles.partials.fields.info_vehicle')

                </span>
            </div>
            <br />
        </div>
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="icon fa fa-folder-open text-warning" aria-hidden="true"></i> Información de Documentación</h3>
            </div>
            <div class="panel-body">

                @include('operations.vehicles.partials.fields.info_documentation')

            </div>
            <br />
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('vehicles.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/operations/vehicles/create-edit-custom-vehicles.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $(document).on('change', '#type_vehicle_id', function () {

                var selected = $(this).find('option:selected').text();

                switch (selected)
                {
                    case 'Auto':
                        var content = '<div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("type_vehicle_id", "Tipo de Vehículo", ["class"=> "control-label"])}}{{Form::select("type_vehicle_id", $typeVehicles, 1, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("trademark_id", "Marca", ["class"=> "control-label"])}}{{Form::select("trademark_id", $trademarks, Route::is("vehicles.create") ? null : $vehicle->modelVehicle->trademark->id, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("model_vehicle_id", "Modelo", ["class"=> "control-label"])}}{{Form::select("model_vehicle_id", $modelVehicles, null, ["class"=> "form-control"])}}</div></div>{{-- Empresa Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("company_id", "Empresa", ["class"=> "control-label"])}}{{Form::select("company_id", $companies, null, ["class"=> "form-control"])}}</div></div></div><div class="row">{{-- Estado Vehículo Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("state_vehicle_id", "Estado Vehículo", ["class"=> "control-label"])}}{{Form::select("state_vehicle_id", $stateVehicles, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("acquisition_date", "Fecha Adquisición", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("acquisition_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("inscription_date", "Fecha Inscripción", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("inscription_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("color", "Color", ["class"=> "control-label"])}}{{Form::text("color", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->color, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "30"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("year", "Año", ["class"=> "control-label"])}}{{Form::selectYear("year", date("Y"), date("Y") - 20, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("fuel_id", "Combustible", ["class"=> "control-label"])}}{{Form::select("fuel_id", $fuels, Route::is("vehicles.create") ? null : $vehicle->detailVehicle->fuel->id, ["class"=> "form-control"])}}</div></div>{{-- Patente Text Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("patent", "Patente", ["class"=> "control-label"])}}{{Form::text("patent", null, ["class"=> "form-control text-center", "data-plugin"=> "maxlength", "maxlength"=> "6"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("num_chasis", "Nº Chasis o VIN", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>{{Form::text("num_chasis", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_chasis, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "17"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("num_motor", "Nº Motor", ["class"=> "control-label"])}}{{Form::text("num_motor", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_motor, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "12"])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("km", "Kilometraje", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>{{Form::text("km", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->km, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("engine_cubic", "Cilindraje Motor", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("engine_cubic", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->engine_cubic, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""] )}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("weight", "Peso", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("weight", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->weight, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div></div><div class="row">{{-- Tag Text Field --}}<div class="col-md-5"> <div class="form-group">{{Form::label("tag", "Tag")}}{{Form::text("tag", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->tag, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "25"])}}</div></div><div class="col-md-5"> <div class="form-group">{{Form::label("code", "Cód. Interno", ["class"=> "control-label"])}}{{Form::text("code", null, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "20"])}}</div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("obs", "Observación", ["class"=> "control-label"])}}{{Form::textarea("obs", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->obs, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div>';

                        break;

                    case 'Bus':
                        var content = '<div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("type_vehicle_id", "Tipo de Vehículo", ["class"=> "control-label"])}}{{Form::select("type_vehicle_id", $typeVehicles, 2, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("trademark_id", "Marca", ["class"=> "control-label"])}}{{Form::select("trademark_id", $trademarks, Route::is("vehicles.create") ? null : $vehicle->modelVehicle->trademark->id, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("model_vehicle_id", "Modelo", ["class"=> "control-label"])}}{{Form::select("model_vehicle_id", $modelVehicles, null, ["class"=> "form-control"])}}</div></div>{{-- Carrocería Text Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("carr", "Carrocería")}}{{Form::text("carr", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->detailBus->carr, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "20"])}}</div></div></div><div class="row">{{-- Empresa Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("company_id", "Empresa", ["class"=> "control-label"])}}{{Form::select("company_id", $companies, null, ["class"=> "form-control"])}}</div></div>{{-- Estado Vehículo Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("state_vehicle_id", "Estado Vehículo", ["class"=> "control-label"])}}{{Form::select("state_vehicle_id", $stateVehicles, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("acquisition_date", "Fecha Adquisición", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("acquisition_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("inscription_date", "Fecha Inscripción", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("inscription_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("color", "Color", ["class"=> "control-label"])}}{{Form::text("color", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->color, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "30"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("year", "Año", ["class"=> "control-label"])}}{{Form::selectYear("year", date("Y"), date("Y") - 20, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("fuel_id", "Combustible", ["class"=> "control-label"])}}{{Form::select("fuel_id", $fuels, Route::is("vehicles.create") ? null : $vehicle->detailVehicle->fuel->id, ["class"=> "form-control"])}}</div></div>{{-- Patente Text Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("patent", "Patente", ["class"=> "control-label"])}}{{Form::text("patent", null, ["class"=> "form-control text-center", "data-plugin"=> "maxlength", "maxlength"=> "6"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("num_chasis", "Nº Chasis o VIN", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>{{Form::text("num_chasis", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_chasis, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "17"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("num_motor", "Nº Motor", ["class"=> "control-label"])}}{{Form::text("num_motor", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_motor, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "12"])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("km", "Kilometraje", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>{{Form::text("km", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->km, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("engine_cubic", "Cilindraje Motor", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("engine_cubic", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->engine_cubic, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""] )}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("weight", "Peso", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("weight", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->weight, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div></div><div class="row">{{-- Nº Plazas Text Field --}}<div class="col-md-2"> <div class="form-group">{{Form::label("num_plazas", "Nº Plazas")}}{{Form::text("num_plazas", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->detailBus->num_plazas, ["class"=> "form-control text-center", "data-plugin"=> "maxlength", "maxlength"=> "3"])}}</div></div>{{-- Tag Text Field --}}<div class="col-md-5"> <div class="form-group">{{Form::label("tag", "Tag")}}{{Form::text("tag", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->tag, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "25"])}}</div></div><div class="col-md-5"> <div class="form-group">{{Form::label("code", "Cód. Interno", ["class"=> "control-label"])}}{{Form::text("code", null, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "20"])}}</div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("obs", "Observación", ["class"=> "control-label"])}}{{Form::textarea("obs", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->obs, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div>';

                        break;

                    case 'Moto':
                        var content = '<div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("type_vehicle_id", "Tipo de Vehículo", ["class"=> "control-label"])}}{{Form::select("type_vehicle_id", $typeVehicles, 3, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("trademark_id", "Marca", ["class"=> "control-label"])}}{{Form::select("trademark_id", $trademarks, Route::is("vehicles.create") ? null : $vehicle->modelVehicle->trademark->id, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("model_vehicle_id", "Modelo", ["class"=> "control-label"])}}{{Form::select("model_vehicle_id", $modelVehicles, null, ["class"=> "form-control"])}}</div></div>{{-- Empresa Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("company_id", "Empresa", ["class"=> "control-label"])}}{{Form::select("company_id", $companies, null, ["class"=> "form-control"])}}</div></div></div><div class="row">{{-- Estado Vehículo Select Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("state_vehicle_id", "Estado Vehículo", ["class"=> "control-label"])}}{{Form::select("state_vehicle_id", $stateVehicles, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("acquisition_date", "Fecha Adquisición", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("acquisition_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("inscription_date", "Fecha Inscripción", ["class"=> "control-label"])}}<div class="input-group date" data-plugin="datepicker" data-end-date="{{date("d-m-Y")}}"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("inscription_date", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("color", "Color", ["class"=> "control-label"])}}{{Form::text("color", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->color, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "30"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("year", "Año", ["class"=> "control-label"])}}{{Form::selectYear("year", date("Y"), date("Y") - 20, null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("fuel_id", "Combustible", ["class"=> "control-label"])}}{{Form::select("fuel_id", $fuels, Route::is("vehicles.create") ? null : $vehicle->detailVehicle->fuel->id, ["class"=> "form-control"])}}</div></div>{{-- Patente Text Field --}}<div class="col-md-3"> <div class="form-group">{{Form::label("patent", "Patente", ["class"=> "control-label"])}}{{Form::text("patent", null, ["class"=> "form-control text-center", "data-plugin"=> "maxlength", "maxlength"=> "6"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("num_chasis", "Nº Chasis o VIN", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>{{Form::text("num_chasis", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_chasis, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "17"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("num_motor", "Nº Motor", ["class"=> "control-label"])}}{{Form::text("num_motor", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->num_motor, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "12"])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("km", "Kilometraje", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>{{Form::text("km", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->km, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("engine_cubic", "Cilindraje Motor", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("engine_cubic", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->engine_cubic, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""] )}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("weight", "Peso", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>{{Form::text("weight", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->weight, ["class"=> "form-control text-center decimalNumber", "data-plugin"=> "autoNumeric", "data-a-sign"=> ""])}}</div></div></div><div class="row">{{-- Tag Text Field --}}<div class="col-md-5"> <div class="form-group">{{Form::label("tag", "Tag")}}{{Form::text("tag", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->tag, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "25"])}}</div></div><div class="col-md-5"> <div class="form-group">{{Form::label("code", "Cód. Interno", ["class"=> "control-label"])}}{{Form::text("code", null, ["class"=> "form-control", "data-plugin"=> "maxlength", "maxlength"=> "20"])}}</div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("obs", "Observación", ["class"=> "control-label"])}}{{Form::textarea("obs", Route::is("vehicles.create") ? null : $vehicle->detailVehicle->obs, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div>';

                        break;
                }

                // Reinitialize components to change elements

                $('.content_info_vehicle').html(content);
                $('.input-group.date').datepicker({
                    autoclose: true,
                    language: 'es',
                    format: 'dd-mm-yyyy',
                    orientation: "bottom",
                    endDate: new Date(),
                    todayBtn: true,
                    todayHighlight: true
                });

                $('.tooltip-primary').tooltip();

                $('#carr').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 20
                });

                $('#carr').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 20
                });

                $('#color').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 30
                });

                $('#patent').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 6
                });

                $('#num_chasis').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 17
                });

                $('#num_motor').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 12
                });

                $('#tag').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 25
                });

                $('#code').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 20
                });

                $('.decimalNumber').autoNumeric({
                    aSep: '.',
                    aDec: ',',
                    aSign: '',
                    aPad: false,
                    aForm: false
                });

            });
        });

    </script>

@stop