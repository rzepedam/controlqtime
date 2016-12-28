<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Modelo', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('trademark_id', 'Marca Vehículo', ['class' => 'control-label']) }}
        @if (Route::is('model-vehicles.create'))
            {{ Form::select('trademark_id', $trademarks, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('trademark_id', is_null($modelVehicle->trademark->deleted_at) ? $trademarks : ['default' => 'Seleccione marca...'] + $trademarks->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
</div>
