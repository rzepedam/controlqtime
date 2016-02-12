
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-street-view"></i> Datos Personales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <!-- first row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('male_surname', 'Apellido Paterno') }}
                    {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control  required', 'autofocus']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('female_surname', 'Apellido Materno') }}
                    {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control required']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('first_name', 'Primer Nombre') }}
                    {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control required']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('second_name', 'Segundo Nombre') }}
                    {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control required']) }}
                </div>
            </div>

            <!-- second row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle text-primary"></i>
                    {{ Form::text('rut', Session::get('rut'), ['class' => 'form-control required']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('birthday', 'Fecha de Nacimiento') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control required', 'data-inputmask' => 'alias": "dd/mm/yyyy', 'data-mask' => '']) }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('country_id', 'Nacionalidad') }}
                    {{ Form::select('country_id', $countries, Session::get('country_id'), ['class' => 'form-control required']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('forecast_id', 'Previsión') }}
                    {{ Form::select('forecast_id', $forecasts, Session::get('forecast_id'), ['class' => 'form-control required'] ) }}
                </div>
            </div>

            <!-- third row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('gender_id', 'Sexo') }}
                    {{ Form::select('gender_id', $genders, Session::get('gender_id'), ['class' => 'form-control required'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('rating_id', 'Cargo') }}
                    {{ Form::select('rating_id', $ratings, Session::get('rating_id'), ['class' => 'form-control required'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('subarea_id', 'Subárea') }}
                    {{ Form::select('subarea_id', ['Administración', 'Mantenimiento', 'Operaciones'], Session::get('subarea_id'), ['class' => 'form-control required'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('commune_id', 'Comuna') }}
                    {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control required'] ) }}
                </div>
            </div>

            <!-- four row -->
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('address', 'Dirección') }}
                    {{ Form::text('address', Session::get('address'), ['class' => 'form-control required']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('phone1', 'Teléfono 1') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control required']) }}
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
            </div>

            <!-- five row -->
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('email', 'Email') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        {{ Form::email('email', Session::get('email'), ['class' => 'form-control required']) }}
                    </div>
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-asterisk"></i> Datos de Autenticación</h3>
        </div><!-- /.box-header -->
        <div class="box-body">


        </div>
    </div><!-- /.box -->


    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-child"></i> Parentescos Familiares</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_family_relationships">
                <h2 class="text-center text-light-blue">No existen Parentescos Familiares Asociados <br />
                    <small class="text-muted">(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h2>
                <br />
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_family_relationship" href="javascript: void(0)" onclick="$(this).addElementFamilyRelationship(this)" class="text-light-blue pull-right"><i class="fa fa-plus"></i> Agregar Parentesco Familiar</a>
                </div>
            </div>
            <p></p>

        </div>
    </div><!-- /.box -->
