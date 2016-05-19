@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/jquery-wizard.css') }}
    {{ Html::style('assets/css/ribbon.css') }}
    {{ Html::style('assets/css/webui-popover.css') }}
    {{ Html::style('assets/css/bootstrap-datepicker.css') }}
    {{ Html::style('assets/css/cropper.css') }}
    {{ Html::style('assets/css/image-cropping.css') }}

@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.employees.index') }}"><i class="fa fa-users"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">

            {{-- Panel Wizard Form --}}
            <div id="form_new_manpower" class="wizard">

                {{-- Steps --}}
                <div class="steps wizard-steps steps-sm row" data-plugin="matchHeight" data-by-row="true"
                     role="tablist">
                    <div class="step col-md-4 current" data-target="#datos_personales" role="tab">
                        <span class="step-number">1</span>
                        <div class="step-desc">
                            <span class="step-title">Información</span>
                            <p>Personal</p>
                        </div>
                    </div>
                    <div class="step col-md-4" data-target="#competencias_laborales" role="tab">
                        <span class="step-number">2</span>
                        <div class="step-desc">
                            <span class="step-title">Competencias</span>
                            <p>Laborales</p>
                        </div>
                    </div>
                    <div class="step col-md-4" data-target="#info_salud" role="tab">
                        <span class="step-number">3</span>
                        <div class="step-desc">
                            <span class="step-title">Información</span>
                            <p>de Salud</p>
                        </div>
                    </div>
                </div>
                {{-- End Steps --}}

                {{-- Show Errors Validations --}}
                <div class="clearfix">
                    <div class="col-md-12 col-xs-12 alert alert-danger alert-dismissible hide" role="alert" id="js">
                    </div>
                </div>
                {{-- End Show Errors --}}

                {{-- Wizard Content --}}
                <div class="wizard-content">
                    <div class="wizard-pane active" id="datos_personales" role="tabpanel">

                        {{ Form::open(array("route" => "human-resources.employees.step1", "method" => "POST", "files" => true, "id" => "step1")) }}

                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-check-square-o text-primary"></i> Datos
                                    Personales</h3>
                            </div>
                            <div class="panel-body">

                                @include('human-resources.employees.partials.create.step1.personal_data')

                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-picture-o text-info"></i> Imagen de Perfil
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div id="perfilImgCropper" class="col-md-9 cropper text-center">

                                        <img src="{{ asset('assets/images/img-test1.jpg') }}" alt="">

                                    </div>
                                    <div class="col-md-3">
                                        <div class="cropper-preview clearfix" id="simpleCropperPreview">
                                            <div class="img-preview preview-lg img-rounded img-bordered img-bordered-primary"></div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <br/>

                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon md-male-female text-warning font-size-18"></i>
                                    Parentescos Familiares</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-warning add_family_relationship waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Parentesco Familiar</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_family_relationships">

                                    @if (Session::get('count_family_relationships') > 0)
                                        @for($i = 0; $i < Session::get('count_family_relationships'); $i++)

                                            @include('human-resources.employees.partials.create.step1.family_relationship')

                                        @endfor
                                    @else
                                        <br/>
                                        <h3 class="text-center text-warning">No existen Parentescos Familiares Asociados
                                            <br/>
                                            <small>(Pulse "Agregar Parentesco Familiar" para comenzar su adición)
                                            </small>
                                        </h3>
                                        <br/>
                                        <br/>
                                    @endif

                                </div>
                                <br/>

                            </div>
                        </div>
                        <div class="panel content-step">

                        </div>

                        {{ Form::close() }}

                    </div>
                    <div class="wizard-pane" id="competencias_laborales" role="tabpanel">

                        {{ Form::open(["route" => "human-resources.employees.step2", "method" => "POST", "id" => "step2"]) }}

                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon md-library text-info font-size-18"></i> Estudios
                                    Académicos</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-info add_study waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Estudio Académico</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_studies">

                                    @if (Session::get('count_studies') > 0)
                                        @for($i = 0; $i < Session::get('count_studies'); $i++)

                                            @include('human-resources.employees.partials.create.step2.study')

                                        @endfor
                                    @else
                                        <br/>
                                        <h3 class="text-center text-info">No existen Estudios Académicos Asociados <br/>
                                            <small>(Pulse "Agregar Estudio Académico" para comenzar su adición)</small>
                                        </h3>
                                        <br/>
                                        <br/>
                                    @endif

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon md-badge-check text-danger font-size-18"></i>
                                    Certificaciones</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-danger add_certification waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Certificación</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_certifications">

                                    @if (Session::get('count_certifications') > 0)
                                        @for($i = 0; $i < Session::get('count_certifications'); $i++)

                                            @include('human-resources.employees.partials.create.step2.certification')

                                        @endfor
                                    @else
                                        <br/>
                                        <h3 class="text-center text-danger">No existen Certificaciones Asociadas <br/>
                                            <small>(Pulse "Agregar Certificación" para comenzar su adición)</small>
                                        </h3>
                                        <br/>
                                        <br/>
                                    @endif

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-wrench text-warning"></i> Especialidades
                                </h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-warning add_speciality waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Especialidad</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_specialities">

                                    @if (Session::get('count_specialities') > 0)
                                        @for($i = 0; $i < Session::get('count_specialities'); $i++)

                                            @include('human-resources.employees.partials.create.step2.speciality')

                                        @endfor
                                    @else
                                        <br/>
                                        <h3 class="text-center text-warning">No existen Especialidades Asociadas <br/>
                                            <small>(Pulse "Agregar Especialidad" para comenzar su adición)</small>
                                        </h3>
                                        <br/>
                                        <br/>
                                    @endif

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-bookmark text-success"
                                                           style="font-size: 16px;"></i></i> Licencias Profesionales
                                </h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-success add_professional_license waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Licencia Profesional</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_licenses">

                                    @if (Session::get('count_professional_licenses') > 0)
                                        @for($i = 0; $i < Session::get('count_professional_licenses'); $i++)

                                            @include('human-resources.employees.partials.create.step2.professional_license')

                                        @endfor
                                    @else
                                        <br/>
                                        <h3 class="text-center text-success">No existen Licencias Profesionales
                                            Asociadas <br/>
                                            <small>(Pulse "Agregar Licencia Profesional" para comenzar su adición)
                                            </small>
                                        </h3>
                                        <br/>
                                        <br/>
                                    @endif

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel content-step">

                        </div>

                        {{ Form::close() }}

                    </div>
                    <div class="wizard-pane" id="info_salud" role="tabpanel">

                        {{ Form::open(["route" => "human-resources.employees.store", "method" => "POST", "id" => "step3"]) }}

                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-wheelchair text-warning"></i>
                                    Discapacidades</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-warning add_disabilities waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Discapacidad</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_disabilities">

                                    <br/>
                                    <h3 class="text-center text-warning">No existen Discapacidades Asociadas <br/>
                                        <small>(Pulse "Agregar Discapacidad" para comenzar su adición)</small>
                                    </h3>
                                    <br/>
                                    <br/>

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-bed text-success"></i> Enfermedades</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-success add_diseases waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Enfermedad</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_diseases">

                                    <br/>
                                    <h3 class="text-center text-success">No existen Enfermedades Asociadas <br/>
                                        <small>(Pulse "Agregar Enfermedad" para comenzar su adición)</small>
                                    </h3>
                                    <br/>
                                    <br/>

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-stethoscope text-info"></i> Exámenes
                                    Preocupacionales</h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-info add_exams waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Examen Preocupacional</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_exams">

                                    <br/>
                                    <h3 class="text-center text-info">No existen Exámenes Preocupacionales Asociados
                                        <br/>
                                        <small>(Pulse "Agregar Examen Preocupacional" para comenzar su adición)</small>
                                    </h3>
                                    <br/>
                                    <br/>

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon fa fa-child text-danger"></i> Cargas Familiares
                                </h3>
                                <div class="panel-actions">
                                    <span class="label label-outline label-danger add_family_responsability waves-effect waves-block"><i
                                                class="fa fa-plus"></i> Agregar Carga Familiar</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="content_family_responsabilities">

                                    <br/>
                                    <h3 class="text-center text-danger">No existen Cargas Familiares Asociadas <br/>
                                        <small>(Pulse "Agregar Carga Familiar" para comenzar su adición)</small>
                                    </h3>
                                    <br/>
                                    <br/>

                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="panel content-step">

                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
                {{-- End Wizard Content --}}

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources.employees.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('me/js/changeMethods/changeRegionProvince.js') }}
    {{ Html::script('assets/js/jquery.Rut.js') }}
    {{ Html::script('me/js/validations/validaRut.js') }}
    {{ Html::script('me/js/validations/validaEmail.js') }}
    {{ Html::script('assets/js/jquery.matchHeight-min.js') }}
    {{ Html::script('assets/js/jquery-wizard.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.es.min.js') }}
    {{ Html::script('assets/js/jquery.webui-popover.js') }}
    {{ Html::script('assets/js/cropper.min.js') }}
    {{ Html::script('assets/js/components/matchheight.js') }}
    {{ Html::script('me/js/validations/employees/step1.js') }}
    {{ Html::script('me/js/validations/employees/step2.js') }}
    {{ Html::script('me/js/validations/employees/step3.js') }}

    <script type="text/javascript">

        $(document).ready(function () {

            var count_family_relationships = {{ Session::get('count_family_relationships') ? Session::get('count_family_relationships') : 0  }};
            var count_studies = {{ Session::get('count_studies') ? Session::get('count_studies') : 0  }};
            var count_certifications = {{ Session::get('count_certifications') ? Session::get('count_certifications') : 0  }};
            var count_specialities = {{ Session::get('count_specialities') ? Session::get('count_specialities') : 0  }};
            var count_professional_licenses = {{ Session::get('count_professional_licenses') ? Session::get('count_professional_licenses') : 0  }};
            var count_disabilities = 0;
            var count_diseases = 0;
            var count_exams = 0;
            var count_family_responsabilities = 0;

            /**
             *  Constructor Wizard and Image Crop
             */

            var wizard = $('#form_new_manpower').wizard({}).data('wizard');

            $("#perfilImgCropper img").cropper({
                preview: "#simpleCropperPreview >.img-preview",
                //aspectRatio: 16 / 9,
                //background: false,
                responsive: true
            });

            /**
             *  Initializa date type (before and after today)
             */

            initializaComponentsWithDateBeforeCurrentDate();

            initializaComponentsWithDateAfterCurrentDate();

            function initializaComponentsWithDateBeforeCurrentDate() {

                $('.input-group.date.beforeCurrentDate').datepicker({
                    endDate: new Date(),
                });

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
            }

            function initializaComponentsWithDateAfterCurrentDate() {

                $('.input-group.date.afterCurrentDate').datepicker({
                    startDate: new Date(),
                });

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
            }

            /**
             *  Validation and Submit Step 1
             */

            wizard.get('#datos_personales').setValidator(function () {

                if (validateStep1()) {

                    var full_name = $('#first_name').val() + " " + $('#second_name').val() + " " + $('#male_surname').val() + " " + $('#female_surname').val();
                    var status = false;

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.employees.step1") }}',
                        data: $('#step1').serialize() + "&full_name=" + full_name + "&count_family_relationships=" + count_family_relationships,
                        async: false,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                status = true;
                            }
                        },
                        error: function (response) {
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });
                        }
                    });

                    return status;
                }

            });

            /**
             *  Validation and submit Step2
             */

            wizard.get('#competencias_laborales').setValidator(function () {

                if (validateStep2()) {

                    var status = false;

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.employees.step2") }}',
                        data: $('#step2').serialize() + "&count_studies=" + count_studies + "&count_certifications=" + count_certifications + "&count_specialities=" + count_specialities + "&count_professional_licenses=" + count_professional_licenses + "&count_disabilities=" + count_disabilities,
                        async: false,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                status = true;
                            }
                        },
                        error: function (response) {
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });
                        }
                    });

                    return status;
                }

            });

            /**
             *  Validation and submit Step3
             */

            wizard.get('#info_salud').setValidator(function () {

                if (validateStep3()) {

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.employees.store") }}',
                        data: $('#step3').serialize() + "&count_disabilities=" + count_disabilities + "&count_diseases=" + count_diseases + "&count_exams=" + count_exams + "&count_family_responsabilities=" + count_family_responsabilities,
                        async: false,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                console.log('...');
                                window.location.href = response.url;
                            }
                        },
                        error: function (response) {
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });
                        }
                    });
                }

            });

            /**
             *  Add Family Relationships
             */

            $('.add_family_relationship').click(function () {

                var family_relationship = '<span id="family_relationship"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_family_relationship" class="text-warning">Parentesco Familiar #' + (count_family_relationships + 1) + '</span> <a id="family_relationship" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Parentesco Familiar" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_family_relationship", "ID", ["class"=> "control-label"])}}{{Form::text("id_family_relationship[]", 0, ["id"=> "id_family_relationship", "class"=> "form-control"])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label('relationship_id[]', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label('employee_family_id[]', 'Nombre Familiar', ['class'=> 'control-label'])}}{{Form::select('employee_family_id[]', $employees, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

                if (count_family_relationships == 0)
                    $('#content_family_relationships').html(family_relationship);
                else
                    $('#content_family_relationships').append(family_relationship);

                $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationships);
                $('span#num_family_relationship').attr('id', 'num_family_relationship' + count_family_relationships);

                $('.tooltip-danger').tooltip();
                count_family_relationships++;

            });

            /**
             *  Add Study
             */

            $('.add_study').click(function () {

                var study = '<span id="study"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study" class="text-info">Estudio Académico #' + (count_studies + 1) + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('degree_id', 'Nivel Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div></div><br/></span>'

                if (count_studies == 0)
                    $('#content_studies').html(study);
                else
                    $('#content_studies').append(study);

                $('span#study').attr('id', 'study' + count_studies);
                $('span#num_study').attr('id', 'num_study' + count_studies);

                initializaComponentsWithDateBeforeCurrentDate();
                count_studies++;

            });

            /**
             *  Add Certifications
             */

            $('.add_certification').click(function () {

                var certification = '<span id="certification"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-danger alert-dismissible" role="alert"> <span id="num_certification" class="text-danger">Certificación #' + (count_certifications + 1) + '</span> <a id="certification" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Certificación" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_certification", "ID", ["class"=> "control-label"])}}{{Form::text("id_certification[]", 0, ["id"=> "id_certification", "class"=> "form-control"])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('type_certification_id', 'Tipo Certificación', ['class'=> 'control-label'])}}{{Form::select('type_certification_id[]', $type_certifications, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('institution_certification_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_certification_id[]', $institutions, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label('emission_certification', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_certification[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div><div class="col-md-2"> <div class="form-group">{{Form::label('expired_certification', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_certification[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div></div><br/></span>';

                if (count_certifications == 0)
                    $('#content_certifications').html(certification);
                else
                    $('#content_certifications').append(certification);

                $('span#certification').attr('id', 'certification' + count_certifications);
                $('span#num_certification').attr('id', 'num_certification' + count_certifications);

                initializaComponentsWithDateBeforeCurrentDate();
                initializaComponentsWithDateAfterCurrentDate();
                count_certifications++;

            });

            /**
             *  Add Specialities
             */

            $('.add_speciality').click(function () {

                var speciality = '<span id="speciality"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_speciality" class="text-warning">Especialidad #' + (count_specialities + 1) + '</span> <a id="speciality" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Especialidad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_speciality", "ID", ["class"=> "control-label"])}}{{Form::text("id_speciality[]", 0, ["id"=> "id_speciality", "class"=> "form-control"])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('type_speciality_id', 'Tipo Especialidad', ['class'=> 'control-label'])}}{{Form::select('type_speciality_id[]', $type_specialities, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('institution_speciality_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_speciality_id[]', $institutions, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label('emission_speciality', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_speciality[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div><div class="col-md-2"> <div class="form-group">{{Form::label('expired_speciality', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_speciality[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div></div><br/></span>';

                if (count_specialities == 0)
                    $('#content_specialities').html(speciality);
                else
                    $('#content_specialities').append(speciality);

                $('span#speciality').attr('id', 'speciality' + count_specialities);
                $('span#num_speciality').attr('id', 'num_speciality' + count_specialities);

                initializaComponentsWithDateBeforeCurrentDate();
                initializaComponentsWithDateAfterCurrentDate();
                count_specialities++;

            });

            /**
             *  Add Professional Licenses
             */

            $('.add_professional_license').click(function () {

                var professional_license = '<span id="license"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_license" class="text-success">Licencia Profesional #' + (count_professional_licenses + 1) + '</span> <a id="license" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Licencia Profesional" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_professional_license", "ID", ["class"=> "control-label"])}}{{Form::text("id_professional_license[]", 0, ["id"=> "id_professional_license", "class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('type_professional_license_id', 'Tipo Licencia', ['class'=> 'control-label'])}}{{Form::select('type_professional_license_id[]', $type_professional_licenses, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('emission_license', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_license[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_license', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_license[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div><div class="col-md-offset-1 col-md-2"> <div class="form-group">{{Form::label("is_donor", "Es donante?")}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 1, false)}}{{Form::label("is_donor", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 0, true)}}{{Form::label("is_donor", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label('detail_license', 'Restricciones', ['class'=> 'control-label'])}}{{Form::textarea('detail_license[]', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div></div><br/></span>';

                if (count_professional_licenses == 0)
                    $('#content_licenses').html(professional_license);
                else
                    $('#content_licenses').append(professional_license);

                $('span#license').attr('id', 'license' + count_professional_licenses);
                $('span#num_license').attr('id', 'num_license' + count_professional_licenses);

                /*
                 * Es donante ?
                 */

                $('input:radio[name=is_donor]').each(function () {
                    $(this).attr('name', 'is_donor' + count_professional_licenses);
                    $(this).attr('id', 'is_donor' + count_professional_licenses);
                });

                initializaComponentsWithDateBeforeCurrentDate();
                initializaComponentsWithDateAfterCurrentDate();
                count_professional_licenses++;

            });

            /**
             *  Add Disabilities
             */

            $('.add_disabilities').click(function () {

                var disability = '<span id="disability"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_disability" class="text-warning"> Discapacidad #' + (count_disabilities + 1) + '</span> <a id="disability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Discapacidad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_disability", "ID", ["class"=> "control-label"])}}{{Form::text("id_disability[]", 0, ["id"=> "id_disability", "class"=> "form-control"])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label("type_disability_id", "Tipo Discapacidad", ['class'=> 'control-label'])}}{{Form::select("type_disability_id[]", $type_disabilities, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disability", "Está en tratamiento?", ['class'=> 'control-label'])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 1, false)}}{{Form::label("treatment_disability", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 0, true)}}{{Form::label("treatment_disability", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disability", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disability[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

                if (count_disabilities == 0)
                    $('#content_disabilities').html(disability);
                else
                    $('#content_disabilities').append(disability);

                $('span#disability').attr('id', 'disability' + count_disabilities);
                $('span#num_disability').attr('id', 'num_disability' + count_disabilities);

                /*
                 * Está en Tratamiento ?
                 */

                $('input:radio[name=treatment_disability]').each(function () {
                    $(this).attr('name', 'treatment_disability' + count_disabilities);
                    $(this).attr('id', 'treatment_disability' + count_disabilities);
                });

                $('.tooltip-danger').tooltip();
                count_disabilities++;
            });

            /**
             *  Add Diseases
             */
            $('.add_diseases').click(function () {

                var disease = '<span id="disease"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_disease" class="text-success"> Enfermedad #' + (count_diseases + 1) + ' </span> <a id="disease" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Enfermedad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_disease", "ID", ["class"=> "control-label"])}}{{Form::text("id_disease[]", 0, ["id"=> "id_disease", "class"=> "form-control"])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label("type_disease_id", "Tipo Enfermedad", ['class'=> 'control-label'])}}{{Form::select("type_disease_id[]", $type_diseases, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disease", "Está en tratamiento?", ["class"=> "control-label"])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 1, false)}}{{Form::label("treatment_disease", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 0, true)}}{{Form::label("treatment_disease", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disease", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disease[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

                if (count_diseases == 0)
                    $('#content_diseases').html(disease);
                else
                    $('#content_diseases').append(disease);

                $('span#disease').attr('id', 'disease' + count_diseases);
                $('span#num_disease').attr('id', 'num_disease' + count_diseases);

                /*
                 * Está en Tratamiento ?
                 */

                $('input:radio[name=treatment_disease]').each(function (i) {
                    $(this).attr('name', 'treatment_disease' + count_diseases);
                    $(this).attr('id', 'treatment_disease' + count_diseases);
                });

                $('.tooltip-danger').tooltip();
                count_diseases++;

            });

            /**
             *  Add Exams
             */

            $('.add_exams').click(function () {

                var exam = '<span id="exam"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_exam" class="text-info"> Examen Preocupacional #' + (count_exams + 1) + ' </span> <a id="exam" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Examen Preocupacional" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_exam", "ID", ["class"=> "control-label"])}}{{Form::text("id_exam[]", 0, ["id"=> "id_exam", "class"=> "form-control"])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('type_exam_id', 'Tipo Examen', ['class'=> 'control-label'])}}{{Form::select('type_exam_id[]', $type_exams, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label('emission_exam', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_exam[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div><div class="col-md-2"> <div class="form-group">{{Form::label('expired_exam', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam[]', null, ['class'=> 'form-control', 'readonly'])}}</div></div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_exam", "Detalle Examen", ['class'=> 'control-label'])}}{{Form::textarea("detail_exam[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

                if (count_exams == 0)
                    $('#content_exams').html(exam);
                else
                    $('#content_exams').append(exam);

                $('span#exam').attr('id', 'exam' + count_exams);
                $('span#num_exam').attr('id', 'num_exam' + count_exams);

                initializaComponentsWithDateBeforeCurrentDate();
                initializaComponentsWithDateAfterCurrentDate();
                count_exams++;

            });

            /**
             *  Add Family Responsability
             */

            $('.add_family_responsability').click(function() {

                var family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-danger alert-dismissible" role="alert"><span id="num_family_responsability" class="text-danger"> Carga Familiar #' + (count_family_responsabilities + 1) + ' </span><a id="family_responsability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Carga Familiar" data-html="true"><i class="fa fa-trash"></i></a></div></div></div><div class="row"><div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_family_responsability", "ID", ["class"=> "control-label"])}}{{Form::text("id_family_responsability[]", 0, ["id"=> "id_family_responsability", "class"=> "form-control"])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label('name_responsability', 'Nombre Completo', ['class'=> 'control-label'])}}{{Form::text('name_responsability[]', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('rut_responsability', 'Rut', ['class'=> 'control-label'])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>{{Form::text('rut_responsability[]', null, ['class'=> 'form-control check_rut'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('relationship_id', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

                if (count_family_responsabilities == 0)
                    $('#content_family_responsabilities').html(family_responsability);
                else
                    $('#content_family_responsabilities').append(family_responsability);

                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsabilities);
                $('#content_family_responsabilities span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsabilities);

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
                count_family_responsabilities++;
            });

            /**
             * Delete elements
             */

            $(document).on('click', '.delete-elements', function () {

                var element = $(this).attr('id');
                var padre   = $(this).parent().parent().parent().parent().parent();
                $(this).parent().parent().parent().parent().remove();
                var span    = padre.children("span");

                switch (element) {
                    case 'family_relationship':

                        for (var i = 0; i < span.length; i++) {

                            var item = verificaUltimosNumeros(span[i].id);

                            $('span#num_family_relationship' + item).text('Parentesco Familiar #' + (i + 1));
                            $('span#num_family_relationship' + item).attr('id', 'num_family_relationship' + i);
                            $('span#family_relationship' + item).attr('id', 'family_relationship' + i);

                        }

                        count_family_relationships--;
                        if (count_family_relationships == 0) {
                            var html = '<br /><h3 class="text-center text-warning">No existen Parentescos Familiares Asociados <br /><small>(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h3><br /><br />'
                            $('#content_family_relationships').html(html);
                        }

                        break;

                    case 'study':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_study' + item).text('Estudio Académico #' + (i + 1));
                            $('span#num_study' + item).attr('id', 'num_study' + i);
                            $('span#study' + item).attr('id', 'study' + i);

                        }

                        count_studies--;
                        if (count_studies == 0) {
                            var html = '<br/> <h3 class="text-center text-info">No existen Estudios Académicos Asociados <br/><small>(Pulse "Agregar Estudio Académico" para comenzar su adición)</small></h3> <br/> <br/>'
                            $('#content_studies').html(html);
                        }

                        break;

                    case 'certification':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_certification' + item).text('Certificación #' + (i + 1));
                            $('span#num_certification' + item).attr('id', 'num_certification' + i);
                            $('span#certification' + item).attr('id', 'certification' + i);

                        }

                        count_certifications--;
                        if (count_certifications == 0) {
                            var html = '<br/> <h3 class="text-center text-danger">No existen Certificaciones Asociadas <br/><small>(Pulse "Agregar Certificación" para comenzar su adición)</small></h3> <br/> <br/>';
                            $('#content_certifications').html(html);
                        }

                        break;

                    case 'speciality':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_speciality' + item).text('Especialidad #' + (i + 1));
                            $('span#num_speciality' + item).attr('id', 'num_speciality' + i);
                            $('span#speciality' + item).attr('id', 'speciality' + i);

                        }

                        count_specialities--;
                        if (count_specialities == 0) {
                            var html = '<br/> <h3 class="text-center text-warning">No existen Especialidades Asociadas <br/><small>(Pulse "Agregar Especialidad" para comenzar su adición)</small></h3> <br/> <br/>';
                            $('#content_specialities').html(html);
                        }

                        break;

                    case 'license':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_license' + item).text('Licencia Profesional #' + (i + 1));
                            $('span#num_license' + item).attr('id', 'num_license' + i);
                            $('span#license' + item).attr('id', 'license' + i);

                            /*
                             * Es donante?
                             */

                            $('input:radio[name="is_donor' + item + '"]').each(function (j) {
                                $(this).attr('name', 'is_donor' + i);
                                $(this).attr('id', 'is_donor' + i);
                            });

                        }

                        count_professional_licenses--;
                        if (count_professional_licenses == 0) {
                            var html = '<br/> <h3 class="text-center text-success">No existen Licencias Profesionales Asociadas <br/><small>(Pulse "Agregar Licencia Profesional" para comenzar su adición)</small></h3> <br/> <br/>';
                            $('#content_licenses').html(html);
                        }

                        break

                    case 'disability':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_disability' + item).text('Discapacidad #' + (i + 1));
                            $('span#num_disability' + item).attr('id', 'num_disability' + i);
                            $('span#disability' + item).attr('id', 'disability' + i);

                            /*
                             * Está en tratamiento ?
                             */

                            $('input:radio[name="treatment_disability' + item + '"]').each(function (j) {
                                $(this).attr('name', 'treatment_disability' + i);
                                $(this).attr('id', 'treatment_disability' + i);
                            });

                        }

                        count_disabilities--;
                        if (count_disabilities == 0) {
                            var html = '<br/> <h3 class="text-center text-warning">No existen Discapacidades Asociadas <br/><small>(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h3> <br/> <br/>'
                            $('#content_disabilities').html(html);
                        }

                        break;

                    case 'disease':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_disease' + item).text('Enfermedad #' + (i + 1));
                            $('span#num_disease' + item).attr('id', 'num_disease' + i);
                            $('span#disease' + item).attr('id', 'disease' + i);

                            /*
                             * Está en tratamiento ?
                             */

                            $('input:radio[name="treatment_disease' + item + '"]').each(function (j) {
                                $(this).attr('name', 'treatment_disease' + i);
                                $(this).attr('id', 'treatment_disease' + i);
                            });

                        }

                        count_diseases--;
                        if (count_diseases == 0) {
                            var html = '<br/> <h3 class="text-center text-success">No existen Enfermedades Asociadas <br/><small>(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h3> <br/> <br/>'
                            $('#content_diseases').html(html);
                        }

                        break;

                    case 'exam':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_exam' + item).text('Examen Preocupacional #' + (i + 1));
                            $('span#num_exam' + item).attr('id', 'num_exam' + i);
                            $('span#exam' + item).attr('id', 'exam' + i);

                        }

                        count_exams--;
                        if (count_exams == 0) {
                            var html = '<br/> <h3 class="text-center text-info">No existen Exámenes Preocupacionales Asociados <br/><small>(Pulse "Agregar Examen Preocupacional" para comenzar su adición)</small></h3> <br/> <br/>'
                            $('#content_exams').html(html);
                        }

                        break;

                    case 'family_responsability':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_family_responsability' + item).text('Carga Familiar #' + (i + 1));
                            $('span#num_family_responsability' + item).attr('id', 'num_family_responsability' + i);
                            $('span#family_responsability' + item).attr('id', 'family_responsability' + i);

                        }

                        count_family_responsabilities--;
                        if (count_family_responsabilities == 0) {
                            var html = '<br/> <h3 class="text-center text-danger">No existen Cargas Familiares Asociadas <br/><small>(Pulse "Agregar Carga Familiar" para comenzar su adición)</small></h3> <br/> <br/>'
                            $('#content_family_responsabilities').html(html);
                        }

                        break;

                }

            });


            /*****************************************************************
             ************************** Validation ***************************
             *****************************************************************/


            /*
             * Validación
             */

            /*$('#step1')
             .formValidation('addField', 'relationship_id' + count_family_relationships, {
             validators: {
             notEmpty: {
             message: 'El campo Relación es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'manpower_family_id' + count_family_relationships, {
             validators: {
             notEmpty: {
             message: 'El campo Nombre Familiar es obligatorio.'
             },
             blank: {}
             }
             });


             count_family_relationships++;
             $('.mitooltip').tooltip();
             })

             .on('success.form.fv', function(event) {

             event.preventDefault();

             var full_name = $('#first_name').val() + " " + $('#second_name').val() + " " + $('#male_surname').val() + " " + $('#female_surname').val();

             var $form = $(event.target),
             fv =$form.data('formValidation');


             });*/


            /*$("#step2")
             .formValidation({
             framework: 'bootstrap'
             })

             .on('click', '.add_study', function() {

             $study = '<span id="study"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study" class="text-info">Estudio Académico #' + (count_studies + 1) + '</span> <a id="study" class="delete-elements pull-right mitooltip" title="Eliminar Estudio"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label('degree_id', 'Grado Académico', ['class'=> 'control-label'])}}{{Form::select('degree_id', $degrees, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-4"> <div class="form-group">{{Form::label('name_study', 'Nombre Estudio', ['class'=> 'control-label'])}}{{Form::text('name_study', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id', $institutions, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention', null, ['class'=> 'form-control'])}}</div></div></div></div><br/></span>';

             if (count_studies == 0)
             $('#content_studies').html($study);
             else
             $('#content_studies').append($study);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#study').attr('id', 'study' + count_studies);
             $('span#num_study').attr('id', 'num_study' + count_studies);

             /*
             * Grado Académico
             */

            /*$('label[for="degree_id"]').attr('for', 'degree_id' + count_studies);
             $('select#degree_id').each(function (i) {
             $(this).attr('id', 'degree_id' + count_studies);
             $(this).attr('name', 'degree_id' + count_studies);
             });

             /*
             * Name Study
             */

            /*$('label[for="name_study"]').attr('for', 'name_study' + count_studies);
             $('input#name_study').attr('name', 'name_study' + count_studies);
             $('input#name_study').attr('id', 'name_study' + count_studies);

             /*
             * Institution
             */

            /*$('label[for="institution_study_id"]').attr('for', 'institution_study_id' + count_studies);
             $('#content_studies select#institution_study_id').each(function (i) {
             $(this).attr('id', 'institution_study_id' + count_studies);
             $(this).attr('name', 'institution_study_id' + count_studies);
             });

             /*
             * Date
             */

            /*$('label[for="date_obtention"]').attr('for', 'date_obtention' + count_studies);
             $('input#date_obtention').attr('name', 'date_obtention' + count_studies);
             $('input#date_obtention').attr('id', 'date_obtention' + count_studies);

             /*
             * Validación
             */

            /*$('#step2')
             .formValidation('addField', 'degree_id' + count_studies, {
             validators: {
             notEmpty: {
             message: 'El campo Grado Académico es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'name_study' + count_studies, {
             validators: {
             notEmpty: {
             message: 'El campo Nombre Estudio es obligatorio.'
             },
             stringLength: {
             max: 100,
             message: 'El campo Nombre Estudio no debe ser mayor que 100 caracteres.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'institution_study_id' + count_studies, {
             validators: {
             notEmpty: {
             message: 'El campo Institución es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'date_obtention' + count_studies, {
             validators: {
             notEmpty: {
             message: 'El campo Fecha Obtención es obligatorio.'
             },
             blank: {}
             }
             });

             count_studies++;
             initializeComponentsWithDateBeforeCurrentDate();

             })

             .on('click', '.add_certification', function() {

             $certification = '<span id="certification"><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-danger alert-dismissible" role="alert"><span id="num_certification" class="text-danger">Certificación #' + (count_certifications + 1) + '</span><a id="certification" class="delete-elements pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a></div></div></div><div class="row"> <div class="col-md-5"> <div class="form-group">{{Form::label('type_certification_id', 'Tipo Certificación', ['class'=> 'control-label'])}}{{Form::select('type_certification_id', $type_certifications, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_certification', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_certification', null, ['class'=> 'form-control'])}}</div></div></div><div class="col-md-4"> <div class="form-group">{{Form::label('institution_certification_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_certification_id', $institutions, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

             if (count_certifications == 0)
             $('#content_certifications').html($certification);
             else
             $('#content_certifications').append($certification);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#certification').attr('id', 'certification' + count_certifications);
             $('span#num_certification').attr('id', 'num_certification' + count_certifications);

             /*
             * Tipo Certificación
             */

            /*$('label[for="type_certification_id"]').attr('for', 'type_certification_id' + count_certifications);
             $('select#type_certification_id').each(function(i) {
             $(this).attr('id', 'type_certification_id' + count_certifications);
             $(this).attr('name', 'type_certification_id' + count_certifications);
             });

             /*
             * Fecha Expiración
             */

            /*$('label[for="expired_certification"]').attr('for', 'expired_certification' + count_certifications);
             $('input#expired_certification').attr('name', 'expired_certification' + count_certifications);
             $('input#expired_certification').attr('id', 'expired_certification' + count_certifications);

             /*
             * Institución
             */

            /*$('label[for="institution_certification_id"]').attr('for', 'institution_certification_id' + count_certifications);
             $('#content_certifications select#institution_certification_id').each(function(i) {
             $(this).attr('id', 'institution_certification_id' + count_certifications);
             $(this).attr('name', 'institution_certification_id' + count_certifications);
             });

             /*
             * Validación
             */

            /*$('#step2')
             .formValidation('addField', 'type_certification_id' + count_certifications, {
             validators: {
             notEmpty: {
             message: 'El campo Tipo Certificación es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'expired_certification' + count_certifications, {
             validators: {
             notEmpty: {
             message: 'El campo Fecha Expiración es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'institution_certification_id' + count_certifications, {
             validators: {
             notEmpty: {
             message: 'El campo Institución es obligatorio.'
             },
             blank: {}
             }
             })


             count_certifications++;
             initializeComponentsWithDateAfterCurrentDate();

             })

             .on('click', '.add_speciality', function() {

             $speciality = '<span id="speciality"><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-warning alert-dismissible" role="alert"><span id="num_speciality" class="text-warning">Especialidad #' + (count_specialities + 1) + '</span><a id="speciality" class="delete-elements pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a></div></div></div><div class="row"> <div class="col-md-5"> <div class="form-group">{{Form::label('type_speciality_id', 'Tipo Especialidad', ['class'=> 'control-label'])}}{{Form::select('type_speciality_id', $type_specialities, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_speciality', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_speciality', null, ['class'=> 'form-control'])}}</div></div></div><div class="col-md-4"> <div class="form-group">{{Form::label('institution_speciality_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_speciality_id', $institutions, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

             if (count_specialities == 0)
             $('#content_specialities').html($speciality);
             else
             $('#content_specialities').append($speciality);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#speciality').attr('id', 'speciality' + count_specialities);
             $('span#num_speciality').attr('id', 'num_speciality' + count_specialities);

             /*
             * Tipo Especialidad
             */

            /*$('label[for="type_speciality_id"]').attr('for', 'type_speciality_id' + count_specialities);
             $('#content_specialities select#type_speciality_id').each(function(i) {
             $(this).attr('id', 'type_speciality_id' + count_specialities);
             $(this).attr('name', 'type_speciality_id' + count_specialities);
             });

             /*
             * Fecha Expiración
             */

            /*$('label[for="expired_speciality"]').attr('for', 'expired_speciality' + count_specialities);
             $('input#expired_speciality').attr('name', 'expired_speciality' + count_specialities);
             $('input#expired_speciality').attr('id', 'expired_speciality' + count_specialities);

             /*
             * Institución
             */

            /*$('label[for="institution_speciality_id"]').attr('for', 'institution_speciality_id' + count_specialities);
             $('#content_specialities select#institution_speciality_id').each(function(i) {
             $(this).attr('id', 'institution_speciality_id' + count_specialities);
             $(this).attr('name', 'institution_speciality_id' + count_specialities);
             });

             /*
             * Validación
             */

            /*$('#step2')
             .formValidation('addField', 'type_speciality_id' + count_specialities, {
             validators: {
             notEmpty: {
             message: 'El campo Tipo Especialidad es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'expired_speciality' + count_specialities, {
             validators: {
             notEmpty: {
             message: 'El campo Fecha Expiración es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'institution_speciality_id' + count_specialities, {
             validators: {
             notEmpty: {
             message: 'El campo Institución es obligatorio.'
             },
             blank: {}
             }
             })


             count_specialities++;
             initializeComponentsWithDateAfterCurrentDate();

             })

             .on('click', '.add_professional_license', function() {

             $license = '<span id="license"><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-success alert-dismissible" role="alert"><span id="num_license" class="text-success">Licencia Profesional #' + (count_professional_licenses + 1) + '</span><a id="license" class="delete-elements pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a></div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label('type_professional_license_id', 'Tipo Licencia', ['class'=> 'control-label'])}}{{Form::select('type_professional_license_id', $type_professional_licenses, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('emission_license', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_license', null, ['class'=> 'form-control'])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_license', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_license', null, ['class'=> 'form-control'])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("is_donor", "Es donante?")}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 1, false)}}{{Form::label("is_donor", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 0, true)}}{{Form::label("is_donor", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label('detail_license', 'Restricciones', ['class'=> 'control-label'])}}{{Form::textarea('detail_license', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div></div><br/></span>';

             if (count_professional_licenses == 0)
             $('#content_licenses').html($license);
             else
             $('#content_licenses').append($license);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#license').attr('id', 'license' + count_professional_licenses);
             $('span#num_license').attr('id', 'num_license' + count_professional_licenses);

             /*
             * Tipo de Licencia
             */

            /*$('label[for="type_professional_license_id"]').attr('for', 'type_professional_license_id' + count_professional_licenses);
             $('select#type_professional_license_id').each(function(i) {
             $(this).attr('id', 'type_professional_license_id' + count_professional_licenses);
             $(this).attr('name', 'type_professional_license_id' + count_professional_licenses);
             });

             /*
             * Fecha Emisión
             */

            /*$('label[for="emission_license"]').attr('for', 'emission_license' + count_professional_licenses);
             $('input#emission_license').attr('name', 'emission_license' + count_professional_licenses);
             $('input#emission_license').attr('id', 'emission_license' + count_professional_licenses);

             /*
             * Fecha Expiración
             */

            /*$('label[for="expired_license"]').attr('for', 'expired_license' + count_professional_licenses);
             $('input#expired_license').attr('name', 'expired_license' + count_professional_licenses);
             $('input#expired_license').attr('id', 'expired_license' + count_professional_licenses);

             /*
             * Es donante ?
             */

            /*$('input:radio[name=is_donor]').each(function(i){
             $(this).attr('name', 'is_donor' + count_professional_licenses);
             $(this).attr('id', 'is_donor' + count_professional_licenses);
             });

             /*
             * Detalle Licencia
             */

            /*$('label[for="detail_license"]').attr('for', 'detail_license' + count_professional_licenses);
             $('textarea#detail_license').attr('name', 'detail_license' + count_professional_licenses);
             $('textarea#detail_license').attr('id', 'detail_license' + count_professional_licenses);

             /*
             * Validación
             */

            /*$('#step2')
             .formValidation('addField', 'type_professional_license_id' + count_professional_licenses, {
             validators: {
             /*notEmpty: {
             message: 'El campo Tipo Licencia es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'expired_license' + count_professional_licenses, {
             validators: {
             /*notEmpty: {
             message: 'El campo Fecha Expiración es obligatorio.'
             },
             blank: {}
             }
             })


             count_professional_licenses++;

             /*
             * Inicializamos componente de fecha manualmente, ya que
             *
             * una debe ir antes de hoy y la otra después de hoy
             */

            /*$('.beforeCurrentDate').datepicker({
             format: 'dd-mm-yyyy',
             todayHighlight: true,
             language: 'es',
             autoclose: true,
             endDate: new Date(),
             todayBtn: true,
             });

             $('.afterCurrentDate').datepicker({
             format: 'dd-mm-yyyy',
             todayHighlight: true,
             language: 'es',
             autoclose: true,
             startDate: new Date(),
             todayBtn: true,
             });

             })

             .on('success.form.fv', function(event) {

             event.preventDefault();

             var $form = $(event.target),
             fv =$form.data('formValidation');

             $.ajax({
             type: 'POST',
             url: '{{-- route("human-resources.employees.step2") --}}',
             data: $('#step2').serialize() + "&count_studies=" + count_studies + "&count_certifications=" + count_certifications + "&count_specialities=" + count_specialities + "&count_professional_licenses=" + count_professional_licenses,
             async: false,
             dataType: 'json',
             success: function(response) {
             if (response.result === 'error') {
             $.each(response.fields, function (index, value) {
             fv
             .updateMessage(index, 'blank', value)
             .updateStatus(index, 'INVALID', 'blank');

             });
             }
             },

             beforeSend: function() {

             },

             error: function (data) {
             alert('error');
             }

             });
             });


             $("#step3")
             .formValidation({
             framework: 'bootstrap',
             })

             .on('click', '.add_disabilities', function() {

             $disability = '<span id="disability"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_disability" class="text-warning"> Discapacidad #' + (count_disabilities + 1) + '</span> <a id="disability" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("type_disability_id", "Tipo Discapacidad", ['class'=> 'control-label'])}}{{Form::select("type_disability_id", $type_disabilities, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disability", "Está en tratamiento?", ['class'=> 'control-label'])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 1, false)}}{{Form::label("treatment_disability", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 0, true)}}{{Form::label("treatment_disability", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disability", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disability", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

             if (count_disabilities == 0)
             $('#content_disabilities').html($disability);
             else
             $('#content_disabilities').append($disability);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#disability').attr('id', 'disability' + count_disabilities);
             $('span#num_disability').attr('id', 'num_disability' + count_disabilities);

             /*
             * Tipo Discapacidad
             */

            /*$('select#type_disability_id').each(function(i){
             $(this).attr('name', 'type_disability_id' + count_disabilities);
             $(this).attr('id', 'type_disability_id' + count_disabilities);
             });

             /*
             * Está en Tratamiento ?
             */

            /*$('input:radio[name=treatment_disability]').each(function(i){
             $(this).attr('name', 'treatment_disability' + count_disabilities);
             $(this).attr('id', 'treatment_disability' + count_disabilities);
             });

             /*
             * Detalle Discapacidad
             */

            /*$('label[for="detail_disability"]').attr('for', 'detail_disability' + count_disabilities);
             $('textarea#detail_disability').attr('name', 'detail_disability' + count_disabilities);
             $('textarea#detail_disability').attr('id', 'detail_disability' + count_disabilities);

             /*
             * Validación
             */

            /*$('#step3')
             .formValidation('addField', 'type_disability_id' + count_disabilities, {
             validators: {
             notEmpty: {
             message: 'El campo Tipo Discapacidad es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'treatment_disability' + count_disabilities, {
             validators: {
             notEmpty: {
             message: 'El campo Está en Tratamiento es obligatorio.'
             },
             blank: {}
             }
             })


             count_disabilities++;
             initializeComponentsWithDateBeforeCurrentDate();

             })

             .on('click', '.add_diseases', function() {

             $disease = '<span id="disease"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_disease" class="text-success"> Enfermedad #' + (count_diseases + 1) + ' </span> <a id="disease" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("type_disease_id", "Tipo Enfermedad", ['class'=> 'control-label'])}}{{Form::select("type_disease_id", $type_diseases, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disease", "Está en tratamiento?", ["class"=> "control-label"])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 1, false)}}{{Form::label("treatment_disease", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 0, true)}}{{Form::label("treatment_disease", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disease", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disease", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

             if (count_diseases == 0)
             $('#content_diseases').html($disease);
             else
             $('#content_diseases').append($disease);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#disease').attr('id', 'disease' + count_diseases);
             $('span#num_disease').attr('id', 'num_disease' + count_diseases);

             /*
             * Tipo Enfermedad
             */

            /*$('select#type_disease_id').each(function(i){
             $(this).attr('name', 'type_disease_id' + count_diseases);
             $(this).attr('id', 'type_disease_id' + count_diseases);
             });

             /*
             * Está en Tratamiento ?
             */

            /*$('input:radio[name=treatment_disease]').each(function(i){
             $(this).attr('name', 'treatment_disease' + count_diseases);
             $(this).attr('id', 'treatment_disease' + count_diseases);
             });

             /*
             * Detalle Enfermedad
             */

            /*$('label[for="detail_disease"]').attr('for', 'detail_disease' + count_diseases);
             $('textarea#detail_disease').attr('name', 'detail_disease' + count_diseases);
             $('textarea#detail_disease').attr('id', 'detail_disease' + count_diseases);

             /*
             * Validación
             */

            /*$('#step3')
             .formValidation('addField', 'type_disease_id' + count_diseases, {
             validators: {
             notEmpty: {
             message: 'El campo Tipo Enfermedad es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'treatment_disease' + count_diseases, {
             validators: {
             notEmpty: {
             message: 'El campo Está en Tratamiento es obligatorio.'
             },
             blank: {}
             }
             })


             count_diseases++;
             $('.mitooltip').tooltip();

             })

             .on('click', '.add_exams', function() {

             $exam = '<span id="exam"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_exam" class="text-info"> Examen Preocupacional #' + (count_exams + 1) + ' </span> <a id="exam" class="delete-elements pull-right mitooltip" title="Eliminar Examen"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-5"> <div class="form-group">{{Form::label('type_exam_id', 'Tipo Examen', ['class'=> 'control-label'])}}{{Form::select('type_exam_id', $type_exams, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_exam', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam', null, ['class'=> 'form-control'])}}</div></div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_exam", "Detalle Examen", ['class'=> 'control-label'])}}{{Form::textarea("detail_exam", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><br/></span>';

             if (count_exams == 0)
             $('#content_exams').html($exam);
             else
             $('#content_exams').append($exam);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('span#exam').attr('id', 'exam' + count_exams);
             $('span#num_exam').attr('id', 'num_exam' + count_exams);

             /*
             * Tipo de Examen
             */

            /*$('label[for="type_exam_id"]').attr('for', 'type_exam_id' + count_exams);
             $('select#type_exam_id').each(function(i) {
             $(this).attr('id', 'type_exam_id' + count_exams);
             $(this).attr('name', 'type_exam_id' + count_exams);
             });

             /*
             * Fecha Expiración
             */

            /*$('label[for="expired_exam"]').attr('for', 'expired_exam' + count_exams);
             $('input#expired_exam').attr('name', 'expired_exam' + count_exams);
             $('input#expired_exam').attr('id', 'expired_exam' + count_exams);

             /*
             * Detalle Examen
             */

            /*$('label[for="detail_exam"]').attr('for', 'detail_exam' + count_exams);
             $('textarea#detail_exam').attr('name', 'detail_exam' + count_exams);
             $('textarea#detail_exam').attr('id', 'detail_exam' + count_exams);

             /*
             * Validación
             */

            /*$('#step3')
             .formValidation('addField', 'type_exam_id' + count_exams, {
             validators: {
             notEmpty: {
             message: 'El campo Tipo Examen es obligatorio.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'expired_exam' + count_exams, {
             validators: {
             notEmpty: {
             message: 'El campo Fecha Expiración es obligatorio.'
             },
             blank: {}
             }
             })


             count_exams++;
             initializeComponentsWithDateAfterCurrentDate();

             })

             .on('click', '.add_family_responsability', function() {

             $family_responsability = '<span id="family_responsability"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-danger alert-dismissible" role="alert"><span id="num_family_responsability" class="text-danger"> Carga Familiar #' + (count_family_responsabilities + 1) + ' </span> <a id="family_responsability" class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label('name_responsability', 'Nombre Completo', ['class'=> 'control-label'])}}{{Form::text('name_responsability', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('rut_responsability', 'Rut', ['class'=> 'control-label'])}}{{Form::text('rut_responsability', null, ['class'=> 'form-control check_rut'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('relationship_id', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id', $relationships, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

             if (count_family_responsabilities == 0)
             $('#content_family_responsabilities').html($family_responsability);
             else
             $('#content_family_responsabilities').append($family_responsability);

             /*
             * Div Contenedor, Nº elemento
             */

            /*$('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsabilities);
             $('#content_family_responsabilities span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsabilities);

             /*
             * Nombre Completo
             */

            /*$('label[for="name_responsability"]').attr('for', 'name_responsability' + count_family_responsabilities);
             $('input#name_responsability').attr('name', 'name_responsability' + count_family_responsabilities);
             $('input#name_responsability').attr('id', 'name_responsability' + count_family_responsabilities);

             /*
             * Rut
             */

            /*$('label[for="rut_responsability"]').attr('for', 'rut_responsability' + count_family_responsabilities);
             $('input#rut_responsability').attr('name', 'rut_responsability' + count_family_responsabilities);
             $('input#rut_responsability').attr('id', 'rut_responsability' + count_family_responsabilities);

             /*
             * Relación
             */

            /*$('label[for="relationship_id"]').attr('for', 'relationship_id' + count_family_responsabilities);
             $('select#relationship_id').attr('name', 'relationship_id' + count_family_responsabilities);
             $('select#relationship_id').attr('id', 'relationship_id' + count_family_responsabilities);

             /*
             * Validación
             */

            /*$('#step3')
             .formValidation('addField', 'name_responsability' + count_family_responsabilities, {
             validators: {
             notEmpty: {
             message: 'El campo Nombre Completo es obligatorio.'
             },
             stringLength: {
             max: 120,
             message: 'El campo Nombre Completo no debe ser mayor que 120 caracteres.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'rut_responsability' + count_family_responsabilities, {
             validators: {
             notEmpty: {
             message: 'El campo Rut es obligatorio.'
             },
             stringLength: {
             max: 15,
             message: 'El campo Rut no debe ser mayor que 15 caracteres.'
             },
             blank: {}
             }
             })
             .formValidation('addField', 'relationship_id' + count_family_responsabilities, {
             validators: {
             notEmpty: {
             message: 'El campo Relación es obligatorio.'
             },
             blank: {}
             }
             })


             count_family_responsabilities++;
             $('.mitooltip').tooltip();

             })

             .on('success.form.fv', function(event) {

             event.preventDefault();

             var $form = $(event.target),
             fv = $form.data('formValidation');

             $.ajax({
             type: 'POST',
             url: '{{-- route("human-resources.employees.store") --}}',
             data: $('#step3').serialize() + '&count_disabilities=' + count_disabilities + '&count_diseases=' + count_diseases + "&count_exams=" + count_exams + "&count_family_responsabilities=" + count_family_responsabilities,
             async: false,
             dataType: 'json',
             success: function(response) {
             if (response.result === 'error') {
             $.each(response.fields, function (index, value) {
             fv
             .updateMessage(index, 'blank', value)
             .updateStatus(index, 'INVALID', 'blank');

             });
             }

             /*
             * Redirección a Home
             */

            /*window.location.href = response[0].url;

             },

             beforeSend: function() {

             },

             error: function (data) {
             alert('error');
             }

             });
             });


             /*****************************************************************
             ************************ Fin Validations ************************
             *****************************************************************/

        });

    </script>
@stop