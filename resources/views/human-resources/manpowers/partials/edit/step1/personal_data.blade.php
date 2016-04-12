
<!-- first row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno') }}
        {{ Form::text('male_surname', $manpower->male_surname, ['class' => 'form-control', 'required', 'autofocus']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno') }}
        {{ Form::text('female_surname', $manpower->female_surname, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre') }}
        {{ Form::text('first_name', $manpower->first_name, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre') }}
        {{ Form::text('second_name', $manpower->second_name, ['class' => 'form-control']) }}
    </div>
</div>


<!-- second row -->
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', $manpower->rut, ['class' => 'form-control check_rut', 'required']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento') }}
        <div class="input-group date beforeCurrentDate">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', $manpower->birthday->format('d-m-Y'), ['class' => 'form-control', 'required', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad') }}
        {{ Form::select('nationality_id', $countries, $manpower->nationality_id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('gender_id', 'Sexo') }}
        {{ Form::select('gender_id', $genders, $manpower->gender_id, ['class' => 'form-control', 'required']) }}
    </div>
</div>


<!-- third row -->
<div class="row">
    <div class="col-md-6 form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', $manpower->address, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('region_id', 'Región') }}
        {{ Form::select('region_id', $regions, $regionSelected->id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia') }}
        {{ Form::select('province_id', $provinces, $provinceSelected->id, ['class' => 'form-control', 'required']) }}
    </div>
</div>


<!-- Four row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna') }}
        {{ Form::select('commune_id', $communes, $manpower->commune_id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-6 form-group">
        {{ Form::label('email', 'Email') }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email', $manpower->email, ['id' => 'Manpower', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)', 'required']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1') }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', $manpower->phone1, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>


<!-- Five row -->
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone2', 'Teléfono 2') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', $manpower->phone2, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('forecast_id', 'Previsión') }}
        {{ Form::select('forecast_id', $forecasts, $manpower->forecast_id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('mutuality_id', 'Mutualidad') }}
        {{ Form::select('mutuality_id', $mutualities, $manpower->mutuality_id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('pension_id', 'AFP') }}
        {{ Form::select('pension_id', $pensions, $manpower->pension_id, ['class' => 'form-control', 'required']) }}
    </div>
</div>


<!-- Six row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, $manpower->company_id, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('rating_id', 'Cargo') }}
        {{ Form::select('rating_id', $ratings, $manpower->rating_id, ['class' => 'form-control', 'required']) }}
    </div>
</div>
