<div class="row">
    {{-- Sueldo Base Form Input --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('salary', 'Sueldo Base', ['class' => 'control-label']) }}
        <div class="input-group">
            <span class="input-group-addon">$</span>
            {{ Form::text('salary', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
        </div>
    </div>
    {{-- Movilización Form Input --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('mobilization', 'Movilización', ['class' => 'control-label']) }}
        <div class="input-group">
            <span class="input-group-addon">$</span>
            {{ Form::text('mobilization', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
        </div>
    </div>
    {{-- Colación Form Input --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('collation', 'Colación', ['class' => 'control-label']) }}
        <div class="input-group">
            <span class="input-group-addon">$</span>
            {{ Form::text('collation', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
        </div>
    </div>
</div>
<div class="row">
    {{-- Previsión Select Field --}}
    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
        {{ Form::label('forecast_id', 'Previsión') }}
        {{ Form::select('forecast_id', $forecasts, null, ['class' => 'form-control']) }}
    </div>
    {{-- AFP Select Field --}}
    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
        {{ Form::label('pension_id', 'AFP') }}
        {{ Form::select('pension_id', $pensions, null, ['class' => 'form-control']) }}
    </div>
</div>