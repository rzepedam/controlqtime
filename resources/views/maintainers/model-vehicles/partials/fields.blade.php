<div class="row">
    <div class="col-md-5">
        {{ Form::label('trademark_id', 'Marca Vehículo', ['class' => 'control-label']) }}
        {{ Form::select('trademark_id', $trademarks, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-7">
        {{ Form::label('name', 'Modelo', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
    </div>
</div>
