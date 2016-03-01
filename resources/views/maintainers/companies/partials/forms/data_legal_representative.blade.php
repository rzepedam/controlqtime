<span id="legal_representative0">
	<div class="row">
		<div class="col-md-12">
			<span id="num_legal_representative0" class="title-elements-panel2 text-green">Representante Legal #1</span>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('male_surname0', 'Apellido Paterno') }}
				{{ Form::text('male_surname0', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('female_surname0', 'Apellido Materno') }}
				{{ Form::text('female_surname0', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('first_name0', 'Primer Nombre') }}
				{{ Form::text('first_name0', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('second_name0', 'Segundo Nombre') }}
				{{ Form::text('second_name0', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
    <br />
    <div class="row">
        <div class="col-md-2">
        	<div class="form-group">
	            {{ Form::label('rut0', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
	            {{ Form::text('rut0', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-3">
        	<div class="form-group">
	            {{ Form::label('country_id0', 'Nacionalidad')  }}
	            {{ Form::select('country_id0', $countries, null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-5">
        	<div class="form-group">
	            {{ Form::label('email0', 'Email') }}
	            <div class="input-group">
	                <div class="input-group-addon">
	                    <i class="fa fa-envelope"></i>
	                </div>
	                {{ Form::email('email0', null, ['class' => 'form-control']) }}
	            </div>
            </div>
        </div>
        <div class="col-md-2">
        	<div class="form-group">
				{{ Form::label('phone1-0', 'Teléfono 1') }}
				<div class="input-group">
		            <div class="input-group-addon">
		                <i class="fa fa-phone"></i>
		            </div>
		            {{ Form::text('phone1-0', null, ['class' => 'form-control']) }}
		        </div>
	        </div>
		</div>
    </div>
	<br />
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				{{ Form::label('phone2-0', 'Teléfono 2') }}
				<div class="input-group">
		            <div class="input-group-addon">
		                <i class="fa fa-fax"></i>
		            </div>
		            {{ Form::text('phone2-0', null, ['class' => 'form-control']) }}
		        </div>
	        </div>
		</div>
	</div>
	<hr />
</span>
