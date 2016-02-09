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
    {{ Html::script('me/js/manpowers/validation_step1.js') }}


    <script type="text/javascript">

        $(document).ready(function() {

            /******************************************************************
            *************************** Variables *****************************
            ******************************************************************/

            var count_disabilities = 0;


            /******************************************************************
            ******* Configure and validations SmartWizardJquery Section *******
            ******************************************************************/

            $('#wizard').smartWizard({
                labelNext:'Siguiente',
                labelPrevious:'Anterior',
                labelFinish:'Guardar',
                onLeaveStep: leaveAStepCallback,
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
            *********************** Add Disability zone **********************
            ******************************************************************/

            $.fn.addElementDisability = function() {

                $disability = '<span id="disability"><div class="row"><div class="col-md-6">{!! Form::label("disability", "Enfermedad") !!}{!! Form::select("disability", $disabilities, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment", "Está en tratamiento?") !!}<br />{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment", "si", false, ['class' => 'treatment']) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment", "no", true, ['class' => 'treatment']) !!}</div></div><br /><div class="row"><div class="col-md-12">{!! Form::label("detail", "Detalle") !!}{!! Form::textarea("detail", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br /><div class="row"><div class="col-md-12">{!! Form::label("images", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone dropzone-previews"><div class="dz-default dz-message"><h3 class="text-primary">Arrastre sus archivos hasta aquí</h3><span class="text-muted">(También puede hacer click y seleccionarlos manualmente)</span></div></div></div></div></span><hr>';

                if (count_disabilities == 0) {
                    $('#content_disabilities').html($disability);
                    $("#wizard").smartWizard("fixHeight");
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
                    $("#wizard").smartWizard("fixHeight");
                }

                //Refresh N° element
                $('span#disability').attr('id', 'disability' + count_disabilities);
                $('label[for="disability"]').attr('for', 'disability' + count_disabilities);
                $('select#disability').each(function(i){
                    $(this).attr('name', 'disability' + count_disabilities);
                    $(this).attr('id', 'disability' + count_disabilities);
                });

                $('label[for="treatment"]').attr('for', 'treatment' + count_disabilities);
                $('input:radio.treatment').each(function(i){
                    $(this).attr('name', 'treatment' + count_disabilities);
                    $(this).attr('id', 'treatment' + count_disabilities);
                });

                $('label[for="detail"]').attr('for', 'detail' + count_disabilities);
                $('textarea#detail').attr('name', 'detail' + count_disabilities);
                $('textarea#detail').attr('id', 'detail' + count_disabilities);


                count_disabilities++;
            }


        });

    </script>
@stop