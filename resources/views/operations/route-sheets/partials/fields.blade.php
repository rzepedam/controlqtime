<div class="row">
    <div class="col-md-3">
        {{ Form::label('num_sheet', 'Nº Planilla', ['class' => 'control-label']) }}
        {{ Form::text('num_sheet', null, ['class' => 'form-control', 'autofocus']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('manpower_id', 'Conductor', ['class' => 'control-label']) }}
        {{ Form::select('manpower_id', $manpowers, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-1">
        {{ Form::label('turn', 'Turno', ['class' => 'control-label']) }}
        {{ Form::text('turn', null, ['class' => 'form-control text-center']) }}
    </div>
</div>
