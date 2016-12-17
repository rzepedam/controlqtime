<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("type_vehicle_id", "Tipo de Vehículo", ["class" => "control-label"]) }}
            {{ Form::select("type_vehicle_id", $typeVehicles, 2, ["class" => "form-control"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("trademark_id", "Marca", ["class" => "control-label"]) }}
            {{ Form::select("trademark_id", $trademarks, null, ["class" => "form-control"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("model_vehicle_id", "Modelo", ["class" => "control-label"]) }}
            {{ Form::select("model_vehicle_id", $modelVehicles, null, ["class" => "form-control"]) }}
        </div>
    </div>
    {{-- Carrocería Text Field --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("carr", "Carrocería") }}
            {{ Form::text("carr", null, ["class" => "form-control", "data-plugin" => "maxlength", "maxlength" => "20"]) }}
        </div>
    </div>
</div>
<div class="row">
    {{-- Empresa Select Field --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("company_id", "Empresa", ["class" => "control-label"]) }}
            {{ Form::select("company_id", $companies, null, ["class" => "form-control"]) }}
        </div>
    </div>
    {{-- Estado Vehículo Select Field --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("state_vehicle_id", "Estado Vehículo", ["class" => "control-label"]) }}
            {{ Form::select("state_vehicle_id", $stateVehicles, null, ["class" => "form-control"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("acquisition_date", "Fecha Adquisición", ["class" => "control-label"]) }}
            <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date("d-m-Y") }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text("acquisition_date", null, ["class" => "form-control text-center", "readonly"]) }}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("inscription_date", "Fecha Inscripción", ["class" => "control-label"]) }}
            <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date("d-m-Y") }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text("inscription_date", null, ["class" => "form-control text-center", "readonly"]) }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("color", "Color", ["class" => "control-label"]) }}
            {{ Form::text("color", null, ["class" => "form-control maxlength", "data-plugin" => "maxlength", "maxlength" => "30"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("year", "Año", ["class" => "control-label"]) }}
            {{ Form::selectYear("year", date("Y"), date("Y") - 20, null, ["class" => "form-control"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("fuel_id", "Combustible", ["class" => "control-label"]) }}
            {{ Form::select("fuel_id", $fuels, null, ["class" => "form-control"]) }}
        </div>
    </div>
    {{-- Patente Text Field --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("patent", "Patente", ["class" => "control-label"]) }}
            {{ Form::text("patent", null, ["class" => "form-control text-center maxlength", "data-plugin" => "maxlength", "maxlength" => "6"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("num_chasis", "Nº Chasis o VIN", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>
            {{ Form::text("num_chasis", null, ["class" => "form-control", "data-plugin" => "maxlength", "maxlength" => "17"]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label("num_motor", "Nº Motor", ["class" => "control-label"]) }}
            {{ Form::text("num_motor", null, ["class" => "form-control", "data-plugin" => "maxlength", "maxlength" => "12"]) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label("km", "Kilometraje", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>
            {{ Form::text("km", null, ["class" => "form-control text-center decimalNumber", "data-plugin" => "autoNumeric", "data-a-sign" => ""]) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label("engine_cubic", "Cilindraje Motor", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>
            {{ Form::text("engine_cubic", null, ["class" => "form-control text-center decimalNumber", "data-plugin" => "autoNumeric", "data-a-sign" => ""] ) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label("weight", "Peso", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>
            {{ Form::text("weight", null, ["class" => "form-control text-center decimalNumber", "data-plugin" => "autoNumeric", "data-a-sign" => ""]) }}
        </div>
    </div>
</div>
<div class="row">
    {{-- Nº Plazas Text Field --}}
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label("num_plazas", "Nº Plazas") }}
            {{ Form::text("num_plazas", null, ["class" => "form-control text-center", "data-plugin" => "maxlength", "maxlength" => "3"]) }}
        </div>
    </div>
    {{-- Tag Text Field --}}
    <div class="col-md-5">
        <div class="form-group">
            {{ Form::label("tag", "Tag") }}
            {{ Form::text("tag", null, ["class" => "form-control", "data-plugin" => "maxlength", "maxlength" => "25"]) }}
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {{ Form::label("code", "Cód. Interno", ["class" => "control-label"]) }}
            {{ Form::text("code", null, ["class" => "form-control", "data-plugin" => "maxlength", "maxlength" => "20"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label("obs", "Observación", ["class" => "control-label"]) }}
            {{ Form::textarea("obs", null, ["class" => "form-control", "rows" => "3"]) }}
        </div>
    </div>
</div>