@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ asset('assets/css/jquery-wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formValidation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ribbon.css') }}">

@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div class="row">
        <div class="col-md-12">
            <!-- Panel Wizard Form -->
            <div id="exampleWizardForm">
                <!-- Steps -->
                <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
                    <div class="step col-md-4 current" data-target="#exampleAccount" role="tab">
                        <span class="step-number">1</span>
                        <div class="step-desc">
                            <span class="step-title">Datos</span>
                            <p>Personales</p>
                        </div>
                    </div>
                    <div class="step col-md-4" data-target="#exampleBilling" role="tab">
                        <span class="step-number">2</span>
                        <div class="step-desc">
                            <span class="step-title">Competencias</span>
                            <p>Laborales</p>
                        </div>
                    </div>
                    <div class="step col-md-4" data-target="#exampleGetting" role="tab">
                        <span class="step-number">3</span>
                        <div class="step-desc">
                            <span class="step-title">Información</span>
                            <p>de Salud</p>
                        </div>
                    </div>
                </div>
                <!-- End Steps -->
                <!-- Wizard Content -->
                <div class="panel">
                    <div class="panel-body">
                        <div class="wizard-content">
                            <div class="wizard-pane active" id="exampleAccount" role="tabpanel">
                                <div class="alert alert-success alert-alt alert-dismissible" role="alert">
                                    <span><i class="fa fa-street-view"></i> <strong>Información Personal</strong></span>
                                </div>

                                {{ Form::open(["route" => "human-resources.manpowers.step1", "method" => "POST", "files" => true, "id" => "step1"]) }}

                                    @include('human-resources.manpowers.partials.step1.personal_data')

                                    <br />
                                    <div class="alert alert-info alert-alt alert-dismissible" role="alert">
                                        <span><i class="fa fa-picture-o"></i> <strong>Imagen de Perfil</strong></span>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <div class="alert alert-warning alert-alt alert-dismissible contiene-titulo-label-seccion" role="alert">
                                        <span><i class="fa fa-male"></i><i class="fa fa-female"></i> <strong>Parentescos Familiares</strong></span>
                                        <span class="label label-outline label-warning add_family_relationship waves-effect waves-block" onclick="$(this).addElementFamilyRelationship(this)"><i class="fa fa-plus"></i> Agregar Parentesco Familiar</span>
                                    </div>
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
                                            <hr />
                                        @endif
                                    </div>
                                    <br />
                                    <br />

                                {{ Form::close() }}

                            </div>
                            <div class="wizard-pane" id="exampleBilling" role="tabpanel">
                                <form id="exampleBillingForm">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputCardNumber">Card Number</label>
                                        <input type="text" class="form-control" id="inputCardNumber" name="number" placeholder="Card number">
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputCVV">CVV</label>
                                        <input type="text" class="form-control" id="inputCVV" name="cvv" placeholder="CVV">
                                    </div>
                                </form>
                            </div>
                            <div class="wizard-pane" id="exampleGetting" role="tabpanel">
                                <div class="text-center margin-vertical-20">
                                    <i class="icon md-check font-size-40" aria-hidden="true"></i>
                                    <h4>We got your order. Your product will be shipping soon.</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Wizard Content -->
                    </div>
                </div>
            </div>
            <!-- End Panel Wizard One Form -->
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/formValidation.js') }}
    {{ Html::script('assets/js/form-validation/bootstrap.js') }}
    {{ Html::script('assets/js/jquery.matchHeight-min.js') }}
    {{ Html::script('assets/js/jquery-wizard.js') }}
    {{ Html::script('assets/js/components/jquery-wizard.js') }}
    {{ Html::script('assets/js/components/matchheight.js') }}


    <script type="text/javascript">

        $(document).ready(function() {


            /******************************************************************
             *************************** Variables ****************************
             ******************************************************************/

            var count_family_relationships = {{ count(Session::get('relationship_id')) ? count(Session::get('relationship_id')) : 0  }};
            var count_studies = 0;
            var count_disabilities = {{ Session::get('count_disabilities') ? Session::get('count_disabilities') : 0  }};
            var count_diseases = {{ Session::get('count_diseases') ? Session::get('count_diseases') : 0  }};
            var count_family_responsabilities = {{ Session::get('count_family_responsabilities') ? Session::get('count_family_responsabilities') : 0  }};
            var count_exams = 0;
            var count_certifications = 0;
            var count_licenses = 0;
            var count_specialities = 0;
            var count_img_disabilities = "{{ Session::get('count_img_disabilities') ? Session::get('count_img_disabilities') : 0  }}";


            /******************************************************************
             ********************* Initialize components ***********************
             ******************************************************************/

            var defaults = $.components.getDefaults("wizard");

            var options = $.extend(true, {}, defaults, {
                buttonsAppendTo: '.panel-body'
            });

            var wizard = $("#exampleWizardForm").wizard(options).data('wizard');

            wizard.get("#exampleAccount").setValidator(function() {
                var fv = $("#step1").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            /*wizard.get("#exampleBilling").setValidator(function() {
                var fv = $("#exampleBillingForm").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });*/

            $('.mitooltip').tooltip();



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
                            var html = '<br /><h3 class="text-center text-warning">No existen Parentescos Familiares Asociados <br /><small>(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h3><br /><br /><hr />'
                            $('#content_family_relationships').html(html);
                        }

                        break;

                    case 'study':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#study' + item).attr('id', 'study' + i);
                            $('span#num_study' + item).text('Estudio #' + (i + 1));
                            $('span#num_study' + item).attr('id', 'num_study' + i);

                            $('label[for="degree' + item + '"]').attr('for', "degree" + i);
                            $('select#degree' + item).each(function (j) {
                                $(this).attr('id', 'degree' + i);
                                $(this).attr('name', 'degree' + i);
                            });

                            $('label[for="name_study' + item + '"]').attr('for', 'name_study' + i);
                            $('input#name_study' + item).attr('name', 'name_study' + i);
                            $('input#name_study' + item).attr('id', 'name_study' + i);

                            $('label[for="institution_id' + item + '"]').attr('for', "institution_id" + i);
                            $('#content_studies select#institution_id' + item).each(function (j) {
                                $(this).attr('id', 'institution_id' + i);
                                $(this).attr('name', 'institution_id' + i);
                            });

                            $('label[for="date' + item + '"]').attr('for', 'date' + i);
                            $('input#date' + item).attr('name', 'date' + i);
                            $('input#date' + item).attr('id', 'date' + i);
                        }

                        count_studies--;
                        if (count_studies == 0) {
                            var html = '<h2 class="text-center text-green">No existen Estudios Asociados <br /><small class="text-muted">(Pulse "Agregar Estudio" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_studies').html(html);
                        }

                        break;

                    case 'disability':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_disability' + item).text('Discapacidad #' + (i + 1));
                            $('span#num_disability' + item).attr('id', 'num_disability' + i);
                            $('span#disability' + item).attr('id', 'disability' + i);

                            $('label[for="disability' + item + '"]').attr('for', "disability" + i);
                            $('select#disability' + item).each(function (j) {
                                $(this).attr('id', 'disability' + i);
                                $(this).attr('name', 'disability' + i);
                            });

                            $('label[for="treatment_disability' + item + '"]').attr('for', 'treatment_disability' + i);
                            $('input:radio[name="treatment_disability' + item + '"]').each(function (j) {
                                $(this).attr('name', 'treatment_disability' + i);
                                $(this).attr('id', 'treatment_disability' + i);
                            });

                            $('label[for="detail_disability' + item + '"]').attr('for', 'detail_disability' + i);
                            $('textarea#detail_disability' + item).attr('name', 'detail_disability' + i);
                            $('textarea#detail_disability' + item).attr('id', 'detail_disability' + i);

                            $('div#img_disability' + item).attr('id', 'img_disability' + i);
                        }

                        count_disabilities--;
                        if (count_disabilities == 0) {
                            var html = '<h2 class="text-center text-light-blue">No existen Discapacidades Asociadas <br /><small class="text-muted">(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_disabilities').html(html);
                        }

                        break;

                    case 'disease':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_disease' + item).text('Enfermedad #' + (i + 1));
                            $('span#num_disease' + item).attr('id', 'num_disease' + i);
                            $('span#disease' + item).attr('id', 'disease' + i);

                            $('label[for="disease' + item + '"]').attr('for', "disease" + i);
                            $('select#disease' + item).each(function (j) {
                                $(this).attr('id', 'disease' + i);
                                $(this).attr('name', 'disease' + i);
                            });

                            $('label[for="treatment_disease' + item + '"]').attr('for', 'treatment_disease' + i);
                            $('input:radio[name="treatment_disease' + item + '"]').each(function (j) {
                                $(this).attr('name', 'treatment_disease' + i);
                                $(this).attr('id', 'treatment_disease' + i);
                            });

                            $('label[for="detail_disease' + item + '"]').attr('for', 'detail_disease' + i);
                            $('textarea#detail_disease' + item).attr('name', 'detail_disease' + i);
                            $('textarea#detail_disease' + item).attr('id', 'detail_disease' + i);

                            $('div#img_disease' + item).attr('id', 'img_disease' + i);
                        }

                        count_diseases--;
                        if (count_diseases == 0) {
                            var html = '<h2 class="text-center text-green">No existen Enfermedades Asociadas <br /><small class="text-muted">(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_diseases').html(html);
                        }

                        break;

                    case 'family_responsability':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_family_responsability' + item).text('Carga Familiar #' + (i + 1));
                            $('span#num_family_responsability' + item).attr('id', 'num_family_responsability' + i);
                            $('span#family_responsability' + item).attr('id', 'family_responsability' + i);

                            $('label[for="name_responsability' + item + '"]').attr('for', 'name_responsability' + i);
                            $('input#name_responsability' + item).attr('name', 'name_responsability' + i);
                            $('input#name_responsability' + item).attr('id', 'name_responsability' + i);

                            $('label[for="rut' + item + '"]').attr('for', 'rut' + i);
                            $('input#rut' + item).attr('name', 'rut' + i);
                            $('input#rut' + item).attr('id', 'rut' + i);

                            $('label[for="kin_id' + item + '"]').attr('for', "kin_id" + i);
                            $('select#kin_id' + item).each(function (j) {
                                $(this).attr('id', 'kin_id' + i);
                                $(this).attr('name', 'kin_id' + i);
                            });
                        }

                        count_family_responsabilities--;
                        if (count_family_responsabilities == 0) {
                            var html = '<h2 class="text-center text-yellow">No existen Cargas Familiares Asociadas <br /><small class="text-muted">(Pulse "Agregar Carga Familiar" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_family_responsabilities').html(html);
                        }

                        break;

                    case 'exam':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_exam' + item).text('Examen Preocupacional #' + (i + 1));
                            $('span#num_exam' + item).attr('id', 'num_exam' + i);
                            $('span#exam' + item).attr('id', 'exam' + i);

                            $('label[for="exam' + item + '"]').attr('for', 'exam' + i);
                            $('select#exam' + item).each(function (i) {
                                $(this).attr('id', 'exam' + i);
                                $(this).attr('name', 'exam' + i);
                            });

                            $('label[for="expired_exam' + item + '"]').attr('for', 'expired_exam' + i);
                            $('input#expired_exam' + item).attr('name', 'expired_exam' + i);
                            $('input#expired_exam' + item).attr('id', 'expired_exam' + i);

                            $('div#img_exam' + item).attr('id', 'img_exam' + i);
                        }

                        count_exams--;
                        if (count_exams == 0) {
                            var html = '<h2 class="text-center text-muted">No existen Exámenes Preocupacionales Asociados <br /><small class="text-muted">(Pulse "Agregar Examen Preocupacional" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_exams').html(html);
                        }

                        break;

                    case 'certification':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_certification' + item).text('Certificación #' + (i + 1));
                            $('span#num_certification' + item).attr('id', 'num_certification' + i);
                            $('span#certification' + item).attr('id', 'certification' + i);

                            $('label[for="certification' + item + '"]').attr('for', "certification" + i);
                            $('#content_certifications select#certification' + item).each(function (j) {
                                $(this).attr('id', 'certification' + i);
                                $(this).attr('name', 'certification' + i);
                            });

                            $('label[for="institution_id' + item + '"]').attr('for', "institution_id" + i);
                            $('#content_certifications select#institution_id' + item).each(function (j) {
                                $(this).attr('id', 'institution_id' + i);
                                $(this).attr('name', 'institution_id' + i);
                            });

                            $('label[for="expired_certification' + item + '"]').attr('for', 'expired_certification' + i);
                            $('input#expired_certification' + item).attr('name', 'expired_certification' + i);
                            $('input#expired_certification' + item).attr('id', 'expired_certification' + i);

                            $('div#img_certification' + item).attr('id', 'img_certification' + i);
                        }

                        count_certifications--;
                        if (count_certifications == 0) {
                            var html = '<h2 class="text-center text-red">No existen Certificaciones Asociadas <br /><small class="text-muted">(Pulse "Agregar Certificación" para comenzar su adición)</small></h2><br /><hr />';
                            $('#content_certifications').html(html);
                        }

                        break;

                    case 'license':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_license' + item).text('Licencia #' + (i + 1));
                            $('span#num_license' + item).attr('id', 'num_license' + i);
                            $('span#license' + item).attr('id', 'license' + i);

                            $('label[for="expired' + item + '"]').attr('for', 'expired' + i);
                            $('input#expired' + item).attr('name', 'expired' + i);
                            $('input#expired' + item).attr('id', 'expired' + i);

                            $('label[for="detail_license' + item + '"]').attr('for', 'detail_license' + i);
                            $('textarea#detail_license' + item).attr('name', 'detail_license' + i);
                            $('textarea#detail_license' + item).attr('id', 'detail_license' + i);

                            $('div#img_license' + item).attr('id', 'img_license' + i);
                        }

                        count_licenses--;
                        if (count_licenses == 0) {
                            var html = '<h2 class="text-center text-yellow">No existen Licencias Asociadas <br /><small class="text-muted">(Pulse "Agregar Licencia" para comenzar su adición)</small></h2><br /><hr />';
                            $('#content_licenses').html(html);
                        }

                        break

                    case 'speciality':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_speciality' + item).text('Especialidad #' + (i + 1));
                            $('span#num_speciality' + item).attr('id', 'num_speciality' + i);
                            $('span#speciality' + item).attr('id', 'speciality' + i);

                            $('label[for="speciality' + item + '"]').attr('for', "speciality" + i);
                            $('#content_specialities select#speciality' + item).each(function (j) {
                                $(this).attr('id', 'speciality' + i);
                                $(this).attr('name', 'speciality' + i);
                            });

                            $('label[for="expired_speciality' + item + '"]').attr('for', 'expired_speciality' + i);
                            $('input#expired_speciality' + item).attr('name', 'expired_speciality' + i);
                            $('input#expired_speciality' + item).attr('id', 'expired_speciality' + i);

                            $('label[for="institution_id' + item + '"]').attr('for', "institution_id" + i);
                            $('#content_specialities select#institution_id' + item).each(function (j) {
                                $(this).attr('id', 'institution_id' + i);
                                $(this).attr('name', 'institution_id' + i);
                            });

                            $('div#img_speciality' + item).attr('id', 'img_speciality' + i);
                        }

                        count_specialities--;
                        if (count_specialities == 0) {
                            var html = '<h2 class="text-center text-green">No existen Especialidades Asociadas <br /><small class="text-muted">(Pulse "Agregar Especialidad" para comenzar su adición)</small></h2><br /><hr />';
                            $('#content_specialities').html(html);
                        }

                        break

                }

            });



            /*****************************************************************
             **************** Add Family Relationship zone ***************
             *****************************************************************/


            $.fn.addElementFamilyRelationship = function () {

                $family_relationship = '<span id="family_relationship"><div class="row"><div class="col-md-12"><span id="num_family_relationship" class="text-warning titulo-seccion">Parentesco Familiar #' + (count_family_relationships + 1) + '</span><a id="family_relationship" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Parentesco"><i class="fa fa-trash"></i></a></div></div><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label('relationship_id', 'Relación')}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control', 'required'])}}</div></div><div class="col-md-6"><div class="form-group">{{Form::label('manpower_id', 'Nombre')}}{{Form::select('manpower_id[]', $manpowers, null, ['class'=> 'form-control', 'required'])}}</div></div></div><hr/></span>';

                if (count_family_relationships == 0)
                    $('#content_family_relationships').html($family_relationship);
                else
                    $('#content_family_relationships').append($family_relationship);


                $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationships);
                $('span#num_family_relationship').attr('id', 'num_family_relationship' + count_family_relationships);

                count_family_relationships++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************ Add Studies zone ***********************
             *****************************************************************/


            $.fn.addElementStudy = function () {

                $study = '<span id="study"><div class="row"><div class="col-md-12"><span id="num_study" class="title-elements text-green">Estudio #' + (count_studies + 1) + '</span><a id="study" class="delete-elements pull-right mitooltip" title="Eliminar Estudio"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-3"><div class="form-group">{{Form::label("degree", "Grado Académico")}}{{Form::select("degree", $degrees, null, ["class"=> "form-control"])}}</div></div><div class="col-md-4"><div class="form-group">{{Form::label("name_study", "Nombre Estudio")}}{{Form::text("name_study", null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label("institution_id", "Institución")}}{{Form::select("institution_id", $institutions, null, ["class"=> "form-control"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("date", "Fecha Obtención")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("date", null, ["class"=> "form-control required", "data-inputmask"=> 'alias": "dd/mm/yyyy', "data-mask"=> ""])}}</div></div></div></div><hr/></span>';

                if (count_studies == 0)
                    $('#content_studies').html($study);
                else
                    $('#content_studies').append($study);


                $('span#study').attr('id', 'study' + count_studies);
                $('span#num_study').attr('id', 'num_study' + count_studies);

                $('label[for="degree"]').attr('for', 'degree' + count_studies);
                $('select#degree').each(function (i) {
                    $(this).attr('id', 'degree' + count_studies);
                    $(this).attr('name', 'degree' + count_studies);
                });

                $('label[for="name_study"]').attr('for', 'name_study' + count_studies);
                $('input#name_study').attr('name', 'name_study' + count_studies);
                $('input#name_study').attr('id', 'name_study' + count_studies);

                $('label[for="institution_id"]').attr('for', 'institution_id' + count_studies);
                $('#content_studies select#institution_id').each(function (i) {
                    $(this).attr('id', 'institution_id' + count_studies);
                    $(this).attr('name', 'institution_id' + count_studies);
                });

                $('label[for="date"]').attr('for', 'date' + count_studies);
                $('input#date').attr('name', 'date' + count_studies);
                $('input#date').attr('id', 'date' + count_studies);

                count_studies++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************** Add Disability zone **********************
             *****************************************************************/


            $.fn.addElementDisability = function() {

                $disability = '<span id="disability"><div class="row"><div class="col-md-12"><span id="num_disability" class="title-elements text-primary">Discapacidad #' + (count_disabilities + 1) + '</span><a id="disability" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label("disability", "Nombre")}}{{Form::select("disability", $disabilities, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"><div class="form-group">{{Form::label("treatment_disability", "Está en tratamiento?")}}<br>{{Form::label("si", "Si")}}&nbsp&nbsp{{Form::radio("treatment_disability", "si", false, ['class'=> 'treatment_disability'])}}&nbsp&nbsp{{Form::label("no", "No")}}&nbsp&nbsp{{Form::radio("treatment_disability", "no", true)}}</div></div></div><br/><div class="row"><div class="col-md-12"><div class="form-group">{{Form::label("detail_disability", "Detalle")}}{{Form::textarea("detail_disability", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><hr/></span>';

                if (count_disabilities == 0)
                    $('#content_disabilities').html($disability);
                else
                    $('#content_disabilities').append($disability);


                $('#content_disabilities span#disability').attr('id', 'disability' + count_disabilities);
                $('span#num_disability').attr('id', 'num_disability' + count_disabilities);

                $('#content_disabilities label[for="disability"]').attr('for', 'disability' + count_disabilities);
                $('#content_disabilities select#disability').each(function(i){
                    $(this).attr('name', 'disability' + count_disabilities);
                    $(this).attr('id', 'disability' + count_disabilities);
                });

                $('label[for="treatment_disability"]').attr('for', 'treatment_disability' + count_disabilities);
                $('input:radio[name=treatment_disability]').each(function(i){
                    $(this).attr('name', 'treatment_disability' + count_disabilities);
                    $(this).attr('id', 'treatment_disability' + count_disabilities);
                });

                $('label[for="detail_disability"]').attr('for', 'detail_disability' + count_disabilities);
                $('textarea#detail_disability').attr('name', 'detail_disability' + count_disabilities);
                $('textarea#detail_disability').attr('id', 'detail_disability' + count_disabilities);

                count_disabilities++;
                $('.mitooltip').tooltip();

            };



            /*****************************************************************
             *********************** Add Disease zone ************************
             *****************************************************************/


            $.fn.addElementDisease = function() {

                $disease = '<span id="disease"><div class="row"><div class="col-md-12"><span id="num_disease" class="title-elements text-success">Enfermedad #' + (count_diseases + 1) + '</span><a id="disease" class="delete-elements pull-right mitooltip" title="Eliminar Enfermedad"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label("disease", "Nombre")}}{{Form::select("disease", $diseases, null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 text-center"><div class="form-group">{{Form::label("treatment_disease", "Está en tratamiento?")}}<br/>{{Form::label("si", "Si")}}&nbsp&nbsp{{Form::radio("treatment_disease", "si", false)}}&nbsp&nbsp{{Form::label("no", "No")}}&nbsp&nbsp{{Form::radio("treatment_disease", "no", true, ['class'=> 'treatment_disease'])}}</div></div></div><br/><div class="row"><div class="col-md-12"><div class="form-group">{{Form::label("detail_disease", "Detalle")}}{{Form::textarea("detail_disease", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div></div><hr/></span>';

                if (count_diseases == 0)
                    $('#content_diseases').html($disease);
                else
                    $('#content_diseases').append($disease);


                $('#content_diseases span#disease').attr('id', 'disease' + count_diseases);
                $('span#num_disease').attr('id', 'num_disease' + count_diseases);

                $('#content_diseases label[for="disease"]').attr('for', 'disease' + count_diseases);
                $('#content_diseases select#disease').each(function(i){
                    $(this).attr('name', 'disease' + count_diseases);
                    $(this).attr('id', 'disease' + count_diseases);
                });

                $('label[for="treatment_disease"]').attr('for', 'treatment_disease' + count_diseases);
                $('input:radio[name=treatment_disease]').each(function(i){
                    $(this).attr('name', 'treatment_disease' + count_diseases);
                    $(this).attr('id', 'treatment_disease' + count_diseases);
                });

                $('label[for="detail_disease"]').attr('for', 'detail_disease' + count_diseases);
                $('textarea#detail_disease').attr('name', 'detail_disease' + count_diseases);
                $('textarea#detail_disease').attr('id', 'detail_disease' + count_diseases);

                count_diseases++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             *************** Add Family Responsabilities zone ****************
             *****************************************************************/


            $.fn.addElementFamilyResponsability = function() {

                $family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><span id="num_family_responsability" class="title-elements text-yellow">Carga Familiar #' + (count_family_responsabilities + 1) + '</span><a id="family_responsability" class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label('name_responsability', 'Nombre Completo')}}{{Form::text('name_responsability', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('rut', 'Rut')}}{{Form::text('rut', null, ['class'=> 'form-control'])}}</div></div><div class="col-md-3"><div class="form-group">{{Form::label('relationship_id', 'Relación')}}{{Form::select('relationship_id', $relationships, null, ['class'=> 'form-control'])}}</div></div></div><hr/></span>';

                if (count_family_responsabilities == 0)
                    $('#content_family_responsabilities').html($family_responsability);
                else
                    $('#content_family_responsabilities').append($family_responsability);


                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsabilities);
                $('#content_family_responsabilities span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsabilities);

                $('#content_family_responsabilities label[for="name_responsability"]').attr('for', 'name_responsability' + count_family_responsabilities);
                $('#content_family_responsabilities input:text#name_responsability').attr('name', 'name_responsability' + count_family_responsabilities);
                $('#content_family_responsabilities input:text#name_responsability').attr('id', 'name_responsability' + count_family_responsabilities);

                $('#content_family_responsabilities label[for="rut"]').attr('for', 'rut' + count_family_responsabilities);
                $('#content_family_responsabilities input#rut').attr('name', 'rut' + count_family_responsabilities);
                $('#content_family_responsabilities input#rut').attr('id', 'rut' + count_family_responsabilities);

                $('label[for="kin_id"]').attr('for', 'kin_id' + count_family_responsabilities);
                $('#content_family_responsabilities select#kin_id').attr('name', 'kin_id' + count_family_responsabilities);
                $('#content_family_responsabilities select#kin_id').attr('id', 'kin_id' + count_family_responsabilities);


                count_family_responsabilities++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************* Add Exams zone ************************
             *****************************************************************/


            $.fn.addElementExam = function() {

                $exam = '<span id="exam"><div class="row"><div class="col-md-12"><span id="num_exam" class="title-elements text-muted">Examen Preocupacional #' + (count_exams + 1) + '</span><a id="exam" class="delete-elements pull-right mitooltip" title="Eliminar Examen Preocupacional"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-4"><div class="form-group">{{Form::label('exam', 'Nombre Examen')}}{{Form::select('exam', $exams, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label('expired_exam', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div></div><hr/></span>';

                if (count_exams == 0)
                    $('#content_exams').html($exam);
                else
                    $('#content_exams').append($exam);


                $('span#exam').attr('id', 'exam' + count_exams);
                $('span#num_exam').attr('id', 'num_exam' + count_exams);

                $('label[for="exam"]').attr('for', 'exam' + count_exams);
                $('select#exam').each(function(i) {
                    $(this).attr('id', 'exam' + count_exams);
                    $(this).attr('name', 'exam' + count_exams);
                });

                $('label[for="expired_exam"]').attr('for', 'expired_exam' + count_exams);
                $('input#expired_exam').attr('name', 'expired_exam' + count_exams);
                $('input#expired_exam').attr('id', 'expired_exam' + count_exams);


                count_exams++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************* Add Certifications zone *******************
             *****************************************************************/


            $.fn.addElementCertification = function() {

                $certification = '<span id="exam"><div class="row"><div class="col-md-12"><span id="num_exam" class="title-elements text-muted">Examen Preocupacional #' + (count_exams + 1) + '</span><a id="exam" class="delete-elements pull-right mitooltip" title="Eliminar Examen Preocupacional"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-4"><div class="form-group">{{Form::label('exam', 'Nombre Examen')}}{{Form::select('exam', $exams, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label('expired_exam', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div></div><hr/></span>';

                if (count_certifications == 0)
                    $('#content_certifications').html($certification);
                else
                    $('#content_certifications').append($certification);


                $('span#certification').attr('id', 'certification' + count_certifications);
                $('span#num_certification').attr('id', 'num_certification' + count_certifications);

                $('label[for="certification"]').attr('for', 'certification' + count_certifications);
                $('select#certification').each(function(i) {
                    $(this).attr('id', 'certification' + count_certifications);
                    $(this).attr('name', 'certification' + count_certifications);
                });

                $('label[for="expired_certification"]').attr('for', 'expired_certification' + count_certifications);
                $('input#expired_certification').attr('name', 'expired_certification' + count_certifications);
                $('input#expired_certification').attr('id', 'expired_certification' + count_certifications);

                $('label[for="institution_id"]').attr('for', 'institution_id' + count_certifications);
                $('#content_certifications select#institution_id').each(function(i) {
                    $(this).attr('id', 'institution_id' + count_certifications);
                    $(this).attr('name', 'institution_id' + count_certifications);
                });


                count_certifications++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************ Add Licenses zone **********************
             *****************************************************************/


            $.fn.addElementLicense = function() {

                $license = '<span id="license"><div class="row"><div class="col-md-12"><span id="num_license" class="title-elements text-yellow">Licencia #' + (count_licenses + 1) + '</span><a id="license" class="delete-elements pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-4"><div class="form-group">{{Form::label('license', 'Tipo Licencia')}}{{Form::select('license', $licenses, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label('expired', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div></div><br/><div class="row"><div class="col-md-12"><div class="form-group">{{Form::label('detail_license', 'Detalle')}}{{Form::textarea('detail_license', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div></div><hr/></span>';

                if (count_licenses == 0)
                    $('#content_licenses').html($license);
                else
                    $('#content_licenses').append($license);


                $('span#license').attr('id', 'license' + count_licenses);
                $('span#num_license').attr('id', 'num_license' + count_licenses);

                $('label[for="license"]').attr('for', 'license' + count_licenses);
                $('select#license').each(function(i) {
                    $(this).attr('id', 'license' + count_licenses);
                    $(this).attr('name', 'license' + count_licenses);
                });

                $('label[for="expired"]').attr('for', 'expired' + count_licenses);
                $('input#expired').attr('name', 'expired' + count_licenses);
                $('input#expired').attr('id', 'expired' + count_licenses);

                $('label[for="detail_license"]').attr('for', 'detail_license' + count_licenses);
                $('textarea#detail_license').attr('name', 'detail_license' + count_licenses);
                $('textarea#detail_license').attr('id', 'detail_license' + count_licenses);


                count_licenses++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************** Add Specialities zone ********************
             *****************************************************************/


            $.fn.addElementSpeciality = function() {

                $speciality = '<span id="speciality"><div class="row"><div class="col-md-12"><span id="num_speciality" class="title-elements text-green">Especialidad #' + (count_specialities + 1) + '</span><a id="speciality" class="delete-elements pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6"><div class="form-group">{{Form::label('speciality', 'Especialidad')}}{{Form::select('speciality', $specialities, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label('expired_speciality', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i></div>{{Form::text('expired_speciality', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div><div class="col-md-4"><div class="form-group">{{Form::label('institution_id', 'Institución')}}{{Form::select('institution_id', $institutions, null, ['class'=> 'form-control'])}}</div></div></div><hr/></span>';

                if (count_specialities == 0)
                    $('#content_specialities').html($speciality);
                else
                    $('#content_specialities').append($speciality);


                $('span#speciality').attr('id', 'speciality' + count_specialities);
                $('span#num_speciality').attr('id', 'num_speciality' + count_specialities);

                $('label[for="speciality"]').attr('for', 'speciality' + count_specialities);
                $('#content_specialities select#speciality').each(function(i) {
                    $(this).attr('id', 'speciality' + count_specialities);
                    $(this).attr('name', 'speciality' + count_specialities);
                });

                $('label[for="expired_speciality"]').attr('for', 'expired_speciality' + count_specialities);
                $('input#expired_speciality').attr('name', 'expired_speciality' + count_specialities);
                $('input#expired_speciality').attr('id', 'expired_speciality' + count_specialities);

                $('label[for="institution_id"]').attr('for', 'institution_id' + count_specialities);
                $('#content_specialities select#institution_id').each(function(i) {
                    $(this).attr('id', 'institution_id' + count_specialities);
                    $(this).attr('name', 'institution_id' + count_specialities);
                });


                count_specialities++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************** Submit Steps *************************
             *****************************************************************/


            /*if (validateStep1() != false) {

                $.ajax({
                    type: 'POST',
                    url: '{{-- route("human-resources.manpowers.step1") --}}',
                    data: $('#step' + currentStep).serialize() + "&count_family_relationships=" + count_family_relationships,
                    dataType: "json",

                    beforeSend: function() {
                        $('#sendElement').html('<i class="fa fa-spinner fa-pulse"></i>');
                    },

                    success: function (data) {
                        $('#sendElement').html('Siguiente <i class="fa fa-chevron-right"></i>');
                        $('#js').addClass('hide');
                        $("#wizard").smartWizard("goForward");
                    },

                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors.errors, function (index, value) {
                            $('#sendElement').html('Siguiente <i class="fa fa-chevron-right"></i>');
                            $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                            $('#' + index).focus();
                        });
                    }
                });
            }else {
                return false;
            }


            if (validateStep2() != false) {
                $.ajax({
                    type: 'POST',
                    url: '{{-- route("human-resources.manpowers.step2") --}}',
                    data: $('#step' + currentStep).serialize() + "&count_disabilities=" + count_disabilities + "&count_diseases=" + count_diseases + "&count_family_responsabilities=" + count_family_responsabilities + "&count_img_disabilities=" + count_img_disabilities,
                    dataType: "json",

                    beforeSend: function() {
                        $('#sendElement').html('<i class="fa fa-spinner fa-pulse"></i>');
                    },

                    success: function (data) {
                        $('#sendElement').html('Siguiente <i class="fa fa-chevron-right"></i>');
                        $('#js').addClass('hide');
                        $("#wizard").smartWizard("goForward");
                    },

                    error: function (data) {

                        var errors = $.parseJSON(data.responseText);

                        $.each(errors.errors, function (index, value) {
                            $('#sendElement').html('Siguiente');
                            $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                            $('#' + index).focus();
                        });
                    }
                });
            }*/



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
                        async: false,
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

            /*$("#exampleBillingForm").formValidation({
                framework: 'bootstrap',
                    fields: {
                        number: {
                            validators: {
                                notEmpty: {
                                    message: 'The credit card number is required'
                                }
                            }
                        },
                        cvv: {
                            validators: {
                                notEmpty: {
                                    message: 'The CVV number is required'
                                }
                            }
                        }
                    }
            });*/


            /*****************************************************************
             ************************ Fin Validations ************************
             *****************************************************************/

        });

    </script>
@stop