<div class="row">
	<div class="col-md-1 hide">
		<div class="form-group">
			{{ Form::label("id_representative", "ID", ["class" => "control-label"]) }}
			{{ Form::text("id_representative", (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->id, ["class" => "form-control"]) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
			{{ Form::text('male_surname', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->male_surname, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
			{{ Form::text('female_surname', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->female_surname, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
			{{ Form::text('first_name', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->first_name, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
			{{ Form::text('second_name', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->second_name, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('rut_representative', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
			{{ Form::text('rut_representative', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->rut_representative, ['class' => 'form-control check_rut']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label("birthday", "Fecha de Nacimiento", ['class' => 'control-label']) }}
			<div class="input-group date" data-plugin="datepicker">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				{{ Form::text("birthday", (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->birthday->format('d-m-Y'), ["class" => "form-control date", "readonly"]) }}
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label'])  }}
			{{ Form::select('nationality_id', $nationalities, (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->nationality->id, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('phone1_representative', 'Teléfono 1', ['class' => 'control-label']) }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-phone"></i>
				</div>
				{{ Form::text('phone1_representative', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->phone1_representative, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('phone2_representative', 'Teléfono 2', ['class' => 'control-label']) }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-fax"></i>
				</div>
				{{ Form::text('phone2_representative', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->phone2_representative, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('email_representative', 'Email', ['class' => 'control-label']) }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-envelope"></i>
				</div>
				@if( Route::is('administration.companies.create') )
					{{ Form::text('email_representative', null, ['id' => 'Representative', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
				@else
					{{ Form::text('email_representative', (Route::is('administration.companies.create')) ? null : $company->legalRepresentative->email_representative, ['id' => 'Representative', 'class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
				@endif
			</div>
		</div>
	</div>
</div>
<br />
<div id="Representative" class="row hide">
	<div class="col-md-12 text-center">
		@include('layout.ajax.show_spin_icon')
	</div>
</div>