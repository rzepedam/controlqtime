{{-- First row --}}
<div class="row">
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Si su nombre es compuesto (Ej: María de los Ángeles), ingresar 'María de los' aquí y 'Ángeles' en campo Segundo Nombre" data-html="true"></i>
        {{ Form::text('first_name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
</div>

{{-- Second row --}}
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', $employee->birthday, ['class' => 'form-control text-center', "readonly"]) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label']) }}
        {{ Form::select('nationality_id', $nationalities, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group margin-0">
        {{ Form::label('male', 'Sexo') }}
        <ul class="list-unstyled list-inline text-center">
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="male" name="is_male" value="M" {{ $employee->is_male_edit ? 'checked' : '' }} />
                    <label for="male">M</label>
                </div>
            </li>
            <li></li>
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="female" name="is_male" value="F" {{ ! $employee->is_male_edit ? 'checked' : '' }} />
                    <label for="female">F</label>
                </div>
            </li>
        </ul>
    </div>
</div>

{{-- Third row --}}
<div class="row">
    {{-- Estado Civil Form Select --}}
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil', ['class' => 'control-label']) }}
        {{ Form::select('marital_status_id', $maritalStatuses, null, ['class' => 'form-control']) }}
    </div>
    {{-- Previsión Form Select --}}
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('forecast_id', 'Previsión', ['class' => 'control-label']) }}
        {{ Form::select('forecast_id', $forecasts, null, ['class' => 'form-control']) }}
    </div>
    {{-- Pensión Form Select --}}
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('pension_id', 'Pensión', ['class' => 'control-label']) }}
        {{ Form::select('pension_id', $pensions, null, ['class' => 'form-control']) }}
    </div>
</div>

{{-- Four row --}}
<div class="row">
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', $employee->address->address, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '75']) }}
    </div>
    {{-- Depto Form Input --}}
    <div class="col-sm-2 col-md-2 form-group">
        {{ Form::label('depto', 'Depto', ['class' => 'control-label']) }}
        {{ Form::text('depto', $employee->address->detailAddressLegalEmployee->depto, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Block Form Input --}}
    <div class="col-sm-2 col-md-2 form-group">
        {{ Form::label('block', 'Block', ['class' => 'control-label']) }}
        {{ Form::text('block', $employee->address->detailAddressLegalEmployee->block, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Num_home Form Input --}}
    <div class="col-sm-2 col-md-2 form-group">
        {{ Form::label('num_home', 'Casa', ['class' => 'control-label']) }}
        {{ Form::text('num_home', $employee->address->detailAddressLegalEmployee->num_home, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
</div>

{{-- Five row --}}
<div class="row">
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, $employee->address->commune->province->region->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, $employee->address->commune->province->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, $employee->address->commune_id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', $employee->address->phone1, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
</div>

{{-- Five row --}}
<div class="row">
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-fax"></i>
            </div>
            {{ Form::text('phone2', $employee->address->phone2, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('email_employee', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email_employee', null, ['id' => 'Employee', 'class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
        </div>
    </div>
</div>
