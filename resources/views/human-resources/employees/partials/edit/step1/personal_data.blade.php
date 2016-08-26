{{-- first row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', null, ['class' => 'form-control', 'autofocus']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', null, ['class' => 'form-control']) }}
    </div>
</div>

{{-- second row --}}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date beforeCurrentDate" id="datePicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', $employee->birthday->format('d-m-Y'), ['class' => 'form-control', "readonly"]) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad', ['class' => 'control-label']) }}
        {{ Form::select('nationality_id', $countries, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('gender_id', 'Sexo', ['class' => 'control-label']) }}
        {{ Form::select('gender_id', $genders, null, ['class' => 'form-control']) }}
    </div>
</div>

{{-- third row --}}
<div class="row">
    {{-- Estado Civil Form Select --}}
    <div class="col-md-3 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil', ['class' => 'control-label']) }}
        {{ Form::select('marital_status_id', $maritalStatuses, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>
    {{-- Depto Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('depto', 'Depto', ['class' => 'control-label']) }}
        {{ Form::text('depto', null, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Block Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('block', 'Block', ['class' => 'control-label']) }}
        {{ Form::text('block', null, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Num_home Form Input --}}
    <div class="col-md-1 form-group">
        {{ Form::label('num_home', 'Nº Casa', ['class' => 'control-label']) }}
        {{ Form::text('num_home', null, ['class' => 'form-control text-center']) }}
    </div>
</div>

{{-- Four row --}}
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, $employee->commune->province->region->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, $employee->commune->province->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', null, ['class' => 'form-control']) }}
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
                {{ Form::text('phone2', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('email_employee', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email_employee', null, ['id' => 'Employee', 'class' => 'form-control']) }}
        </div>
    </div>
</div>
