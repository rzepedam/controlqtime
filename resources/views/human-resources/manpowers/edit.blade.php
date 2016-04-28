@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/jquery-wizard.css') }}
    {{ Html::style('assets/css/formValidation.css') }}
    {{ Html::style('assets/css/ribbon.css') }}
    {{ Html::style('assets/css/webui-popover.css') }}
    {{ Html::style('assets/css/bootstrap-datepicker.css') }}
    {{ Html::style('assets/css/cropper.css') }}
    {{ Html::style('assets/css/image-cropping.css') }}

@stop

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-users"></i> Trabajadores</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div class="row">
        <div class="col-md-12">
            {{-- Panel Wizard Form --}}
            <div id="form_edit_manpower">
                {{-- Steps --}}
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
                {{-- End Steps --}}
                {{-- Wizard Content --}}
                <div class="wizard-content">
                    <div class="wizard-pane active" id="datos_personales" role="tabpanel">

                        {{ Form::model($manpower, array("route" => array("human-resources.manpowers.updateStep1", $manpower->id), "method" => "PUT", "files" => true, "id" => "step1")) }}

                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon fa fa-check-square-o text-primary"></i> Datos Personales</h3>
                                </div>
                                <div class="panel-body">

                                    @include('human-resources.manpowers.partials.edit.step1.personal_data')

                                </div>
                            </div>
                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon fa fa-picture-o text-info"></i> Imagen de Perfil</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-12 text-center">

                                            <img src="{{ asset('assets/images/5.jpg') }}" />

                                        </div>
                                        <div class="col-md-3">
                                            <div class="cropper-preview clearfix" id="simpleCropperPreview">

                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                </div>
                            </div>
                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon md-male-female text-warning font-size-18"></i> Parentescos Familiares</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-warning add_family_relationship waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Parentesco Familiar</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="content_family_relationships">

                                        @if ($manpower->num_family_relationship > 0)
                                            <?php $i = 0; ?>
                                            @foreach($manpower->familyRelationships as $family_relationship)

                                                @include('human-resources.manpowers.partials.edit.step1.family_relationship')

                                            @endforeach

                                        @else

                                            <br />
                                            <h3 class="text-center text-warning">No existen Parentescos Familiares Asociados <br /><small>(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h3>
                                            <br />
                                            <br />

                                        @endif

                                    </div>
                                    <br />

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
            <a href="{{ route('human-resources.manpowers.index') }}">Volver</a>
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
    {{ Html::script('assets/js/formValidation.js') }}
    {{ Html::script('assets/js/form-validation/bootstrap.js') }}
    {{ Html::script('assets/js/jquery.matchHeight-min.js') }}
    {{ Html::script('assets/js/jquery-wizard.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.es.min.js') }}
    {{ Html::script('assets/js/jquery.webui-popover.js') }}
    {{ Html::script('assets/js/cropper.min.js') }}
    {{ Html::script('assets/js/components/jquery-wizard.js') }}
    {{ Html::script('assets/js/components/matchheight.js') }}
    {{ Html::script('assets/js/components/webui-popover.js') }}
    {{ Html::script('assets/js/components/bootstrap-datepicker.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            /******************************************************************
             *************************** Variables ****************************
             ******************************************************************/


            var count_family_relationships      = {{ $manpower->num_family_relationship }};
            var count_studies                   = {{ count($manpower->studies) }};
            var count_certifications            = {{ count($manpower->certifications) }};
            var count_specialities              = {{ count($manpower->specialities) }};
            var count_licenses                  = {{ count($manpower->professionalLicenses) }};
            var count_disabilities              = {{ count($manpower->disabilities) }};
            var count_diseases                  = {{ count($manpower->diseases) }};
            var count_exams                     = {{ count($manpower->exams) }};
            var count_family_responsabilities   = {{ count($manpower->familyResponsabilities) }};

            var id_delete_family_relationship   = [];


            /******************************************************************
             ********************* Initialize components ***********************
             ******************************************************************/


            var defaults = $.components.getDefaults("wizard");

            var options = $.extend(true, {}, defaults, {
                buttonsAppendTo: '.content-step',
                buttonLabels: {
                    next: '<i class="fa fa-refresh"></i> Actualizar y Continuar',
                }
            });

            var wizard = $("#form_edit_manpower").wizard(options).data('wizard');

            wizard.get("#datos_personales").setValidator(function() {
                var fv = $("#step1").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            /*wizard.get("#competencias_laborales").setValidator(function() {
                var fv = $("#step2").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });*/

            /*wizard.get("#info_salud").setValidator(function() {
                var fv = $("#step3").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });*/

            $('.mitooltip').tooltip();

            $('.beforeCurrentDate').datepicker({
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

            function initializeComponentsWithDateBeforeCurrentDate() {

                $('.mitooltip').tooltip();

                $('.input-group.date').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    language: 'es',
                    autoclose: true,
                    endDate: new Date(),
                    todayBtn: true,
                });
            }

            function initializeComponentsWithDateAfterCurrentDate() {

                $('.mitooltip').tooltip();

                $('.input-group.date').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    language: 'es',
                    autoclose: true,
                    startDate: new Date(),
                    todayBtn: true,
                });
            }


            $("#perfilImgCropper img").cropper({
                preview: "#simpleCropperPreview >.img-preview",
                //aspectRatio: 16 / 9,
                //background: false,
                responsive: true
            });


            /******************************************************************
             ************************ Delete elements *************************
             ******************************************************************/



            $(document).on('click', '.delete-elements', function () {

                var element     = $(this).attr('id');
                var padre       = $(this).parent().parent().parent().parent().parent();
                var num_element = verificaUltimosNumeros($(this).parent().parent().parent().parent().attr('id'));

                if (element == 'family_relationship') {
                    if ($('#id_family_relationship' + num_element).val() != 0) {
                        id_delete_family_relationship.push($('#id_family_relationship' + num_element).val());
                    }
                }

                $(this).parent().parent().parent().parent().remove();
                var span = padre.children("span");

                switch (element) {
                    case 'family_relationship':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_family_relationship' + item).text('Parentesco Familiar #' + (i + 1));
                            $('span#num_family_relationship' + item).attr('id', 'num_family_relationship' + i);
                            $('span#family_relationship' + item).attr('id', 'family_relationship' + i);

                            /*
                             * ID
                             */

                            $('label[for="id_family_relationship' + item + '"]').attr('for', "id_family_relationship" + i);
                            $('input#id_family_relationship' + item).attr('name', 'id_family_relationship' + i);
                            $('input#id_family_relationship' + item).attr('id', 'id_family_relationship' + i);

                            /*
                             * Relationship
                             */

                            $('label[for="relationship_id' + item + '"]').attr('for', "relationship_id" + i);
                            $('select#relationship_id' + item).each(function (j) {
                                $(this).attr('id', 'relationship_id' + i);
                                $(this).attr('name', 'relationship_id' + i);
                            });

                            /*
                             * Nombre Familiar
                             */

                            $('label[for="manpower_family_id' + item + '"]').attr('for', 'manpower_family_id' + i);
                            $('select#manpower_family_id' + item).each(function (j) {
                                $(this).attr('id', 'manpower_family_id' + i);
                                $(this).attr('name', 'manpower_family_id' + i);
                            });

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
             ************************** Validations **************************
             *****************************************************************/

            /*
             * Valido elementos dinámicos almacenados en BD. Esto porque al inicializar
             *
             * el componente de validación, este no toma en cuenta los campos precargados,
             *
             * solamente lo valida al momento de agregar manualmente en formulario.
             */

            if (count_family_relationships > 0) {

                for (var i = 0; i < count_family_relationships; i++) {

                    $('#step1')
                        .formValidation('addField', 'relationship_id' + count_family_relationships, {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Relación es obligatorio.'
                                 },*/
                                blank: {}
                            }
                        })
                }

            }


            $('#step1')
                .formValidation({
                    fields: {
                        male_surname: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Apellido Materno es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: 'El campo Apellido Materno no debe ser mayor que 30 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        female_surname: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Apellido Materno es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: 'El campo Apellido Materno no debe ser mayor que 30 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        first_name: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Primer Nombre es obligatorio.'
                                },
                                stringLength: {
                                    max: 30,
                                    message: 'El campo Primer Nombre no debe ser mayor que 30 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        second_name: {
                            validators: {
                                /*stringLength: {
                                    max: 30,
                                    message: 'El campo Segundo Nombre no debe ser mayor que 30 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        rut: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Rut es obligatorio.'
                                },
                                stringLength: {
                                    max: 15,
                                    message: 'El campo Rut no debe ser mayor que 15 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        birthday: {
                            validators: {
                                /*date: {
                                    format: 'DD-MM-YYYY',
                                    message: 'The date is not a valid'
                                },
                                notEmpty: {
                                    message: 'El campo Fecha de Nacimiento es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        nationality_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Nacionalidad es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        gender_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Sexo es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        address: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Dirección es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        region_id: {
                            validators: {
                                /*notEmpty: {
                                 message: 'El campo Región es obligatorio.'
                                 },*/
                                blank: {}
                            }
                        },
                        province_id: {
                            validators: {
                                /*notEmpty: {
                                 message: 'El campo Provincia es obligatorio.'
                                 },*/
                                blank: {}
                            }
                        },
                        commune_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Comuna es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        email: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Email es obligatorio.'
                                },
                                stringLength: {
                                    max: 100,
                                    message: 'El campo Email no debe ser mayor que 100 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        phone1: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Teléfono 1 es obligatorio.'
                                },
                                stringLength: {
                                    max: 20,
                                    message: 'El campo Teléfono 1 no debe ser mayor que 20 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        phone2: {
                            validators: {
                                /*stringLength: {
                                    max: 20,
                                    message: 'El campo Teléfono 2 no debe ser mayor que 20 caracteres.'
                                },*/
                                blank: {}
                            }
                        },
                        forecast_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Previsión es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        mutuality_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Mutualidad es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        pension_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo AFP es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        company_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Empresa es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        rating_id: {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Cargo es obligatorio.'
                                },*/
                                blank: {}
                            }
                        },
                        area_id: {
                            validators: {
                                /*notEmpty: {
                                 message: 'El campo Área es obligatorio.'
                                 },*/
                                blank: {}
                            }
                        },
                        code_internal: {
                            validators: {
                                /*notEmpty: {
                                 message: 'El campo Código Interno es obligatorio.'
                                 },*/
                                blank: {}
                            }
                        }
                    }
                })

                .on('click', '.add_family_relationship', function() {

                    $family_relationship = '<span id="family_relationship"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_family_relationship" class="text-warning">Parentesco Familiar #' + (count_family_relationships + 1) + '</span> <a id="family_relationship" class="delete-elements pull-right mitooltip" title="Eliminar Parentesco Familiar"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide">{{ Form::label("id_family_relationship", 0, ["class" => "control-label"]) }}{{ Form::text("id_family_relationship", 0, ["class" => "form-control"]) }}</div> <div class="col-md-6"> <div class="form-group">{{Form::label('relationship_id', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id', $relationships, null, ['class'=> 'form-control'])}}</div></div><div class="col-md-6"> <div class="form-group">{{Form::label('manpower_family_id', 'Nombre Familiar', ['class'=> 'control-label'])}}{{Form::select('manpower_family_id', $manpowers, null, ['class'=> 'form-control'])}}</div></div></div><br/></span>';

                    if (count_family_relationships == 0)
                        $('#content_family_relationships').html($family_relationship);
                    else
                        $('#content_family_relationships').append($family_relationship);

                    /*
                     * Div Contenedor, Nº elemento
                     */

                    $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationships);
                    $('span#num_family_relationship').attr('id', 'num_family_relationship' + count_family_relationships);

                    /*
                     * ID
                     */

                    $('label[for="id_family_relationship"]').attr('for', 'id_family_relationship' + count_family_relationships);
                    $('#id_family_relationship').each(function () {
                        $(this).attr('id', 'id_family_relationship' + count_family_relationships);
                        $(this).attr('name', 'id_family_relationship' + count_family_relationships);
                    });

                    /*
                     * Relación
                     */

                    $('label[for="relationship_id"]').attr('for', 'relationship_id' + count_family_relationships);
                    $('select#relationship_id').each(function () {
                        $(this).attr('id', 'relationship_id' + count_family_relationships);
                        $(this).attr('name', 'relationship_id' + count_family_relationships);
                    });

                    /*
                     * Nombre Familiar
                     */

                    $('label[for="manpower_family_id"]').attr('for', 'manpower_family_id' + count_family_relationships);
                    $('select#manpower_family_id').each(function () {
                        $(this).attr('id', 'manpower_family_id' + count_family_relationships);
                        $(this).attr('name', 'manpower_family_id' + count_family_relationships);
                    });

                    /*
                     * Validación
                     */

                    $('#step1')
                        .formValidation('addField', 'relationship_id' + count_family_relationships, {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Relación es obligatorio.'
                                },*/
                                blank: {}
                            }
                        })
                        .formValidation('addField', 'manpower_family_id' + count_family_relationships, {
                            validators: {
                                /*notEmpty: {
                                    message: 'El campo Nombre Familiar es obligatorio.'
                                },*/
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

                    $.ajax({
                        type: 'PUT',
                        url: $('#step1').attr('action'),
                        data: $('#step1').serialize() + "&full_name=" + full_name + "&count_family_relationships=" + count_family_relationships + "&id_delete_family_relationship=" + id_delete_family_relationship,
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
                            success: function(data) {
                                window.location.href = data[0].url;
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

        })

    </script>

@stop