<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
    </div>
    <div class="col-md-5">
    	{{ Form::label('subsidiary_id', 'Sucursal') }}
    	{{ Form::select('subsidiary_id', [], null, ['class' => 'form-control']) }}
    </div>
</div>
