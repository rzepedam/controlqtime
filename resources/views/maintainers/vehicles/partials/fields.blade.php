<div class="row">
    <div class="col-md-4">
        {{ Form::label('trademark_id', 'Marca', ['class' => 'control-label']) }}
        {{ Form::select('trademark_id', $trademarks, (Route::currentRouteName() == 'maintainers.vehicles.create') ? null : $vehicle->modelVehicle->trademark->id, ['class' => 'form-control']) }}
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
    <div class="col-md-2">
        {{ Form::label('year', 'Año', ['class' => 'control-label']) }}
        {{ Form::selectYear('year', date('Y'), date('Y') - 20, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('color', 'Color', ['class' => 'control-label']) }}
        {{ Form::text('color', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('patent', 'Patente', ['class' => 'control-label']) }}
        {{ Form::text('patent', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('fuel_id', 'Combustible', ['class' => 'control-label']) }}
        {{ Form::select('fuel_id', $fuels, null, ['class' => 'form-control']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-3">
        {{ Form::label('num_chasis', 'Nº Chasis o VIN', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Recuerde que no es posible incluir los caracteres I, O, Q y Ñ" data-html="true"></i>
        {{ Form::text('num_chasis', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('num_motor', 'Nº Motor', ['class' => 'control-label']) }}
        {{ Form::text('num_motor', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('km', 'Kilometraje', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Especificado en el tablero del vehículo. Ingresar sin puntos porfavor" data-html="true"></i>
        {{ Form::text('km', null, ['class' => 'form-control text-center', 'placeholder' => 'Ej: 65000']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('engine_cubic', 'Cilindraje Motor (cc)', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingresar sin puntos porfavor" data-html="true"></i>
        {{ Form::text('engine_cubic', null, ['class' => 'form-control text-center', 'placeholder' => 'Ej: 1600'] ) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('weight', 'Peso', ['class' => 'control-label']) }}
        {{ Form::text('weight', null, ['class' => 'form-control text-center']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6">
        {{ Form::label('code', 'Cód. Interno', ['class' => 'control-label']) }}
        {{ Form::text('code', null, ['class' => 'form-control']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        {{ Form::label('obs', 'Observación', ['class' => 'control-label']) }}
        {{ Form::textarea('obs', null, ['class' => 'form-control', 'rows' => '3']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12 text-center">
        Pendiente Unidad de medida del peso del vehículo (Ton o kilos)
        - Puede ser un radio con opción de elección
        - Puede ser en kilos y facilitar una calculadora en el mismo ítem.
    </div>
</div>
