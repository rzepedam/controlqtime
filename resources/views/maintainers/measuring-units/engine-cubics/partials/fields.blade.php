<div class="row">
    <div class="col-md-9 form-group">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
    </div>
    {{-- Acrónimo Form Input --}}
    <div class="col-md-3 form-group">
        {{ Form::label('acr', 'Acrónimo', ['class' => 'control-label']) }}
        {{ Form::text('acr', null, ['class' => 'form-control']) }}
    </div>
</div>
