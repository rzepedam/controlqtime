<div class="row">
	{{-- Tipo Visita select field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('type_visit_id', 'Tipo Visita') }}
		{{ Form::select('type_visit_id', $typeVisits, null, ['class' => 'form-control']) }}
	</div>
	{{-- Guía select field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('employee_id', 'Guía') }}
		{{ Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
	</div>	

	{{-- Recorrido radio field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group margin-0">
		{{ Form::label('is_walking', 'Recorrido') }}
		<ul class="list-unstyled list-inline text-center">
		    <li>
		        <div class="radio-custom radio-primary">
		        	@if ( Route::is('visits.create') )
		        		<input type="radio" id="walk" name="is_walking" value="0" />
	        		@else
						<input type="radio" id="walk" name="is_walking" value="0" {{ ($visit->is_walking == 0) ? "checked" : '' }} />
	        		@endif
		            <label for="walk">Pie</label>
		        </div>
		    </li>
		    <li></li>
		    <li>
		        <div class="radio-custom radio-primary">
		        	@if ( Route::is('visits.create') )
		        		<input type="radio" id="vehicle" name="is_walking" value="1" />
	        		@else
		            	<input type="radio" id="vehicle" name="is_walking" value="1" {{ ($visit->is_walking == 1) ? "checked" : '' }} />
	            	@endif
		            <label for="vehicle">Vehículo</label>
		        </div>
		    </li>
		</ul>
	</div>
	{{-- Rut text field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
	</div>
</div>
<div class="row">
	{{-- Apellido Paterno text field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('male_surname', 'Apellido Paterno') }}
		{{ Form::text('male_surname', null, ['class' => 'form-control']) }}
	</div>
	{{-- Apellido Materno text field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('female_surname', 'Apellido Materno') }}
		{{ Form::text('female_surname', null, ['class' => 'form-control']) }}
	</div>

	{{-- Primer Nombre text field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('first_name', 'Primer Nombre') }}
		{{ Form::text('first_name', null, ['class' => 'form-control']) }}
	</div>
	{{-- Segundo Nombre text field --}}
	<div class="col-xs-12 col-sm-6 col-md-3 form-group">
		{{ Form::label('second_name', 'Segundo Nombre') }}
		{{ Form::text('second_name', null, ['class' => 'form-control']) }}
	</div>
</div>
<div class="row">
	{{-- Cargo text field --}}
	<div class="col-xs-12 col-sm-3 col-md-3 form-group">
		{{ Form::label('position', 'Cargo') }}
		{{ Form::text('position', null, ['class' => 'form-control']) }}
	</div>
	{{-- Empresa text field --}}
	<div class="col-xs-12 col-sm-6 col-md-6 form-group">
		{{ Form::label('company', 'Empresa') }}
		{{ Form::text('company', null, ['class' => 'form-control']) }}
	</div>
	{{-- Telefono text field --}}
	<div class="col-xs-12 col-sm-3 col-md-3 form-group">
		{{ Form::label('phone', 'Teléfono') }}
		{{ Form::text('phone', null, ['class' => 'form-control']) }}
	</div>
</div>
<div class="row">
	{{-- Email text field --}}
	<div class="col-xs-12 col-sm-6 col-md-6 form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', null, ['class' => 'form-control']) }}
	</div>
	<span id="span_date">
		@if ( Route::is('visits.create') )
			{{-- Fecha Visita date field --}}
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
			    {{ Form::label("date", "Fecha Visita", ["class" => "control-label"]) }}
			    <div class="input-group date" data-plugin="datepicker" data-start-date="{{ date("d-m-Y") }}">
			        {{ Form::text("date", Route::is('visits.create') ? null : $visit->date, ["class" => "form-control text-center", "readonly"]) }}
			        <div class="input-group-addon">
			            <i class="fa fa-calendar"></i>
			        </div>
			    </div>
			</div>
			{{-- Hora text field --}}
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
				{{ Form::label('hour', 'Hora') }}
				<div class="input-group hour" data-plugin="clockpicker">
					{{ Form::text('hour', null, ['class' => 'form-control text-center', 'readonly']) }}
					<div class="input-group-addon">
			            <i class="fa fa-clock-o"></i>
			        </div>
				</div>
			</div>
		@elseif ($visit->typeVisit->id == 1 || $visit->typeVisit->id == 5)
			{{-- Fecha Visita date field --}}
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
			    {{ Form::label("date", "Fecha Visita", ["class" => "control-label"]) }}
			    <div class="input-group date" data-plugin="datepicker" data-start-date="{{ date("d-m-Y") }}">
			        {{ Form::text("date", null, ["class" => "form-control text-center", "readonly"]) }}
			        <div class="input-group-addon">
			            <i class="fa fa-calendar"></i>
			        </div>
			    </div>
			</div>
			{{-- Hora text field --}}
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
				{{ Form::label('hour', 'Hora') }}
				<div class="input-group hour" data-plugin="clockpicker">
					{{ Form::text('hour', null, ['class' => 'form-control text-center', 'readonly']) }}
					<div class="input-group-addon">
			            <i class="fa fa-clock-o"></i>
			        </div>
				</div>
			</div>
		@else
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
				{{ Form::label("start_date", "Fecha Inicio Visita", ["class" => "control-label"]) }}
				<div class="input-group date" data-plugin="datepicker" data-start-date="{{ date("d-m-Y") }}">
					{{ Form::text("start_date", null, ["class" => "form-control text-center", "readonly"]) }}
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 form-group">
				{{ Form::label("end_date", "Fecha Fin Visita", ["class" => "control-label"]) }}
				<div class="input-group date" data-plugin="datepicker" data-start-date="{{ date("d-m-Y") }}">
					{{ Form::text("end_date", null, ["class" => "form-control text-center", "readonly"]) }}
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
		@endif
	</span>
</div>
<div class="row">
	{{-- Motivo textarea field --}}
	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
		{{ Form::label('obs', 'Motivo') }}
		{{ Form::textarea('obs', null, ['class' => 'form-control', 'rows' => 5])}}
	</div>
</div>