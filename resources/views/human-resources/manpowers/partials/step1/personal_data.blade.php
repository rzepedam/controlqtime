<!-- first row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno') }}
        {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control', 'required', 'autofocus']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno') }}
        {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre') }}
        {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre') }}
        {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control']) }}
    </div>
</div>

<!-- second row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
        {{ Form::text('rut', Session::get('rut'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha de Nacimiento') }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control data_mask', 'required']) }}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('nationality_id', 'Nacionalidad') }}
        {{ Form::select('nationality_id', $countries, Session::get('nationality_id'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('gender_id', 'Sexo') }}
        {{ Form::select('gender_id', $genders, Session::get('gender_id'), ['class' => 'form-control', 'required']) }}
    </div>
</div>

<!-- third row -->
<div class="row">
    <div class="col-md-5 form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', Session::get('address'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna') }}
        {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-4 form-group">
        {{ Form::label('email', 'Email') }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::email('email', Session::get('email'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>

<!-- four row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1') }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone2', 'Teléfono 2') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', Session::get('phone2'), ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('forecast_id', 'Previsión') }}
        {{ Form::select('forecast_id', $forecasts, Session::get('forecast_id'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('mutuality_id', 'Mutualidad') }}
        {{ Form::select('mutuality_id', $mutualities, Session::get('mutuality_id'), ['class' => 'form-control', 'required']) }}
    </div>
</div>

<!-- five row -->
<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('pension_id', 'AFP') }}
        {{ Form::select('pension_id', $pensions, Session::get('pension_id'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, Session::get('company_id'), ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-md-3 form-group">
        {{ Form::label('rating_id', 'Cargo') }}
        {{ Form::select('rating_id', $ratings, Session::get('rating_id'), ['class' => 'form-control', 'required']) }}
    </div>
</div>

