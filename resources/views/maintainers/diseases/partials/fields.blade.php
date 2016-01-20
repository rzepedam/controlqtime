<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>
</div>
<br><br>
