{{-- first row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
        {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
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
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control', "readonly"]) }}
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
    {{-- Estado Civil Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil', ['class' => 'control-label']) }}
        {{ Form::select('marital_status_id', $maritalStatuses, Session::get('marital_status_id'), ['class' => 'form-control']) }}
    </div>
    {{-- Previsión Form Select --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('forecast_id', 'Previsión', ['class' => 'control-label']) }}
            {{ Form::select('forecast_id', $forecasts, Session::get('forecast_id'), ['class' => 'form-control']) }}
        </div>
    </div>
    {{-- AFP Form Select --}}
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('pension_id', 'AFP', ['class' => 'control-label']) }}
            {{ Form::select('pension_id', $pensions, Session::get('pension_id'), ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', Session::get('address'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '100']) }}
    </div>
    {{-- Depto Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('depto', 'Depto', ['class' => 'control-label']) }}
        {{ Form::text('depto', Session::get('depto'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Block Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('block', 'Block', ['class' => 'control-label']) }}
        {{ Form::text('block', Session::get('block'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Num_home Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('num_home', 'Nº Casa', ['class' => 'control-label']) }}
        {{ Form::text('num_home', Session::get('num_home'), ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, Session::get('region_id'), ['class' => 'form-control']) }}
    </div>
</div>

{{-- Four row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, Session::get('province_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', Session::get('phone2'), ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
            </div>
        </div>
    </div>
</div>

{{-- Five row --}}
<div class="row">
    <div class="col-md-6 form-group">
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
