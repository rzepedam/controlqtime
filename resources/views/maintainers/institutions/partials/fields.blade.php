<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('type_institution_id', 'Tipo de Institución', ['class' => 'control-label']) }}
        @if (Route::is('institutions.create'))
            {{ Form::select('type_institution_id', $type_institutions, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('type_institution_id', is_null($institution->typeInstitution->deleted_at) ? $type_institutions : ['default' => 'Seleccione Tipo Institución...'] + $type_institutions->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
</div>
