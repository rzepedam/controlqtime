<div class="row">
    <div class="col-md-4">
        {{ Form::label('type_vehicle_id', 'Tipo de Vehículo', ['class' => 'control-label']) }}
        {{ Form::select('type_vehicle_id', $type_vehicles, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
        {{ Form::label('trademark_id', 'Marca', ['class' => 'control-label']) }}
        {{ Form::select('trademark_id', $trademarks, (Route::currentRouteName() == 'maintainers.vehicles.create') ? null : $vehicle->modelVehicle->trademark->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
        {{ Form::label('model_vehicle_id', 'Modelo', ['class' => 'control-label']) }}
        {{ Form::select('model_vehicle_id', $model_vehicles, null, ['class' => 'form-control']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6">
        {{ Form::label('terminal_id', 'Terminal', ['class' => 'control-label']) }}
        {{ Form::select('terminal_id', $terminals, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('patent', 'Patente', ['class' => 'control-label']) }}
        {{ Form::text('patent', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('year', 'Año', ['class' => 'control-label']) }}
        {{ Form::selectYear('year', date('Y'), date('Y') - 20, null, ['class' => 'form-control']) }}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        {{ Form::label('code', 'Cód. Interno', ['class' => 'control-label']) }}
        {{ Form::text('code', null, ['class' => 'form-control']) }}
    </div>
</div>
