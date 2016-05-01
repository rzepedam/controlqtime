{{-- first row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control', 'autofocus']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
        {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control']) }}
    </div>
</div>

{{-- second row --}}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', Session::get('rut'), ['class' => 'form-control check_rut']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date beforeCurrentDate" id="datePicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control']) }}
            {{ Form::hidden('selectedDate') }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label']) }}
        {{ Form::select('nationality_id', $countries, Session::get('nationality_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('gender_id', 'Sexo', ['class' => 'control-label']) }}
        {{ Form::select('gender_id', $genders, Session::get('gender_id'), ['class' => 'form-control']) }}
    </div>
</div>

{{-- third row --}}
<div class="row">
    <div class="col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', Session::get('address'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, Session::get('region_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, Session::get('province_id'), ['class' => 'form-control']) }}
    </div>
</div>


{{-- Four row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email', Session::get('email'), ['id' => 'Manpower', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control']) }}
        </div>
    </div>
</div>


{{-- Five row --}}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', Session::get('phone2'), ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('forecast_id', 'Previsión', ['class' => 'control-label']) }}
        {{ Form::select('forecast_id', $forecasts, Session::get('forecast_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('mutuality_id', 'Mutualidad', ['class' => 'control-label']) }}
        {{ Form::select('mutuality_id', $mutualities, Session::get('mutuality_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('pension_id', 'AFP', ['class' => 'control-label']) }}
        {{ Form::select('pension_id', $pensions, Session::get('pension_id'), ['class' => 'form-control']) }}
    </div>
</div>

{{-- five row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
        {{ Form::select('company_id', $companies, Session::get('company_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('rating_id', 'Cargo', ['class' => 'control-label']) }}
        {{ Form::select('rating_id', $ratings, Session::get('rating_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('area_id', 'Área', ['class' => 'control-label']) }}
        {{ Form::select('area_id', $areas, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('code_internal', 'Código Interno', ['class' => 'control-label']) }}
        {{ Form::text('code_internal', null, ['class' => 'form-control']) }}
    </div>
</div>