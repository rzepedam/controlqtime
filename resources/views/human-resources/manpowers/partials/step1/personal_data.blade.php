{{ Form::open(['route' => 'human-resources.manpowers.step1', 'method' => 'POST', 'id' => 'step1']) }}

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <!-- first row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('male_surname', 'Apellido Paterno') }}
                    {{ Form::text('male_surname', Session::get('male_surname'), ['class' => 'form-control', 'autofocus']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('female_surname', 'Apellido Materno') }}
                    {{ Form::text('female_surname', Session::get('female_surname'), ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('first_name', 'Primer Nombre') }}
                    {{ Form::text('first_name', Session::get('first_name'), ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('second_name', 'Segundo Nombre') }}
                    {{ Form::text('second_name', Session::get('second_name'), ['class' => 'form-control']) }}
                </div>
            </div>

            <!-- second row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle text-primary"></i>
                    {{ Form::text('rut', Session::get('rut'), ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('birthday', 'Fecha de Nacimiento') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('birthday', Session::get('birthday'), ['class' => 'form-control']) }}
                        {{--<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">--}}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('forecast_id', 'Previsión') }}
                    {{ Form::select('forecast_id', $forecasts, Session::get('forecast_id'), ['class' => 'form-control'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('country_id', 'Nacionalidad') }}
                    {{ Form::select('country_id', $countries, Session::get('country_id'), ['class' => 'form-control']) }}
                </div>
            </div>

            <!-- third row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('gender_id', 'Sexo') }}
                    {{ Form::select('gender_id', $genders, Session::get('gender_id'), ['class' => 'form-control'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('rating_id', 'Cargo') }}
                    {{ Form::select('rating_id', $ratings, Session::get('rating_id'), ['class' => 'form-control'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('subarea_id', 'Subárea') }}
                    {{ Form::select('subarea_id', ['Administración', 'Mantenimiento', 'Operaciones'], Session::get('subarea_id'), ['class' => 'form-control'] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('commune_id', 'Comuna') }}
                    {{ Form::select('commune_id', $communes, Session::get('commune_id'), ['class' => 'form-control'] ) }}
                </div>
            </div>

            <!-- four row -->
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('address', 'Dirección') }}
                    {{ Form::text('address', Session::get('address'), ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('phone1', 'Teléfono 1') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text('phone1', Session::get('phone1'), ['class' => 'form-control']) }}
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
                    {{ Form::email('email', Session::get('email'), ['class' => 'form-control']) }}
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos de Autenticación</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

        </div>
    </div><!-- /.box -->

    <ul class="pager wizard">
        <li class="next"><a type="submit" class="btn bg-orange btn-flat btn-lg pull-right">Paso 2 <i class="fa fa-forward"></i></a></li>
    </ul>

{{ Form::close() }}