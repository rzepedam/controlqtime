<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control find-for-restore', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('terminal_id', 'Terminal', ['class' => 'control-label']) }}
        {{ Form::select('terminal_id', $terminals, null, ['class' => 'form-control']) }}
    </div>
</div>
