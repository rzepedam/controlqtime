<div class="row">
    <div class="col-md-9 form-group">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control find-for-restore', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- Acrónimo Form Input --}}
    <div class="col-md-3 form-group">
        {{ Form::label('acr', 'Acrónimo', ['class' => 'control-label']) }}
        {{ Form::text('acr', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
</div>
