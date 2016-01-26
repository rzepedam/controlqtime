
    <div class="row">
        <div class="col-md-3">
            {{ Form::label('male_surname', 'Apellido Paterno') }}
            {{ Form::text('male_surname', null, ['class' => 'form-control', 'autofocus']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('female_surname', 'Apellido Materno') }}
            {{ Form::text('female_surname', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('first_name', 'Primer Nombre') }}
            {{ Form::text('male_surname', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('second_name', 'Segundo Nombre') }}
            {{ Form::text('male_surname', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle text-primary"></i>
            {{ Form::text('rut', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('birthday', 'Fecha de Nacimiento') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-6">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {{ Form::label('gender_id', 'Sexo') }}
            {{ Form::select('gender_id', $genders, null, ['class' => 'form-control'] ) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('area_id', 'Área') }}
            {{ Form::select('area_id', ['Administración', 'Mantenimiento', 'Operaciones'], 0, ['class' => 'form-control'] ) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('rating_id', 'Cargo') }}
            {{ Form::select('rating_id', $ratings, null, ['class' => 'form-control'] ) }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            {{ Form::label('region_id', 'Región') }}
            {{ Form::select('region_id', $regions, null, ['class' => 'form-control'] ) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('province_id', 'Provincia') }}
            {{ Form::select('province_id', $provinces, null, ['class' => 'form-control'] ) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('commune_id', 'Comuna') }}
            {{ Form::select('commune_id', $communes, null, ['class' => 'form-control'] ) }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('address', 'Dirección') }}
            {{ Form::text('address', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('phone1', 'Teléfono 1') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    {{ Form::text('phone1', null, ['class' => 'form-control']) }}
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('phone2', 'Teléfono 2') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-fax"></i>
                    </div>
                    {{ Form::text('phone2', null, ['class' => 'form-control']) }}
                </div>
                <!-- /.input group -->
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn bg-orange btn-flat btn-lg pull-right">Paso 2 <i class="fa fa-forward"></i></button>
