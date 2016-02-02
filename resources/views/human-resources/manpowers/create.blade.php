@extends('layout.index')

@section('css')
    {{ Html::style('assets/css/jquery-validate/screen.css') }}
    {{ Html::Style('assets/css/bwizard-steps.css') }}
    {{ Html::Style('assets/css/dropzone.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div id="rootwizard" class="tabbable tabs-left">
        <ul>
            <li><a href="#tab1" data-toggle="tab"><i id="paso1" class="fa fa-clock-o"></i> Paso 1</a></li>
            <li><a href="#tab2" data-toggle="tab"><i id="paso2" class="fa fa-clock-o"></i> Paso 2</a></li>
            <li><a href="#tab3" data-toggle="tab"><i id="paso3" class="fa fa-clock-o"></i> Paso 3</a></li>
            <li><a href="#tab4" data-toggle="tab"><i id="paso4" class="fa fa-clock-o"></i> Paso 4</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane" id="tab1">
                <br>
                @include('human-resources.manpowers.partials.step1.personal_data')
            </div>
            <div class="tab-pane" id="tab2">
                <br>
                @include('human-resources.manpowers.partials.step2.autentication')
            </div>
            <div class="tab-pane" id="tab3">
                <br>
                @include('human-resources.manpowers.partials.step3.health')
            </div>
            <div class="tab-pane" id="tab4">
                <br>
                @include('human-resources.manpowers.partials.step4.job_skills')
            </div>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/jquery.bootstrap.wizard.js') }}
    {{ Html::script('assets/js/jquery.validate.js') }}
    {{ Html::script('assets/js/messages_es.js') }}
    {{ Html::script('assets/js/dropzone.js') }}

    <script type="text/javascript">

        $(document).ready(function(){


            $.getScript("/me/js/manpowers/validate_base.js", function(){});


            /****************************************************
             ******** Configure Twitter Bootstrap Wizard ********
             ****************************************************/

            $('#rootwizard').bootstrapWizard({

                'tabClass': 'bwizard-steps',

                onTabClick: function(tab, navigation, index) {
                    return false;
                },

                onNext: function(tab, navigation, index) {

                    var currentTab = index + 1;

                    switch (currentTab)
                    {

                        case 2:
                            $.getScript("/me/js/manpowers/personal_data_rules.js", function(){});
                            var $valid = $("#step1").valid();
                            $('#paso1').replaceWith('<i id="paso1" class="fa fa-check"></i>');

                            break;

                        case 3:

                            var $html = '<div class="row"><div class="col-md-6">{!! Form::label("disability", "Enfermedad") !!}{!! Form::select("disability[]", $disabilities, null, ["class" => "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment", "Está en tratamiento?") !!}<br>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment[]", "si", false) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment[]", "no", true) !!}</div></div><p></p><div class="row"><div class="col-md-12">{!! Form::label("detail", "Detalle") !!}{!! Form::textarea("detail[]", null, ["class" => "form-control", "rows" => "3"]) !!}</div></div><p></p><div class="row"><div class="col-md-12">{!! Form::label("images", "Seleccione Imágenes...") !!}<div id="dZUpload" class="dropzone"><div class="dz-default dz-message"></div></div></div></div><hr>';

                            $('input[name="disability"]').change(function(){
                                $('#disabilities').html($html);
                                $('#addElementDisability').removeClass('hide');

                                /* Load Dropzone */
                                $("div#dZUpload").dropzone({
                                    url: "/human-resources/manpowers/step3",

                                    init: function() {
                                        var dz = this;

                                        $("form#form-guest-upload button[type=submit]").click(
                                                function(e) {
                                                    // I want the form to actually go to the page
                                                    // so that I can see the input data, therefore I
                                                    // have commented the two lines below

                                                    //e.preventDefault();
                                                    //e.stopPropagation();
                                                    dz.processQueue();
                                                }
                                        );
                                    }

                                });
                            });

                            $('#paso2').replaceWith('<i id="paso2" class="fa fa-check"></i>');

                            break;

                        case 4:

                            $('#paso3').replaceWith('<i id="paso3" class="fa fa-check"></i>');
                            break;
                    }

                    /*if(!$valid) {
                     $validator.focusInvalid();
                     return false;
                     }*/
                },

                onPrevious: function(tab, navigation, index) {

                    var currentTab = index + 1;

                    switch (currentTab)
                    {
                        case 1:
                            $('#paso1').replaceWith('<i id="paso1" class="fa fa-clock-o"></i>');

                            break;

                        case 2:
                            $('#paso2').replaceWith('<i id="paso2" class="fa fa-clock-o"></i>');
                            break;

                        case 3:
                            $('#paso3').replaceWith('<i id="paso3" class="fa fa-clock-o"></i>');
                            break;

                        case 4:
                            alert('paso 4');

                            break;
                    }

                    /*if(!$valid) {
                     $validator.focusInvalid();
                     return false;
                     }*/
                },
            });


            /****************************************************
             ******************* Function Zone ******************
             ****************************************************/

            $.fn.addElementDisability = function(element) {
                $("#disabilities").clone().insertAfter("span hr");
            }

        });

    </script>
@stop