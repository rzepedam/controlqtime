@extends('layout.index')

@section('css')
    {{ Html::Style('assets/css/smart_wizard.css') }}
    {{ Html::Style('assets/css/dropzone.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div id="wizard" class="swMain">
        <ul>
            <li>
                <a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">
                        Información<br />
                        <small>Personal</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Declaración<br />
                        <small>de Salud</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <label class="stepNumber">3</label>
                    <span class="stepDesc">
                        Competencias<br />
                        <small>Laborales</small>
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">
            {{ Form::open(["route" => "human-resources.manpowers.step1", "method" => "POST", "files" => true, "id" => "step1"]) }}
                @include('human-resources.manpowers.partials.step1.personal_data')
            {{ Form::close() }}
        </div>
        <div id="step-2">
            {{ Form::open(["route" => "human-resources.manpowers.step2", "method" => "POST", "files" => true, "id" => "step2"]) }}
                @include('human-resources.manpowers.partials.step2.health')
            {{ Form::close() }}
        </div>
        <div id="step-3">
            {{ Form::open(["route" => "human-resources.manpowers.step3", "method" => "POST", "files" => true, "id" => "step3"]) }}
                @include('human-resources.manpowers.partials.step3.job_skills')
            {{ Form::close() }}
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/jquery.smartWizard.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/dropzone.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script type="text/javascript">

        $(document).ready(function() {

            /******************************************************************
             *************************** Variables ****************************
             ******************************************************************/

            var count_family_relationship = 0;
            var count_disabilities = 0;
            var count_diseases = 0;
            var count_family_responsability = 0;
            var count_certification = 0;
            var count_licence = 0;
            var count_speciality = 0;



            /******************************************************************
            ********************* Initialize components ***********************
            ******************************************************************/

            $('.mitooltip').tooltip();

            $('#wizard').smartWizard({
                labelNext:'Siguiente',
                labelPrevious:'Anterior',
                labelFinish:'Guardar',
                transitionEffect: 'slideLeft',

            });

            //Cancel next step event in click event, necesary for validation
            $('#sendElement').unbind('click');

            /*****************************************************************
             **************** Add Family Relationship zone ***************
             *****************************************************************/

            $.fn.addElementFamilyRelationship = function() {
                $family_relationship = '<span id="family_relationship"><div class="row"><div class="col-md-12"><span class="title-elements text-light-blue">Parentesco Familiar #' + (count_family_relationship + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Parentesco Familiar"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6">{{Form::label('family_relationship', 'Parentesco Familiar')}}{{Form::select('family_relationship', $kins, null, ['class'=> 'form-control'])}}</div><div class="col-md-6">{{Form::label('manpower', 'Nombre')}}{{Form::select('manpower', $manpowers, null, ['class'=> 'form-control'])}}</div></div></span><hr/>';

                if (count_family_relationship == 0)
                    $('#content_family_relationships').html($family_relationship);
                else
                    $('#content_family_relationships').append($family_relationship);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element family_relationships
                $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationship);

                $('label[for="family_relationship"]').attr('for', 'family_relationship' + count_family_relationship);
                $('select#family_relationship').each(function(i) {
                    $(this).attr('id', 'family_relationship' + count_family_relationship);
                    $(this).attr('name', 'family_relationship' + count_family_relationship);
                });

                $('label[for="manpower"]').attr('for', 'manpower' + count_family_relationship);
                $('select#manpower').each(function(i) {
                    $(this).attr('id', 'manpower' + count_family_relationship);
                    $(this).attr('name', 'manpower' + count_family_relationship);
                });

                count_family_relationship++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************** Add Disability zone **********************
             *****************************************************************/


            $('body').on('click', '.addElementDisability', function() {

                $disability = '<span id="disability"><div class="row"><div class="col-md-12"><span class="title-elements text-primary">Discapacidad #' + (count_disabilities + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("disability", "Discapacidad") !!}{!! Form::select("disability", $disabilities, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disability", "Está en tratamiento?") !!}<br>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "si", false, ['class'=> 'treatment_disability']) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "no", true) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disability", "Detalle") !!}{!! Form::textarea("detail_disability", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div id="myId" class="dropzone"><div class="dz-message"> <h3 class="text-primary">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div></span><hr />';

                if (count_disabilities == 0) {
                    $('#content_disabilities').html($disability);
                }else {
                    $('#content_disabilities').append($disability);
                }

                $("#wizard").smartWizard("fixHeight");

                /*var myDropzone = new Dropzone("div#myId", {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "disabilities",

                    init: function() {
                        var myDropzone = this;
                        var submit = document.querySelector('#submit-all');

                        // First change the button to actually tell Dropzone to process the queue.
                        submit.addEventListener("click", function (e) {
                            // Make sure that the form isn't actually being sent.
                            e.preventDefault();
                            e.stopPropagation();
                            myDropzone.processQueue();
                        });
                    },

                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token').val());
                    }

                });*/


                //Refresh N° element disability
                $('#content_disabilities span#disability').attr('id', 'disability' + count_disabilities);
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

            });



            /*****************************************************************
             *********************** Add Disease zone ************************
             *****************************************************************/


            $.fn.addElementDisease = function() {

                $disease = '<span id="disease"><div class="row"><div class="col-md-12"><span class="title-elements text-success">Enfermedad #' + (count_diseases + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Enfermedad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("disease", "Enfermedad") !!}{!! Form::select("disease", $diseases, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disease", "Está en tratamiento?") !!}<br/>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "si", false) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "no", true, ['class'=> 'treatment_disease']) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disease", "Detalle") !!}{!! Form::textarea("detail_disease", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("img_disease", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="note">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr />';

                if (count_diseases == 0)
                    $('#content_diseases').html($disease);
                else
                    $('#content_diseases').append($disease);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element disease
                $('#content_diseases span#disease').attr('id', 'disease' + count_diseases);
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

                $family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><span class="title-elements text-warning">Carga Familiar #' + (count_family_responsability + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{{Form::label('name_responsability', 'Nombre Completo')}}{{Form::text('name_responsability', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('rut', 'Rut')}}{{Form::text('rut', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('kin_id', 'Parentesco')}}{{Form::select('kin_id', $kins, null, ['class'=> 'form-control'])}}</div></div></span><hr />';

                if (count_family_responsability == 0)
                    $('#content_family_responsabilities').html($family_responsability);
                else
                    $('#content_family_responsabilities').append($family_responsability);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element family_responsabilities
                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsability);
                $('#content_family_responsabilities label[for="name_responsability"]').attr('for', 'name_responsability' + count_family_responsability);
                $('#content_family_responsabilities input:text#name_responsability').attr('name', 'name_responsability' + count_family_responsability);
                $('#content_family_responsabilities input:text#name_responsability').attr('id', 'name_responsability' + count_family_responsability);

                $('#content_family_responsabilities label[for="rut"]').attr('for', 'rut' + count_family_responsability);
                $('#content_family_responsabilities input#rut').attr('name', 'rut' + count_family_responsability);
                $('#content_family_responsabilities input#rut').attr('id', 'rut' + count_family_responsability);

                $('label[for="kin_id"]').attr('for', 'kin_id' + count_family_responsability);
                $('#content_family_responsabilities select#kin_id').attr('name', 'kin_id' + count_family_responsability);
                $('#content_family_responsabilities select#kin_id').attr('id', 'kin_id' + count_family_responsability);

                count_family_responsability++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************* Add Certifications zone *******************
             *****************************************************************/


            $.fn.addElementCertification = function() {

                $certification = '<span id="certification"><div class="row"><div class="col-md-12"><span class="title-elements text-red">Certificación #' + (count_certification + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-7">{{Form::label('certification', 'Nombre')}}{{Form::select('certification', $certifications, null, ['class'=> 'form-control'])}}</div><div class="col-md-5">{{Form::label('institution', 'Institución')}}{{Form::select('institution', $institutions, null, ['class'=> 'form-control'])}}</div></div><br /><div class="row"><div class="col-md-12">{!! Form::label("img_certification", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr />';

                if (count_certification == 0)
                    $('#content_certifications').html($certification);
                else
                    $('#content_certifications').append($certification);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element certifications
                $('span#certification').attr('id', 'certification' + count_certification);
                $('label[for="certification"]').attr('for', 'certification' + count_certification);
                $('select#certification').each(function(i) {
                    $(this).attr('id', 'certification' + count_certification);
                    $(this).attr('name', 'certification' + count_certification);
                });

                $('label[for="institution"]').attr('for', 'institution' + count_certification);
                $('#content_certifications select#institution').each(function(i) {
                    $(this).attr('id', 'institution' + count_certification);
                    $(this).attr('name', 'institution' + count_certification);
                });


                count_certification++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************ Add Licenses zone **********************
             *****************************************************************/


            $.fn.addElementLicense = function() {

                $license = '<span id="license"><div class="row"><div class="col-md-12"><span class="title-elements text-yellow">Licencia #' + (count_licence + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-4">{{Form::label('license', 'Tipo Licencia')}}{{Form::select('license', $licenses, null, ['class'=> 'form-control'])}}</div><div class="col-md-2">{{Form::label('expired', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div><br/><div class="row"><div class="col-md-12">{{Form::label('detail_license', 'Detalle')}}{{Form::textarea('detail_license', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div><br /><div class="row"><div class="col-md-12">{!! Form::label("img_license", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr />';

                if (count_licence == 0)
                    $('#content_licenses').html($license);
                else
                    $('#content_licenses').append($license);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element licenses
                $('span#license').attr('id', 'license' + count_licence);

                $('label[for="license"]').attr('for', 'license' + count_licence);
                $('select#license').each(function(i) {
                    $(this).attr('id', 'license' + count_licence);
                    $(this).attr('name', 'license' + count_licence);
                });

                $('label[for="expired"]').attr('for', 'expired' + count_licence);
                $('input#expired').attr('name', 'expired' + count_licence);
                $('input#expired').attr('id', 'expired' + count_licence);

                $('label[for="detail_license"]').attr('for', 'detail_license' + count_licence);
                $('textarea#detail_license').attr('name', 'detail_license' + count_licence);
                $('textarea#detail_license').attr('id', 'detail_license' + count_licence);


                count_licence++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************** Add Specialities zone ********************
             *****************************************************************/


            $.fn.addElementSpeciality = function() {

                $speciality = '<span id="speciality"><div class="row"><div class="col-md-12"><span class="title-elements text-green">Especialidad #' + (count_speciality + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6">{{Form::label('speciality', 'Especialidad')}}{{Form::select('speciality', $specialities, null, ['class'=> 'form-control'])}}</div><div class="col-md-6">{{Form::label('institution', 'Institución')}}{{Form::select('institution', $institutions, null, ['class'=> 'form-control'])}}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("img_speciality", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr/>';

                if (count_speciality == 0)
                    $('#content_specialities').html($speciality);
                else
                    $('#content_specialities').append($speciality);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element specialities
                $('span#speciality').attr('id', 'speciality' + count_speciality);

                $('label[for="speciality"]').attr('for', 'speciality' + count_speciality);
                $('#content_specialities select#speciality').each(function(i) {
                    $(this).attr('id', 'speciality' + count_speciality);
                    $(this).attr('name', 'speciality' + count_speciality);
                });

                $('label[for="institution"]').attr('for', 'institution' + count_speciality);
                $('#content_specialities select#institution').each(function(i) {
                    $(this).attr('id', 'institution' + count_speciality);
                    $(this).attr('name', 'institution' + count_speciality);
                });

                count_speciality++;
                $('.mitooltip').tooltip();
            }

            /*****************************************************************
             ************************** Submit Steps *************************
             *****************************************************************/

            //Steps Forward
            $('#sendElement').click(function(e) {

                var currentStep = $("#wizard").smartWizard("currentStep");

                //Validate fields
                if (validateStep1() != false) {

                    if (currentStep == 1) {
                        //Step 1
                        /*$.ajax({
                            type: 'POST',
                            url: '{{ route("human-resources.manpowers.step1") }}',
                            data: $('#step' + currentStep).serialize(),
                            dataType: "json",
                            success: function (data) {
                                $('#js').addClass('hide');
                                $("#wizard").smartWizard("goForward");
                            },

                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                $.each(errors.errors, function (index, value) {
                                    $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                    $('#' + index).focus();
                                });
                            }
                        });*/
                        $("#wizard").smartWizard("goForward");
                    } else {
                        //Step 2
                        if (validateStep2() != false) {

                        }
                    }
                }
            });


            /*****************************************************************
             ************************** Submit form **************************
             *****************************************************************/

            $('#submit-all').click(function(){



            });


            /*****************************************************************
             ************************** Validations **************************
             *****************************************************************/

            function validateStep1()
            {
                /* male_surname */
                if ($('#male_surname').val() == '') {
                    $('#js').removeClass('hide');
                    $('#male_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#male_surname').focus();
                }

                if ($('#male_surname').val().length > 30) {
                    $('#js').removeClass('hide');
                    $('#male_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#male_surname').focus();
                }

                /* female_surname */
                if ($('#female_surname').val() == '') {
                    $('#js').removeClass('hide');
                    $('#female_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#female_surname').focus();
                }


                if ($('#female_surname').val().length > 30) {
                    $('#js').removeClass('hide');
                    $('#female_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#female_surname').focus();
                }

                /* first_name */
                if ($('#first_name').val() == '') {
                    $('#js').removeClass('hide');
                    $('#first_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#first_name').focus();
                }


                if ($('#first_name').val().length > 30) {
                    $('#js').removeClass('hide');
                    $('#first_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#first_name').focus();
                }

                /* second_name */
                if ($('#second_name').val().length > 30) {
                    $('#js').removeClass('hide');
                    $('#second_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Segundo Nombre</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#second_name').focus();
                }

                /* rut */
                if ($('#rut').val() == '') {
                    $('#js').removeClass('hide');
                    $('#rut').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#rut').focus();
                }

                /* birthday */
                if ($('#birthday').val() == '') {
                    $('#js').removeClass('hide');
                    $('#birthday').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Nacimiento</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#birthday').focus();
                }

                /* forecast */
                if ($('#forecast_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#forecast_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Previsión</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#forecast_id').focus();
                }

                /* country */
                if ($('#country_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#country_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#country_id').focus();
                }

                /* gender */
                if ($('#gender_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#gender_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Sexo</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#gender_id').focus();
                }

                /* rating */
                if ($('#rating_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#rating_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Cargo</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#rating_id').focus();
                }

                /* subarea */
                if ($('#subarea_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#subarea_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Subárea</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#subarea_id').focus();
                }

                /* commune */
                if ($('#commune_id').val() == '') {
                    $('#js').removeClass('hide');
                    $('#commune_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#commune_id').focus();
                }

                /* address */
                if ($('#address').val() == '') {
                    $('#js').removeClass('hide');
                    $('#address').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#address').focus();
                }

                /* phone1 */
                if ($('#phone1').val() == '') {
                    $('#js').removeClass('hide');
                    $('#phone1').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#phone1').focus();
                }

                if ($('#phone1').val().length > 20) {
                    $('#js').removeClass('hide');
                    $('#phone1').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#phone1').focus();
                }

                /* phone2 */
                if ($('#phone2').val().length > 20) {
                    $('#js').removeClass('hide');
                    $('#phone2').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#phone2').focus();
                }

                /* email */
                if ($('#email').val() == '') {
                    $('#js').removeClass('hide');
                    $('#email').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio').removeClass('hide');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#email').focus();
                }

                if ($('#email').val().length > 100) {
                    $('#js').removeClass('hide');
                    $('#email').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.');
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#email').focus();
                }

                for(var i = 0; i < count_family_relationship; i++) {

                    if ($('select#family_relationship' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#family_relationship' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Parentesco Familiar ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('select#family_relationship' + i).focus();
                    }
                }
            }



        });

    </script>
@stop