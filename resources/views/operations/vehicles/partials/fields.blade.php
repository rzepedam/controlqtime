<div class="row">
    <div class="col-md-4">
        {{ Form::label('trademark_id', 'Marca', ['class' => 'control-label']) }}
        {{ Form::select('trademark_id', $trademarks, Route::is('vehicles.create') ? null : $vehicle->modelVehicle->trademark->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
        {{ Form::label('model_vehicle_id', 'Modelo', ['class' => 'control-label']) }}
        {{ Form::select('model_vehicle_id', $model_vehicles, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
        {{ Form::label('type_vehicle_id', 'Tipo de Vehículo', ['class' => 'control-label']) }}
        {{ Form::select('type_vehicle_id', $type_vehicles, null, ['class' => 'form-control']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-3">
        {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control']) }}
    </div>
    {{-- Estado Vehículo Form Select --}}
    <div class="col-md-2 form-group">
        {{ Form::label('state_vehicle_id', 'Estado Vehículo', ['class' => 'control-label']) }}
        {{ Form::select('state_vehicle_id', $state_vehicles, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2 form-group">
        {{ Form::label('acquisition_date', 'Fecha Adquisición', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('acquisition_date', null, ['class' => 'form-control', "readonly"]) }}
        </div>
    </div>
    <div class="col-md-2 form-group">
        {{ Form::label('inscription_date', 'Fecha Inscripción', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('inscription_date', null, ['class' => 'form-control', "readonly"]) }}
        </div>
    </div>
    <div class="col-md-3">
        {{ Form::label('color', 'Color', ['class' => 'control-label']) }}
        {{ Form::text('color', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        {{ Form::label('year', 'Año', ['class' => 'control-label']) }}
        {{ Form::selectYear('year', date('Y'), date('Y') - 20, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('patent', 'Patente', ['class' => 'control-label']) }}
        {{ Form::text('patent', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '15']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('fuel_id', 'Combustible', ['class' => 'control-label']) }}
        {{ Form::select('fuel_id', $fuels, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('num_chasis', 'Nº Chasis o VIN', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>
        {{ Form::text('num_chasis', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '17']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('num_motor', 'Nº Motor', ['class' => 'control-label']) }}
        {{ Form::text('num_motor', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '12']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-2">
        {{ Form::label('km', 'Kilometraje', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>
        {{ Form::text('km', null, ['class' => 'form-control text-center', 'placeholder' => 'Ej: 65000', 'data-plugin' => 'maxlength', 'maxlength' => '7', 'threshold' => '7']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('engine_cubic', 'Cilindraje Motor', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>
        {{ Form::text('engine_cubic', null, ['class' => 'form-control text-center', 'placeholder' => 'Ej: 1600', 'data-plugin' => 'maxlength', 'maxlength' => '4', 'threshold' => '4'] ) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('weight', 'Peso', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="La Unidad de Medida ya fue especificada en Tipo de Vehículo. Ingrese sólo números" data-html="true"></i>
        {{ Form::text('weight', null, ['class' => 'form-control text-center', 'placeholder' => 'Ej: 750', 'data-plugin' => 'maxlength', 'maxlength' => '6', 'threshold' => '6']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('code', 'Cód. Interno', ['class' => 'control-label']) }}
        {{ Form::text('code', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        {{ Form::label('obs', 'Observación', ['class' => 'control-label']) }}
        {{ Form::textarea('obs', null, ['class' => 'form-control', 'rows' => '3']) }}
    </div>
</div>
