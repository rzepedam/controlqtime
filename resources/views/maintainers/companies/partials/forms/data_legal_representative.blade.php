<span id="legal_representative0">
	<div class="row">
		<div class="col-md-12">
			<span id="num_legal_representative0" class="title-elements-panel2 text-green">Representante Legal #1</span>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-7">
			{!! Form::label('full_name0', 'Nombre Completo') !!}
			{!! Form::text('full_name0', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('rut0', 'Rut') !!}
			{!! Form::text('rut0', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-3">
			{!! Form::label('country_id0', 'Nacionalidad')  !!}
			{!! Form::select('country_id0', $countries, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('rating_id0', 'Cargo') !!}
			{!! Form::select('rating_id0', $ratings, null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-5">
			{!! Form::label('email0', 'Email') !!}
			<div class="input-group">
	            <div class="input-group-addon">
	                <i class="fa fa-envelope"></i>
	            </div>
	            {!! Form::email('email0', null, ['class' => 'form-control']) !!}
	        </div>
		</div>
		<div class="col-md-2">
			{!! Form::label('phone1-0', 'Teléfono 1') !!}
			<div class="input-group">
	            <div class="input-group-addon">
	                <i class="fa fa-phone"></i>
	            </div>
	            {{ Form::text('phone1-0', null, ['class' => 'form-control']) }}
	        </div>
		</div>
		<div class="col-md-2">
			{!! Form::label('phone2-0', 'Teléfono 2') !!}
			<div class="input-group">
	            <div class="input-group-addon">
	                <i class="fa fa-fax"></i>
	            </div>
	            {{ Form::text('phone2-0', null, ['class' => 'form-control']) }}
	        </div>
		</div>
	</div>
	<hr />
</span>
