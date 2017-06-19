<div class="row">
    {{-- Male Surname Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno', ['class' => 'control-label']) }}
        {{ Form::text('male_surname', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- Female Surname Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno', ['class' => 'control-label']) }}
        {{ Form::text('female_surname', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- First Name Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Si su nombre es compuesto (Ej: María de los Ángeles), ingresar 'María de los' aquí y 'Ángeles' en campo Segundo Nombre" data-html="true"></i>
        {{ Form::text('first_name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
    {{-- Second Name Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre', ['class' => 'control-label']) }}
        {{ Form::text('second_name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
</div>
<div class="row">
    {{-- Rut Radio field --}}
    <div class="col-xs-12 col-sm-6 col-md-3 form-group margin-0">
        {{ Form::label('doc', 'Documento') }}
        <ul class="list-unstyled list-inline text-center">
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="rut" name="doc" value="rut" {{ $employee->doc === 'rut' ? 'checked' : '' }} />
                    <label for="rut">Nac</label>
                </div>
            </li>
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="passport" name="doc" value="passport" {{ $employee->doc === 'passport' ? 'checked' : '' }} />
                    <label for="passport">Pasap</label>
                </div>
            </li>
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="foreign" name="doc" value="foreign" {{ $employee->doc === 'foreign' ? 'checked' : '' }} />
                    <label for="foreign">Extranj</label>
                </div>
            </li>
        </ul>
    </div>
    {{-- Rut Form Input --}}
    <div id="rutField" class="col-sm-6 col-md-3 form-group">
        {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
        @if ($employee->doc === 'rut')
            {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
        @elseif ($employee->doc === 'foreign')
            {{ Form::text('rut', null, ['class' => 'form-control format_rut']) }}
        @else
            {{ Form::text('rut', null, ['class' => 'form-control']) }}
        @endif
    </div>
    {{-- Birthday Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', $employee->birthday, ['class' => 'form-control text-center', "readonly"]) }}
        </div>
    </div>
    {{-- Gender Radio field --}}
    <div class="col-xs-12 col-sm-6 col-md-3 form-group margin-0">
        {{ Form::label('male', 'Sexo') }}
        <ul class="list-unstyled list-inline text-center">
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="male" name="is_male" value="M" {{ $employee->is_male ? 'checked' : '' }} />
                    <label for="male">M</label>
                </div>
            </li>
            <li></li>
            <li>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="female" name="is_male" value="F" {{ ! $employee->is_male ? 'checked' : '' }} />
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
        {{ Form::select('nationality_id', $nationalities, null, ['class' => 'form-control']) }}
    </div>
    {{-- Married Status Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil', ['class' => 'control-label']) }}
        {{ Form::select('marital_status_id', is_null($employee->maritalStatus->deleted_at) ? $maritalStatuses : ['default' => 'Seleccione Estado Civil...'] + $maritalStatuses->toArray(), null, ['class' => 'form-control']) }}
    </div>
    {{-- Address Form Input --}}
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', $employee->address->address, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '75']) }}
    </div>
</div>
<div class="row">
    {{-- Depto Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('depto', 'Depto', ['class' => 'control-label']) }}
        {{ Form::text('depto', $employee->address->detailAddressLegalEmployee->depto, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Block Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('block', 'Block', ['class' => 'control-label']) }}
        {{ Form::text('block', $employee->address->detailAddressLegalEmployee->block, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Num_home Form Input --}}
    <div class="col-sm-4 col-md-1 form-group">
        {{ Form::label('num_home', 'Casa', ['class' => 'control-label']) }}
        {{ Form::text('num_home', $employee->address->detailAddressLegalEmployee->num_home, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    {{-- Region Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, $employee->address->commune->province->region->id, ['class' => 'form-control']) }}
    </div>
    {{-- Province Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, $employee->address->commune->province->id, ['class' => 'form-control']) }}
    </div>
    {{-- Commune Form Select --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, $employee->address->commune_id, ['class' => 'form-control']) }}
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
            {{ Form::text('phone1', $employee->address->phone1, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    {{-- Phone2 Form Input --}}
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-fax"></i>
            </div>
            {{ Form::text('phone2', $employee->address->phone2, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    {{-- Email Form Input --}}
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
