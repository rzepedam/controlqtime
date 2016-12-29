<div class="row">
    <div class="col-md-4">
        {{-- Sueldo Base Form Input --}}
        <div class="form-group">
            {{ Form::label('salary', 'Sueldo Base', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('salary', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- Movilización Form Input --}}
        <div class="form-group">
            {{ Form::label('mobilization', 'Movilización', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('mobilization', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- Colación Form Input --}}
        <div class="form-group">
            {{ Form::label('collation', 'Colación', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('collation', null, ['class' => 'form-control text-center money', 'data-plugin' => 'autoNumeric']) }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{-- Tipo Contrato Form Select --}}
        <div class="form-group">
            {{ Form::label('type_contract_id', 'Tipo Contrato', ['class' => 'control-label']) }}
            {{ Form::select('type_contract_id', $typeContracts, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>