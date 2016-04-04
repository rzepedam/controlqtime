@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/jquery-wizard.css') }}
    {{ Html::style('assets/css/formValidation.css') }}
    {{ Html::style('assets/css/ribbon.css') }}
    {{ Html::style('assets/css/webui-popover.css') }}

@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-users"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div class="row">
        <div class="col-md-12">
            <!-- Panel Wizard Form -->
            <div id="form_new_manpower">
                <!-- Steps -->
                <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
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
                <!-- End Steps -->
                <!-- Wizard Content -->
                <div class="wizard-content">
                    <div class="wizard-pane active" id="datos_personales" role="tabpanel">
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-check-square-o text-primary"></i> Datos Personales</h3>
                            </div>
                            <div class="panel-body">

                                {{ Form::open(["route" => "human-resources.manpowers.step1", "method" => "POST", "files" => true, "id" => "step1"]) }}

                                        @include('human-resources.manpowers.partials.step1.personal_data')

                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-picture-o text-info"></i> Imagen de Perfil</h3>
                            </div>
                            <div class="panel-body">

                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />

                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <div class="panel-actions">
                                    <span class="label label-outline label-warning add_family_relationship waves-effect waves-block" onclick="$(this).addElementFamilyRelationship(this)"><i class="fa fa-plus"></i> Agregar Parentesco Familiar</span>
                                </div>
                                <h3 class="panel-title"><i class="fa fa-child text-warning"></i> Parentescos Familiares</h3>
                            </div>
                            <div class="panel-body">
                                <div id="content_family_relationships">

                                    @if (Session::get('relationship_id') != null)
                                        @for($i = 0; $i < count(Session::get('relationship_id')); $i++)

                                            @include('human-resources.manpowers.partials.step1.family_relationship')

                                        @endfor
                                    @else
                                        <br />
                                        <h3 class="text-center text-warning">No existen Parentescos Familiares Asociados <br /><small>(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h3>
                                        <br />
                                        <br />
                                    @endif

                                </div>
                                <br />

                                {{ Form::close() }}

                            </div>
                        </div>
                        <div class="panel content-step">

                        </div>
                    </div>
                </div>
                <div class="wizard-pane" id="competencias_laborales" role="tabpanel">
                    {{ Form::open(["route" => "human-resources.manpowers.step2", "method" => "POST", "id" => "step2"]) }}

                        <div class="alert alert-info alert-alt alert-dismissible" role="alert">
                            <span><i class="icon md-library" style="font-size: 16px;"></i> <strong>Estudios Académicos</strong></span>
                            <span class="label label-outline label-info add_study waves-effect waves-block" onclick="$(this).addElementStudy(this)"><i class="fa fa-plus"></i> Agregar Estudio Académico</span>
                        </div>
                        <div id="content_studies">
                            @if (Session::get('degree_id') != null)
                                @for($i = 0; $i < count(Session::get('degree_id')); $i++)

                                    @include('human-resources.manpowers.partials.step2.study')

                                @endfor
                            @else
                                <br />
                                <h3 class="text-center text-info">No existen Estudios Académicos Asociados <br /><small>(Pulse "Agregar Estudio Académico" para comenzar su adición)</small></h3>
                                <br />
                                <br />
                            @endif
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-danger alert-alt alert-dismissible" role="alert">
                            <span><i class="icon md-badge-check" style="font-size: 16px;"></i> <strong>Certificaciones</strong></span>
                            <span class="label label-outline label-danger add_certification waves-effect waves-block" onclick="$(this).addElementCertification(this)"><i class="fa fa-plus"></i> Agregar Certificación</span>
                        </div>
                        <div id="content_certifications">
                            @if (Session::get('certification_id') != null)
                                @for($i = 0; $i < count(Session::get('certification_id')); $i++)

                                    @include('human-resources.manpowers.partials.step2.certification')

                                @endfor
                            @else
                                <br />
                                <h3 class="text-center text-danger">No existen Certificaciones Asociadas <br /><small>(Pulse "Agregar Certificación" para comenzar su adición)</small></h3>
                                <br />
                                <br />
                            @endif
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-warning alert-alt alert-dismissible" role="alert">
                            <span><i class="fa fa-wrench"></i> <strong>Especialidades</strong></span>
                            <!-- Utilizo misma clase de FamilyRelationship para reutilizar atributos -->
                            <span class="label label-outline label-warning add_family_relationship waves-effect waves-block" onclick="$(this).addElementSpeciality(this)"><i class="fa fa-plus"></i> Agregar Especialidad</span>
                        </div>
                        <div id="content_specialities">
                            @if (Session::get('speciality_id') != null)
                                @for($i = 0; $i < count(Session::get('speciality_id')); $i++)

                                    @include('human-resources.manpowers.partials.step2.speciality')

                                @endfor
                            @else
                                <br />
                                <h3 class="text-center text-warning">No existen Especialidades Asociadas <br /><small>(Pulse "Agregar Especialidad" para comenzar su adición)</small></h3>
                                <br />
                                <br />
                            @endif
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-success alert-alt alert-dismissible" role="alert">
                            <span><i class="icon md-account-calendar" style="font-size: 16px;"></i> <strong>Licencias Profesionales</strong></span>
                            <span class="label label-outline label-success add_license waves-effect waves-block" onclick="$(this).addElementProfessionalLicense(this)"><i class="fa fa-plus"></i> Agregar Licencia Profesional</span>
                        </div>
                        <div id="content_licenses">
                            @if (Session::get('professional_license_id') != null)
                                @for($i = 0; $i < count(Session::get('professional_license_id')); $i++)

                                    @include('human-resources.manpowers.partials.step2.professional_license')

                                @endfor
                            @else
                                <br />
                                <h3 class="text-center text-success">No existen Licencias Profesionales Asociadas <br /><small>(Pulse "Agregar Licencia Profesional" para comenzar su adición)</small></h3>
                                <br />
                                <br />
                            @endif
                        </div>
                        <br />

                    {{ Form::close() }}

                </div>
                <div class="wizard-pane" id="info_salud" role="tabpanel">
                    {{ Form::open(["route" => "human-resources.manpowers.store", "method" => "POST", "id" => "step3"]) }}

                        <div class="alert alert-warning alert-alt alert-dismissible" role="alert">
                            <span><i class="fa fa-wheelchair"></i> <strong>Discapacidades</strong></span>
                            <!-- Utilizo misma clase de FamilyRelationship para reutilizar atributos -->
                            <span class="label label-outline label-warning add_family_relationship waves-effect waves-block" onclick="$(this).addElementDisability(this)"><i class="fa fa-plus"></i> Agregar Discapacidad</span>
                        </div>
                        <div id="content_disabilities">
                            <br />
                            <h3 class="text-center text-warning">No existen Discapacidades Asociadas <br /><small>(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h3>
                            <br />
                            <br />
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-success alert-alt alert-dismissible" role="alert">
                            <span><i class="fa fa-bed"></i> <strong>Enfermedades</strong></span>
                            <!-- Utilizo misma clase de LicenciasProfesionales para reutilizar atributos -->
                            <span class="label label-outline label-success add_license waves-effect waves-block" onclick="$(this).addElementDisease(this)"><i class="fa fa-plus"></i> Agregar Enfermedad</span>
                        </div>
                        <div id="content_diseases">
                            <br />
                            <h3 class="text-center text-success">No existen Enfermedades Asociadas <br /><small>(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h3>
                            <br />
                            <br />
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-info alert-alt alert-dismissible" role="alert">
                            <span><i class="fa fa-stethoscope"></i> <strong>Exámenes Preocupacionales</strong></span>
                            <!-- Utilizo misma clase de EstudiosAcadémicos para reutilizar atributos -->
                            <span class="label label-outline label-info add_study waves-effect waves-block" onclick="$(this).addElementExam(this)"><i class="fa fa-plus"></i> Agregar Examen Preocupacional</span>
                        </div>
                        <div id="content_exams">
                            <br />
                            <h3 class="text-center text-info">No existen Exámenes Preocupacionales Asociados <br /><small>(Pulse "Agregar Examen Preocupacional" para comenzar su adición)</small></h3>
                            <br />
                            <br />
                        </div>
                        <br />
                        <br />
                        <div class="alert alert-danger alert-alt alert-dismissible" role="alert">
                            <span><i class="fa fa-child"></i> <strong>Cargas Familiares</strong></span>
                            <!-- Utilizo misma clase de Certificaciones para reutilizar atributos -->
                            <span class="label label-outline label-danger add_certification waves-effect waves-block" onclick="$(this).addElementFamilyResponsability(this)"><i class="fa fa-plus"></i> Agregar Carga Familiar</span>
                        </div>
                        <div id="content_family_responsabilities">
                            <br />
                            <h3 class="text-center text-danger">No existen Cargas Familiares Asociadas <br /><small>(Pulse "Agregar Carga Familiar" para comenzar su adición)</small></h3>
                            <br />
                            <br />
                        </div>
                        <br />

                    {{ Form::close() }}

                </div>
            </div>
            <!-- End Wizard Content -->
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/inputmask.js') }}
    {{ Html::script('assets/js/inputmask.date.extensions.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/formValidation.js') }}
    {{ Html::script('assets/js/form-validation/bootstrap.js') }}
    {{ Html::script('assets/js/jquery.matchHeight-min.js') }}
    {{ Html::script('assets/js/jquery-wizard.js') }}
    {{ Html::script('assets/js/jquery.webui-popover.js') }}
    {{ Html::script('assets/js/components/jquery-wizard.js') }}
    {{ Html::script('assets/js/components/matchheight.js') }}
    {{ Html::script('assets/js/components/webui-popover.js') }}


    <script type="text/javascript">

        $(document).ready(function() {


            /******************************************************************
             *************************** Variables ****************************
             ******************************************************************/

            var count_family_relationships = {{ count(Session::get('relationship_id')) ? count(Session::get('relationship_id')) : 0  }};
            var count_studies = {{ count(Session::get('degree_id')) ? count(Session::get('degree_id')) : 0  }};
            var count_certifications = {{ count(Session::get('certification_id')) ? count(Session::get('certification_id')) : 0  }};
            var count_specialities = {{ count(Session::get('speciality_id')) ? count(Session::get('speciality_id')) : 0  }};
            var count_licenses = {{ count(Session::get('professional_license_id')) ? count(Session::get('professional_license_id')) : 0  }};
            var count_disabilities = {{ Session::get('count_disabilities') ? Session::get('count_disabilities') : 0  }};
            var count_diseases = {{ Session::get('count_diseases') ? Session::get('count_diseases') : 0  }};
            var count_exams = 0;
            var count_family_responsabilities = {{ Session::get('count_family_responsabilities') ? Session::get('count_family_responsabilities') : 0  }};


            /******************************************************************
             ********************* Initialize components ***********************
             ******************************************************************/

            var defaults = $.components.getDefaults("wizard");

            var options = $.extend(true, {}, defaults, {
                buttonsAppendTo: '.content-step'
            });

            var wizard = $("#form_new_manpower").wizard(options).data('wizard');

            wizard.get("#datos_personales").setValidator(function() {
                var fv = $("#step1").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            wizard.get("#competencias_laborales").setValidator(function() {
                var fv = $("#step2").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            wizard.get("#info_salud").setValidator(function() {
                var fv = $("#step3").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            initializeComponents();


            function initializeComponents() {

                $('.mitooltip').tooltip();

                $('.data_mask').inputmask({
                    placeholder: 'dd-mm-yyyy',
                    alias: "dd-mm-yyyy",
                    "clearIncomplete": true,
                    yearrange: {minyear: 1900, maxyear: (new Date()).getFullYear()}
                });

            }


            /******************************************************************
             ************************ Delete elements *************************
             ******************************************************************/


            $(document).on('click', '.icono-eliminar-elementos', function () {

                var element = $(this).attr('id');
                var padre = $(this).parent().parent().parent().parent();
                $(this).parent().parent().parent().remove();
                var span = padre.children("span");

                switch (element) {
                    case 'family_relationship':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

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

                            $('span#num_license' + item).text('Licencia #' + (i + 1));
                            $('span#num_license' + item).attr('id', 'num_license' + i);
                            $('span#license' + item).attr('id', 'license' + i);

                        }

                        count_licenses--;
                        if (count_licenses == 0) {
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
             **************** Add Family Relationship zone ***************
             *****************************************************************/


            $.fn.addElementFamilyRelationship = function () {

                $family_relationship = '<span id="family_relationship"><div class="row"><div class="col-md-12"><span id="num_family_relationship" class="text-warning titulo-seccion">Parentesco Familiar #' + (count_family_relationships + 1) + '</span><a id="family_relationship" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Parentesco"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label('relationship_id', 'Parentesco Familiar')}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-6"><div class="form-group">{{Form::label('manpower_id', 'Nombre')}}{{Form::select('manpower_id[]', $manpowers, null, ['class'=> 'form-control', 'required'])}}</div></div></div><hr/></span>';

                if (count_family_relationships == 0)
                    $('#content_family_relationships').html($family_relationship);
                else
                    $('#content_family_relationships').append($family_relationship);


                $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationships);
                $('span#num_family_relationship').attr('id', 'num_family_relationship' + count_family_relationships);

                count_family_relationships++;
                initializeComponents();
            }



            /*****************************************************************
             ************************ Add Studies zone ***********************
             *****************************************************************/


            $.fn.addElementStudy = function () {

                $study = '<span id="study"><div class="row"><div class="col-md-12"><span id="num_study" class="text-info titulo-seccion">Estudio Académico #' + (count_studies + 1) + '</span><a id="study" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Estudio"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-3"><div class="form-group">{{Form::label('degree_id', 'Grado Académico')}}{{Form::select('degree_id[]', $degrees, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-4"><div class="form-group">{{Form::label('name_study', 'Nombre')}}{{Form::text('name_study[]', null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('institution_study_id', 'Institución')}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label('date', 'Fecha Obtención')}}<div class="input-group"> <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>{{Form::text('date[]', null, ['class'=> 'form-control data_mask', 'required'])}}</div></div></div></div><hr/></span>';

                if (count_studies == 0)
                    $('#content_studies').html($study);
                else
                    $('#content_studies').append($study);


                $('span#study').attr('id', 'study' + count_studies);
                $('span#num_study').attr('id', 'num_study' + count_studies);

                count_studies++;
                initializeComponents();
            }



            /*****************************************************************
             ********************* Add Certifications zone *******************
             *****************************************************************/


            $.fn.addElementCertification = function() {

                $certification = '<span id="certification"><div class="row"><div class="col-md-12"><span id="num_certification" class="text-danger titulo-seccion">Certificación #' + (count_certifications + 1) + '</span><a id="certification" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-5"><div class="form-group">{{Form::label('certification_id', 'Certificación')}}{{Form::select('certification_id[]', $certifications, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('expired_certification', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_certification[]', null, ['class'=> 'form-control data_mask', 'required'])}}</div></div></div><div class="col-md-4"><div class="form-group">{{Form::label('institution_certification_id', 'Institución')}}{{Form::select('institution_certification_id[]', $institutions, null, ['class'=> 'form-control', 'required'])}}</div></div></div><hr/></span>';

                if (count_certifications == 0)
                    $('#content_certifications').html($certification);
                else
                    $('#content_certifications').append($certification);


                $('span#certification').attr('id', 'certification' + count_certifications);
                $('span#num_certification').attr('id', 'num_certification' + count_certifications);

                count_certifications++;
                initializeComponents();
            }



            /*****************************************************************
             ********************** Add Specialities zone ********************
             *****************************************************************/


            $.fn.addElementSpeciality = function() {

                $speciality = '<span id="speciality"><div class="row"><div class="col-md-12"><span id="num_speciality" class="text-warning titulo-seccion">Especialidad #' + (count_specialities + 1) + '</span><a id="speciality" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-5"><div class="form-group">{{Form::label('speciality_id', 'Especialidad')}}{{Form::select('speciality_id[]', $specialities, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('expired_speciality', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i></div>{{Form::text('expired_speciality[]', null, ['class'=> 'form-control data_mask', 'required'])}}</div></div></div><div class="col-md-4"><div class="form-group">{{Form::label('institution_speciality_id', 'Institución')}}{{Form::select('institution_speciality_id[]', $institutions, null, ['class'=> 'form-control', 'required'])}}</div></div></div><hr/></span>';

                if (count_specialities == 0)
                    $('#content_specialities').html($speciality);
                else
                    $('#content_specialities').append($speciality);


                $('span#speciality').attr('id', 'speciality' + count_specialities);
                $('span#num_speciality').attr('id', 'num_speciality' + count_specialities);

                count_specialities++;
                initializeComponents();
            }



            /*****************************************************************
             ************************ Add Licenses zone **********************
             *****************************************************************/


            $.fn.addElementProfessionalLicense = function() {

                $license = '<span id="license"><div class="row"><div class="col-md-12"><span id="num_license" class="text-success titulo-seccion">Licencia Profesional #' + (count_licenses + 1) + '</span><a id="license" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-4"><div class="form-group">{{Form::label('professional_license_id', 'Tipo Licencia')}}{{Form::select('professional_license_id[]', $professional_licenses, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('expired_license', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>{{Form::text('expired_license[]', null, ['class'=> 'form-control data_mask', 'required'])}}</div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group">{{Form::label('detail_license', 'Detalle')}}{{Form::textarea('detail_license[]', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div></div><hr/></span>';

                if (count_licenses == 0)
                    $('#content_licenses').html($license);
                else
                    $('#content_licenses').append($license);


                $('span#license').attr('id', 'license' + count_licenses);
                $('span#num_license').attr('id', 'num_license' + count_licenses);

                count_licenses++;

                /*
                * Validamos manualmente porque la fecha de vencimiento
                * de la licencia debe ser superior al día actual
                */

                initializeComponents();

                /*$('.mitooltip').tooltip();

                var d = new Date();
                var now = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

                $('.data_mask').inputmask({
                    placeholder: 'dd-mm-yyyy',
                    alias: "dd-mm-yyyy",
                    "clearIncomplete": true,
                    yearrange: {minyear: (new Date()).getFullYear() }
                });*/
            }



            /*****************************************************************
             ********************** Add Disability zone **********************
             *****************************************************************/


            $.fn.addElementDisability = function() {

                $disability = '<span id="disability"> <div class="row"> <div class="col-md-12"> <span id="num_disability" class="text-warning titulo-seccion"> Discapacidad #' + (count_disabilities + 1) + '</span> <a id="disability" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a> </div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("disability_id", "Discapacidad")}}{{Form::select("disability_id[]", $disabilities, null, ["class"=> "form-control", "required"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disability", "Está en tratamiento?")}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", "si", true)}}{{Form::label("treatment_disability", "Si")}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", "no", false)}}{{Form::label("treatment_disability", "No")}}</div></li></ul> </div></div></div><div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disability[]", "Detalle")}}{{Form::textarea("detail_disability[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><hr/></span>';

                if (count_disabilities == 0)
                    $('#content_disabilities').html($disability);
                else
                    $('#content_disabilities').append($disability);

                /*
                 * Enumeramos radio, ya que al haber más de una discapacidad,
                 *
                 * no es posible capturar el valor de cada uno en backend
                 */

                $('input:radio[name=treatment_disability]').each(function(i){
                    $(this).attr('name', 'treatment_disability' + count_disabilities);
                    $(this).attr('id', 'treatment_disability' + count_disabilities);
                });

                $('#content_disabilities span#disability').attr('id', 'disability' + count_disabilities);
                $('span#num_disability').attr('id', 'num_disability' + count_disabilities);

                count_disabilities++;
                initializeComponents();

            };



            /*****************************************************************
             *********************** Add Disease zone ************************
             *****************************************************************/


            $.fn.addElementDisease = function() {

                $disease = '<span id="disease"> <div class="row"> <div class="col-md-12"> <span id="num_disease" class="text-success titulo-seccion"> Enfermedad #' + (count_diseases + 1) + ' </span> <a id="disease" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a> </div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("disease_id", "Nombre")}}{{Form::select("disease_id[]", $diseases, null, ["class"=> "form-control", "required"])}}</div></div><div class="col-md-6 text-center"> <div class="form-group">{{Form::label("treatment_disease", "Está en tratamiento?")}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", "si", true)}}{{Form::label("treatment_disease", "Si")}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", "no", false)}}{{Form::label("treatment_disease", "No")}}</div></li></ul> </div></div></div><br/> <div class="row"> <div class="col-md-12"> <div class="form-group">{{Form::label("detail_disease", "Detalle")}}{{Form::textarea("detail_disease[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><hr/></span>';

                if (count_diseases == 0)
                    $('#content_diseases').html($disease);
                else
                    $('#content_diseases').append($disease);


                $('#content_diseases span#disease').attr('id', 'disease' + count_diseases);
                $('span#num_disease').attr('id', 'num_disease' + count_diseases);

                $('input:radio[name=treatment_disease]').each(function(i){
                    $(this).attr('name', 'treatment_disease' + count_diseases);
                    $(this).attr('id', 'treatment_disease' + count_diseases);
                });

                count_diseases++;
                initializeComponents();
            }



            /*****************************************************************
             ************************* Add Exams zone ************************
             *****************************************************************/


            $.fn.addElementExam = function() {

                $exam = '<span id="exam"> <div class="row"> <div class="col-md-12"> <span id="num_exam" class="text-info titulo-seccion"> Examen Preocupacional #' + (count_exams + 1) + ' </span> <a id="exam" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Examen"><i class="fa fa-trash"></i></a> </div></div><br/> <div class="row"> <div class="col-md-5"> <div class="form-group">{{Form::label('exam_id', 'Examen')}}{{Form::select('exam_id', $exams, null, ['class'=> 'form-control', "required"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('expired_exam', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam', null, ['class'=> 'form-control data_mask', "required"])}}</div></div></div></div><hr/></span>';

                if (count_exams == 0)
                    $('#content_exams').html($exam);
                else
                    $('#content_exams').append($exam);


                $('span#exam').attr('id', 'exam' + count_exams);
                $('span#num_exam').attr('id', 'num_exam' + count_exams);

                count_exams++;
                initializeComponents();
            }



            /*****************************************************************
             *************** Add Family Responsabilities zone ****************
             *****************************************************************/


            $.fn.addElementFamilyResponsability = function() {

                $family_responsability = '<span id="family_responsability"> <div class="row"> <div class="col-md-12"> <span id="num_family_responsability" class="text-danger titulo-seccion"> Carga Familiar #' + (count_family_responsabilities + 1) + ' </span> <a id="family_responsability" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a> </div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label('name_responsability', 'Nombre Completo')}}{{Form::text('name_responsability[]', null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('rut', 'Rut')}}{{Form::text('rut[]', null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label('relationship_id', 'Relación')}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control'])}}</div></div></div><hr/></span>';

                if (count_family_responsabilities == 0)
                    $('#content_family_responsabilities').html($family_responsability);
                else
                    $('#content_family_responsabilities').append($family_responsability);


                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsabilities);
                $('#content_family_responsabilities span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsabilities);

                count_family_responsabilities++;
                initializeComponents();
            }



            /*****************************************************************
             ************************** Validations **************************
             *****************************************************************/


            $('#step1')
                .formValidation({
                    framework: 'bootstrap',
                    fields: {
                        /*male_surname: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> no debe ser mayor que 30 caracteres.'
                                },
                            }
                        },
                        female_surname: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> no debe ser mayor que 30 caracteres.'
                                },
                            }
                        },
                        first_name: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> no debe ser mayor que 30 caracteres.'
                                },
                            }
                        },
                        second_name: {
                            validators: {
                                stringLength: {
                                    max: 30,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Segundo Nombre</strong> no debe ser mayor que 30 caracteres.'
                                },
                            }
                        },
                        rut: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio.'
                                },
                            }
                        },
                        birthday: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Fecha de Nacimiento</strong> es obligatorio.'
                                },
                            }
                        },
                        country_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Nacionalidad</strong> es obligatorio.'
                                },
                            }
                        },
                        gender_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Sexo</strong> es obligatorio.'
                                },
                            }
                        },
                        address: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio.'
                                },
                            }
                        },
                        commune_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio.'
                                },
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio.'
                                },
                                stringLength: {
                                    max: 100,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.'
                                },
                            }
                        },
                        phone1: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio.'
                                },
                                stringLength: {
                                    max: 20,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.'
                                },
                            }
                        },
                        phone2: {
                            validators: {
                                stringLength: {
                                    max: 20,
                                    message: '<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.'
                                },
                            }
                        },
                        forecast_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Previsión</strong> es obligatorio.'
                                },
                            }
                        },
                        mutuality_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Mutualidad</strong> es obligatorio.'
                                },
                            }
                        },
                        pension_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>AFP</strong> es obligatorio.'
                                },
                            }
                        },
                        company_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Empresa</strong> es obligatorio.'
                                },
                            }
                        },
                        rating_id: {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Cargo</strong> es obligatorio.'
                                },
                            }
                        },*/
                    }
                })

                .on('success.form.fv', function(event) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.manpowers.step1") }}',
                        data: $('#step1').serialize(),
                        //async: false,
                        dataType: 'json',
                        success: function(result) {

                        },

                        beforeSend: function() {

                        },

                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                            });
                        }

                    });
                });

            $("#step2")
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        'degree[]': {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Grado Académico</strong> es obligatorio.'
                                }
                            }
                        },
                        'name_study[]': {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Nombre</strong> es obligatorio.'
                                }
                            }
                        },
                        'institution_id[]': {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Institución</strong> es obligatorio.'
                                }
                            }
                        },
                        'date[]': {
                            validators: {
                                notEmpty: {
                                    message: '<i class="fa fa-times"></i> El campo <strong>Fecha Obtención</strong> es obligatorio.'
                                }
                            }
                        }
                    }
                })

                .on('success.form.fv', function(event) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.manpowers.step2") }}',
                        data: $('#step2').serialize(),
                        //async: false,
                        dataType: 'json',
                        success: function(result) {

                        },

                        beforeSend: function() {

                        },

                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                            });
                        }

                    });
                });

            $("#step3")
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {


                    }
                })

                .on('success.form.fv', function(event) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("human-resources.manpowers.store") }}',
                        data: $('#step3').serialize(),
                        //async: false,
                        dataType: 'json',
                        success: function(result) {

                        },

                        beforeSend: function() {

                        },

                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                            });
                        }

                    });
                });


            /*****************************************************************
             ************************ Fin Validations ************************
             *****************************************************************/

        });

    </script>
@stop