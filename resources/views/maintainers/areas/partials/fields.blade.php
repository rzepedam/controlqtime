
<div class="row">
    <div class="col-md-7">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
    </div>
    <div class="col-md-5">
    	{!! Form::label('terminal_id', 'Terminal') !!}
    	{!! Form::select('terminal_id', $terminals, null, ['class' => 'form-control']) !!}
    </div>
</div>
<br><br>
