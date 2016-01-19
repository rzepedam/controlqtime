
<div class="row">
    <div class="col-md-7">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
    </div>

    <div class="col-md-5">
        {!! Form::label('type_institution_id', 'Tipo de Institución') !!}
        {!! Form::select('type_institution_id', $type_institutions, null, ['class' => 'form-control']) !!}
    </div>
</div>
<br><br>
