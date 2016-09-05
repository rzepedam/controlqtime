<div class="row">
    <div class="col-md-6 form-group">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    {{-- Unidad Medida Peso Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('weight_id', 'Un. Medida Peso', ['class' => 'control-label']) }}
        {{ Form::select('weight_id', $weights, null, ['class' => 'form-control']) }}
    </div>
    {{-- Unidad Medida Cilindraje Motor Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('engine_cubic_id', 'Un. Medida Cilindraje Motor', ['class' => 'control-label']) }}
        {{ Form::select('engine_cubic_id', $engine_cubics, null, ['class' => 'form-control']) }}
    </div>
</div>
