<div class="row">
    <div class="col-md-4">
        {{-- Sueldo Base Form Input --}}
        <div class="form-group">
            {{ Form::label('salary', 'Sueldo Base', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('salary', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- Movilización Form Input --}}
        <div class="form-group">
            {{ Form::label('mobilization', 'Movilización', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('mobilization', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- Colación Form Input --}}
        <div class="form-group">
            {{ Form::label('collation', 'Colación', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">$</span>
                {{ Form::text('collation', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">

    </div>
</div>