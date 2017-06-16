<div class="row">
    {{-- Male Surname Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- Female Surname Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- First Name Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Si su nombre es compuesto (Ej: María de los Ángeles), ingresar 'María de los' aquí y 'Ángeles' en campo Segundo Nombre" data-html="true"></i>
        {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- Second Name Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
</div>
<div class="row">
    {{-- Rut Radio field --}}
    <div class="col-xs-12 col-sm-6 col-md-3 form-group margin-0">
    	{{ Form::label('is_rut', 'Documento') }}
    	<ul class="list-unstyled list-inline text-center">
    	    <li>
    	        <div class="radio-custom radio-primary">
    	        	<input type="radio" id="rut" name="is_rut" value="1" checked />
    	            <label for="rut">Rut</label>
    	        </div>
    	    </li>
    	    <li></li>
    	    <li>
    	        <div class="radio-custom radio-primary">
    	            <input type="radio" id="passport" name="is_rut" value="0" />
    	            <label for="passport">Pasaporte</label>
    	        </div>
    	    </li>
    	</ul>
    </div>
    {{-- Rut Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
        {{ Form::text('rut', Session::get('rut'), ['class' => 'form-control check_rut']) }}
    </div>
    {{-- Birthday Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control text-center', "readonly"]) }}
        </div>
    </div>
    {{-- Gender Radio field --}}
    <div class="col-xs-12 col-sm-6 col-md-3 form-group margin-0">
        {{ Form::label('male', 'Sexo') }}
        <ul class="list-unstyled list-inline text-center">
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="male" name="is_male" value="M" {{ Session::get('is_male') == 'M' ? 'checked' : '' }} />
                    <label for="male">M</label>
                </div>
            </li>
            <li></li>
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="female" name="is_male" value="F" {{ Session::get('is_male') == 'F' ? 'checked' : '' }} />
                    <label for="female">F</label>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    {{-- Nationality Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label']) }}
        {{ Form::select('nationality_id', $nationalities, Session::get('nationality_id'), ['class' => 'form-control']) }}
    </div>
    {{-- Married Status Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil', ['class' => 'control-label']) }}
        {{ Form::select('marital_status_id', $maritalStatuses, Session::get('marital_status_id'), ['class' => 'form-control']) }}
    </div>
    {{-- Address Form Input --}}
    <div class="col-sm-12 col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', Session::get('address'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '75']) }}
    </div>
</div>
<div class="row">
    {{-- Depto Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('depto', 'Depto', ['class' => 'control-label']) }}
        {{ Form::text('depto', Session::get('depto'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Block Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('block', 'Block', ['class' => 'control-label']) }}
        {{ Form::text('block', Session::get('block'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Num_home Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('num_home', 'Nº Casa', ['class' => 'control-label']) }}
        {{ Form::text('num_home', Session::get('num_home'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Region Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, Session::get('region_id'), ['class' => 'form-control']) }}
    </div>
    {{-- Province Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, Session::get('province_id'), ['class' => 'form-control']) }}
    </div>
    {{-- Commune Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Phone1 Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    {{-- Phone2 Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-fax"></i>
            </div>
            {{ Form::text('phone2', Session::get('phone2'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    {{-- Email Form Input --}}
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('email_employee', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email_employee', Session::get('email_employee'), ['id' => 'Employee', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
        </div>
    </div>
</div>
<div id="Employee" class="row hide">
    <br />
    <div class="col-md-12 text-center">
        @include('layout.ajax.show_spin_icon')
    </div>
</div>
