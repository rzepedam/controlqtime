<div class="row">
    <div class="col-md-6 form-group">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    {{-- Unidad Medida Peso Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('weight_id', 'Un. Medida Peso', ['class' => 'control-label']) }}
        @if (Route::is('type-vehicles.create'))
            {{ Form::select('weight_id', $weights, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('weight_id', is_null($typeVehicle->weight->deleted_at) ? $weights : ['default' => 'Seleccione Unidad Peso...'] + $weights->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
    {{-- Unidad Medida Cilindraje Motor Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('engine_cubic_id', 'Un. Medida Cilindraje Motor', ['class' => 'control-label']) }}
        @if (Route::is('type-vehicles.create'))
            {{ Form::select('engine_cubic_id', $engineCubics, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('engine_cubic_id', is_null($typeVehicle->engineCubic->deleted_at) ? $engineCubics : ['default' => 'Seleccione Unidad Cilindraje...'] + $engineCubics->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
</div>
