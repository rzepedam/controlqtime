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

            @include('human-resources.manpowers.partials.step1.personal_data')

        </div>
        <div id="step-2">

            @include('human-resources.manpowers.partials.step2.health')

        </div>
        <div id="step-3">

            @include('human-resources.manpowers.partials.step3.job_skills')

        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/jquery.smartWizard.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/dropzone.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{-- Html::script('me/js/manpowers/validation_step1.js') --}}


    <script type="text/javascript">

        $(document).ready(function() {

            /******************************************************************
            ********************* Initialize components ***********************
            ******************************************************************/

            $('.mitooltip').tooltip();



            /******************************************************************
             *************************** Variables ****************************
             ******************************************************************/

            var count_disabilities = 0;
            var count_diseases = 0;
            var count_family_responsability = 0;
            var count_certification = 0;
            var count_licence = 0;
            var count_speciality = 0;
            var count_family_relationship = 0;

            /******************************************************************
             ******* Configure and validations SmartWizardJquery Section ******
             ******************************************************************/

            $('#wizard').smartWizard({
                labelNext:'Siguiente',
                labelPrevious:'Anterior',
                labelFinish:'Guardar',
                //onLeaveStep: leaveAStepCallback,
            });

            function leaveAStepCallback(obj, context){
                return validateSteps(obj.attr('rel'));
            }

            function validateSteps(step){
                var isStepValid = true;

                if(step == 1) {

                    /* validateStep1() => me/js/manpowers/validation_step1.js */
                    if(validateStep1() == false ) {
                        isStepValid = false;
                        $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
                    }else {
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
                    }
                }

                return isStepValid;
            }



            /*****************************************************************
             ********************** Add Disability zone **********************
             *****************************************************************/


            $.fn.addElementDisability = function() {

                $disability = '<span id="disability"><div class="row"><div class="col-md-12"><span class="title-elements text-primary">Discapacidad #' + (count_disabilities + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("name", "Enfermedad") !!}{!! Form::select("name", $disabilities, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disability", "Está en tratamiento?") !!}<br>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "si", false, ['class'=> 'treatment_disability']) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "no", true, ['class'=> 'treatment_disability']) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disability", "Detalle") !!}{!! Form::textarea("detail_disability", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("img_disability", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr />';

                if (count_disabilities == 0) {
                    $('#content_disabilities').html($disability);

                    $("div#dZUpload").dropzone({

                        url: "{{  route('human-resources.manpowers.store') }}",

                        init: function () {
                            var myDropzone = this;

                            var submitButton = document.getElementById('submitForm');
                            myDropzone = this; // closure

                            submitButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                e.stopPropagation();
                                if (myDropzone.getQueuedFiles().length === 0) {
                                    $('#step2').submit();
                                }
                                else {
                                    myDropzone.processQueue();
                                    $('#step2').submit();
                                }
                            });
                        },

                        sending: function(file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                        }
                    });
                }else {
                    $('#content_disabilities').append($disability);
                }

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element disability
                $('#content_disabilities span#disability').attr('id', 'disability' + count_disabilities);
                $('#content_disabilities label[for="name"]').attr('for', 'name' + count_disabilities);
                $('#content_disabilities select#name').each(function(i){
                    $(this).attr('name', 'name' + count_disabilities);
                    $(this).attr('id', 'name' + count_disabilities);
                });

                $('label[for="treatment_disability"]').attr('for', 'treatment_disability' + count_disabilities);
                $('input:radio.treatment_disability').each(function(i){
                    $(this).attr('name', 'treatment_disability' + count_disabilities);
                    $(this).attr('id', 'treatment_disability' + count_disabilities);
                });

                $('label[for="detail_disability"]').attr('for', 'detail_disability' + count_disabilities);
                $('textarea#detail_disability').attr('name', 'detail_disability' + count_disabilities);
                $('textarea#detail_disability').attr('id', 'detail_disability' + count_disabilities);

                count_disabilities++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             *********************** Add Disease zone ************************
             *****************************************************************/


            $.fn.addElementDisease = function() {

                $disease = '<span id="disease"><div class="row"><div class="col-md-12"><span class="title-elements text-success">Enfermedad #' + (count_diseases + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Enfermedad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("name", "Enfermedad") !!}{!! Form::select("name", $diseases, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disease", "Está en tratamiento?") !!}<br/>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "si", false, ['class'=> 'treatment_disease']) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "no", true, ['class'=> 'treatment_disease']) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disease", "Detalle") !!}{!! Form::textarea("detail_disease", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("img_disease", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr />';

                if (count_diseases == 0)
                    $('#content_diseases').html($disease);
                else
                    $('#content_diseases').append($disease);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element disease
                $('#content_diseases span#disease').attr('id', 'disease' + count_diseases);
                $('#content_diseases label[for="name"]').attr('for', 'name' + count_diseases);
                $('#content_diseases select#name').each(function(i){
                    $(this).attr('name', 'name' + count_diseases);
                    $(this).attr('id', 'name' + count_diseases);
                });

                $('label[for="treatment_disease"]').attr('for', 'treatment_disease' + count_diseases);
                $('input:radio.treatment_disease').each(function(i){
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

                $family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><span class="title-elements text-warning">Carga Familiar #' + (count_family_responsability + 1) + '</span><a class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{{Form::label('name', 'Nombre Completo')}}{{Form::text('name', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('rut', 'Rut')}}{{Form::text('rut', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('kin_id', 'Parentesco')}}{{Form::select('kin_id', $kins, null, ['class'=> 'form-control'])}}</div></div></span><hr />';

                if (count_family_responsability == 0)
                    $('#content_family_responsabilities').html($family_responsability);
                else
                    $('#content_family_responsabilities').append($family_responsability);


                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element family_responsabilities
                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsability);
                $('#content_family_responsabilities label[for="name"]').attr('for', 'name' + count_family_responsability);
                $('#content_family_responsabilities input:text#name').attr('name', 'name' + count_family_responsability);
                $('#content_family_responsabilities input:text#name').attr('id', 'name' + count_family_responsability);

                $('#content_family_responsabilities label[for="rut"]').attr('for', 'rut' + count_family_responsability);
                $('#content_family_responsabilities input#rut').attr('name', 'rut' + count_family_responsability);
                $('#content_family_responsabilities input#rut').attr('id', 'rut' + count_family_responsability);

                $('#label[for="kin_id"]').attr('for', 'kin_id' + count_family_responsability);
                $('#select#kin_id').attr('name', 'kin_id' + count_family_responsability);
                $('#select#kin_id').attr('id', 'kin_id' + count_family_responsability);

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
             ********************** Add Family_ zone ********************
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
        });

    </script>
@stop