<div class="row">
	<div class="col-md-2">
		{!! Form::label('rut_business', 'Rut') !!}
		{!! Form::text('rut_business', null, ['class' => 'form-control', 'autofocus']) !!}
	</div>
	<div class="col-md-5">
		{!! Form::label('business_name', 'Razón Social') !!}
		{!! Form::text('business_name', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-4">
		{!! Form::label('gyre', 'Giro') !!}
		{!! Form::text('gyre', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-1">
		{!! Form::label('num_worker', 'N° Trab.') !!}
		{!! Form::text('num_worker', null, ['class' => 'form-control text-center']) !!}
	</div>
</div>