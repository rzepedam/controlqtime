<span id="representative_company0">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-alt alert-success alert-dismissible" role="alert">
				<span id="num_representative_company0" class="text-success">Representante Empresa #1</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1 form-group hide">
			{{ Form::label("id_representative0", "ID", ["class" => "control-label"]) }}
			{{ Form::text("id_representative[]", 0, ["id" => "id_representative0", "class" => "form-control"]) }}
		</div>
		<div class="col-md-3 form-group">
		    {{ Form::label('type_representative_id', 'Tipo Representante', ['class' => 'control-label']) }}
		    {{ Form::select('type_representative_id[]', $type_representatives, null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
				{{ Form::text('male_surname[]', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
				{{ Form::text('female_surname[]', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
				{{ Form::text('first_name[]', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
    <div class="row">
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
				{{ Form::text('second_name[]', null, ['class' => 'form-control']) }}
			</div>
		</div>
        <div class="col-md-2">
        	<div class="form-group">
	            {{ Form::label('rut_representative', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
	            {{ Form::text('rut_representative[]', null, ['class' => 'form-control check_rut']) }}
            </div>
        </div>
        <div class="col-md-2">
        	<div class="form-group">
		        {{ Form::label("birthday", "Fecha de Nac.", ['class' => 'control-label']) }}
		        <div class="input-group date">
		            <div class="input-group-addon">
		                <i class="fa fa-calendar"></i>
		            </div>
		            {{ Form::text("birthday[]", null, ["class" => "form-control date", "readonly"]) }}
		        </div>
		    </div>
	    </div>
        <div class="col-md-3">
        	<div class="form-group">
	            {{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label'])  }}
	            {{ Form::select('nationality_id[]', $nationalities, null, ['class' => 'form-control']) }}
            </div>
        </div>
		<div class="col-md-2">
            <div class="form-group">
                {{ Form::label('phone1_representative', 'Teléfono 1', ['class' => 'control-label']) }}
				<div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
					{{ Form::text('phone1_representative[]', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-md-2">
            <div class="form-group">
                {{ Form::label('phone2_representative', 'Teléfono 2', ['class' => 'control-label']) }}
				<div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-fax"></i>
                    </div>
					{{ Form::text('phone2_representative[]', null, ['class' => 'form-control']) }}
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
					{{ Form::text('email_representative[]', null, ['id' => 'Representative', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
				</div>
			</div>
		</div>
	</div>
	<br />
</span>
<div id="Representative" class="row hide">
	<br />
	<div class="col-md-12 text-center">
		@include('layout.ajax.show_spin_icon')
	</div>
</div>