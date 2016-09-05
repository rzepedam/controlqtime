<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('type_institution_id', 'Tipo de Institución', ['class' => 'control-label']) }}
        {{ Form::select('type_institution_id', $type_institutions, null, ['class' => 'form-control']) }}
    </div>
</div>
