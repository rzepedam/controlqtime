<div class="row">
	<div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
		{{ Form::text('male_surname', (Route::is('companies.create')) ? null : $company->legalRepresentative->male_surname, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
	</div>
	<div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
		{{ Form::text('female_surname', (Route::is('companies.create')) ? null : $company->legalRepresentative->female_surname, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
	</div>
	<div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
		{{ Form::text('first_name', (Route::is('companies.create')) ? null : $company->legalRepresentative->first_name, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
	</div>
	<div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
		{{ Form::text('second_name', (Route::is('companies.create')) ? null : $company->legalRepresentative->second_name, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
	</div>
</div>
<div class="row">
	<div class="col-sm-4 col-md-3 form-group">
		{{ Form::label('rut_representative', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
		{{ Form::text('rut_representative', (Route::is('companies.create')) ? null : $company->legalRepresentative->rut_representative, ['class' => 'form-control check_rut']) }}
	</div>
	<div class="col-sm-4 col-md-3 form-group">
		{{ Form::label("birthday", "Fecha de Nacimiento", ['class' => 'control-label']) }}
		<div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
			{{ Form::text("birthday", (Route::is('companies.create')) ? null : $company->legalRepresentative->birthday->format('d-m-Y'), ["class" => "form-control date text-center", "readonly"]) }}
		</div>
	</div>
	<div class="col-sm-4 col-md-3 form-group">
		{{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label'])  }}
		{{ Form::select('nationality_id', $nationalities, (Route::is('companies.create')) ? null : $company->legalRepresentative->nationality->id, ['class' => 'form-control']) }}
	</div>
</div>
<div class="row">
    {{-- Dirección Text Field --}}
    <div class="col-sm-6 col-md-6 form-group">
		{{ Form::label('address_representative', 'Dirección') }}
		{{ Form::text('address_representative', Route::is('companies.create') ? null : $company->legalRepresentative->address->address, ['class' => 'form-control']) }}
    </div>
    {{-- Depto Text Field --}}
    <div class="col-sm-2 col-md-2 form-group">
		{{ Form::label('depto', 'Depto') }}
		{{ Form::text('depto', Route::is('companies.create') ? null : $company->legalRepresentative->address->detailAddressLegalEmployee->depto, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Block Text Field --}}
    <div class="col-sm-2 col-md-2 form-group">
		{{ Form::label('block', 'Block') }}
		{{ Form::text('block', Route::is('companies.create') ? null : $company->legalRepresentative->address->detailAddressLegalEmployee->block, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Nº Casa Text Field --}}
    <div class="col-sm-2 col-md-2 form-group">
		{{ Form::label('num_home', 'Nº Casa') }}
		{{ Form::text('num_home', Route::is('companies.create') ? null : $company->legalRepresentative->address->detailAddressLegalEmployee->num_home, ['class' => 'form-control text-center']) }}
    </div>
</div>
<div class="row">
	{{-- Región Select Field --}}
	<div class="col-sm-4 col-md-4 form-group">
		{{ Form::label('region_legal_id', 'Región') }}
		{{ Form::select('region_legal_id', $regions, Route::is('companies.create') ? null : $company->legalRepresentative->address->commune->province->region->id, ['class' => 'form-control']) }}
	</div>
    {{-- Provincia Select Field --}}
    <div class="col-sm-4 col-md-3 form-group">
		{{ Form::label('province_legal_id', 'Provincia') }}
		{{ Form::select('province_legal_id', Route::is('companies.create') ? $provinces : $provincesRep, Route::is('companies.create') ? null : $company->legalRepresentative->address->commune->province->id, ['class' => 'form-control']) }}
    </div>
    {{-- Comuna Select Field --}}
    <div class="col-sm-4 col-md-3 form-group">
		{{ Form::label('commune_legal_id', 'Comuna') }}
		{{ Form::select('commune_legal_id', Route::is('companies.create') ? $communes : $communesRep, Route::is('companies.create') ? null : $company->legalRepresentative->address->commune->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('phone1_representative', 'Teléfono 1', ['class' => 'control-label']) }}
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-phone"></i>
			</div>
			{{ Form::text('phone1_representative', Route::is('companies.create') ? null : $company->legalRepresentative->address->phone1, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
		</div>
    </div>
	<div class="col-sm-6 col-md-3 form-group">
		{{ Form::label('phone2_representative', 'Teléfono 2', ['class' => 'control-label']) }}
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-fax"></i>
			</div>
			{{ Form::text('phone2_representative', Route::is('companies.create') ? null : $company->legalRepresentative->address->phone2, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
		</div>
	</div>
	<div class="col-sm-12 col-md-6 form-group">
		{{ Form::label('email_representative', 'Email', ['class' => 'control-label']) }}
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			@if( Route::is('companies.create') )
				{{ Form::text('email_representative', null, ['id' => 'Representative', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
			@else
				{{ Form::text('email_representative', (Route::is('companies.create')) ? null : $company->legalRepresentative->email_representative, ['id' => 'Representative', 'class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
			@endif
		</div>
	</div>
</div>
<br />
<div id="Representative" class="row hide">
	<div class="col-md-12 text-center">
		@include('layout.ajax.show_spin_icon')
	</div>
</div>