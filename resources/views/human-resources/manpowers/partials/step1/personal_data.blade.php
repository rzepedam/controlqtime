{{ Form::open(['route' => 'human-resources.manpowers.store', 'method' => 'POST', 'role' => 'form', 'id' => 'step1']) }}
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <!-- first row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('male_surname', 'Apellido Paterno') }}
                    {{ Form::text('male_surname', null, ['class' => 'form-control ', 'autofocus']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('female_surname', 'Apellido Materno') }}
                    {{ Form::text('female_surname', null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('first_name', 'Primer Nombre') }}
                    {{ Form::text('first_name', null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('second_name', 'Segundo Nombre') }}
                    {{ Form::text('second_name', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <!-- second row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle text-primary"></i>
                    {{ Form::text('rut', null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('birthday', 'Fecha de Nacimiento') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control " data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('forecast_id', 'Previsión') }}
                    {{ Form::select('forecast_id', $forecasts, null, ['class' => 'form-control '] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('country_id', 'Nacionalidad') }}
                    {{ Form::select('country_id', $countries, null, ['class' => 'form-control ']) }}
                </div>
            </div>

            <!-- third row -->
            <div class="row">
                <div class="col-md-3 form-group">
                    {{ Form::label('gender_id', 'Sexo') }}
                    {{ Form::select('gender_id', $genders, null, ['class' => 'form-control '] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('rating_id', 'Cargo') }}
                    {{ Form::select('rating_id', $ratings, null, ['class' => 'form-control '] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('subarea_id', 'Subárea') }}
                    {{ Form::select('subarea_id', ['Administración', 'Mantenimiento', 'Operaciones'], 0, ['class' => 'form-control '] ) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('commune_id', 'Comuna') }}
                    {{ Form::select('commune_id', $communes, null, ['class' => 'form-control '] ) }}
                </div>
            </div>

            <!-- four row -->
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('address', 'Dirección') }}
                    {{ Form::text('address', null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-md-3 form-group">
                    {{ Form::label('phone1', 'Teléfono 1') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text('phone1', null, ['class' => 'form-control ']) }}
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
                    </div>
                </div>
            </div>

            <!-- five row -->
            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, ['class' => 'form-control ']) }}
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <ul class="pager wizard">
        <li class="next"><a href="#" class="btn bg-orange btn-flat btn-lg pull-right">Paso 2 <i class="fa fa-forward"></i></a></li>
    </ul>
{{ Form::close() }}