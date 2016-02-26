<div class="row">
	<div class="col-md-5">
		{!! Form::label('address', 'Dirección') !!}
		{!! Form::text('address', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-3">
		{!! Form::label('region_id', 'Región') !!}
		{!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('province_id', 'Provincia') !!}
		{!! Form::select('province_id', $provinces, null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('commune_id', 'Comuna') !!}
		{!! Form::select('commune_id', $communes, null, ['class' => 'form-control']) !!}
	</div>
</div>