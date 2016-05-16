
<!-- first row -->
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


<!-- second row -->
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date beforeCurrentDate">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', $manpower->birthday->format('d-m-Y'), ['class' => 'form-control']) }}
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


<!-- third row -->
<div class="row">
    <div class="col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, $regionSelected->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
        {{ Form::select('province_id', $provinces, $provinceSelected->id, ['class' => 'form-control']) }}
    </div>
</div>


<!-- Four row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email', null, ['id' => 'Manpower', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
        </div>
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


<!-- Five row -->
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
    <div class="col-md-3 form-group">
        {{ Form::label('forecast_id', 'Previsión', ['class' => 'control-label']) }}
        {{ Form::select('forecast_id', $forecasts, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('mutuality_id', 'Mutualidad', ['class' => 'control-label']) }}
        {{ Form::select('mutuality_id', $mutualities, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('pension_id', 'AFP', ['class' => 'control-label']) }}
        {{ Form::select('pension_id', $pensions, null, ['class' => 'form-control']) }}
    </div>
</div>


<!-- Six row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('rating_id', 'Cargo', ['class' => 'control-label']) }}
        {{ Form::select('rating_id', $ratings, null, ['class' => 'form-control']) }}
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
