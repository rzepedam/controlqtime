
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
    </div>
    <div class="col-md-6">
    	{!! Form::label('country_id', 'País') !!}
    	{!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
    </div>
</div>
<br><br>
