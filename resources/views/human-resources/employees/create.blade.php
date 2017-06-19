@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/human-resources/employees/create-edit-custom-employees.css') }}">
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('employees.index') }}"><i class="md-accounts font-size-16"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">

            {{-- Panel Wizard Form --}}
            <div id="form_new_employee" class="wizard">

                {{-- Steps --}}
                <div class="steps wizard-steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
                    <div class="step col-sm-4 col-md-4 current" data-target="#datos_personales" role="tab">
                        <span class="step-number">1</span>
                        <div class="step-desc">
                            <span class="step-title">Información</span>
                            <p>Personal</p>
                        </div>
                    </div>
                    <div class="step col-sm-4 col-md-4" data-target="#competencias_laborales" role="tab">
                        <span class="step-number">2</span>
                        <div class="step-desc">
                            <span class="step-title">Competencias</span>
                            <p>Laborales</p>
                        </div>
                    </div>
                    <div class="step col-sm-4 col-md-4" data-target="#info_salud" role="tab">
                        <span class="step-number">3</span>
                        <div class="step-desc">
                            <span class="step-title">Información</span>
                            <p>de Salud</p>
                        </div>
                    </div>
                </div>
                {{-- End Steps --}}

                @include('layout.messages.errors-js')

                {{-- Wizard Content --}}
                <div class="wizard-content">
                    <div class="wizard-pane active" id="datos_personales" role="tabpanel">

                        {{ Form::open(array("route" => "step1", "method" => "POST", "files" => true, "id" => "step1")) }}

                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon fa fa-check-square-o text-primary"></i> Datos Personales</h3>
                                </div>
                                <div class="panel-body">

                                    @include('human-resources.employees.partials.create.step1.personal_data')

                                </div>
                            </div>
                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i> Información de Contacto</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-success add_contact_employee waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Contacto</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="content_contact_employee">

                                        @if (Session::get('count_contacts') > 0)
                                            @for($i = 0; $i < Session::get('count_contacts'); $i++)

                                                @include('human-resources.employees.partials.create.step1.contact_employee')

                                            @endfor
                                        @else
                                            <br/>
                                            <h3 class="text-center text-success">No existe Información de Contacto Asociada
                                                <br/>
                                                <small>(Pulse "Agregar Contacto" para comenzar su adición)
                                                </small>
                                            </h3>
                                            <br/>
                                            <br/>
                                        @endif

                                    </div>
                                    <div id="EmailContactEmployee" class="row hide">
                                        <br />
                                        <div class="col-md-12 text-center">
                                            @include('layout.ajax.show_spin_icon')
                                        </div>
                                    </div>
                                    <br/>

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

                        {{ Form::open(["route" => "step2", "method" => "POST", "id" => "step2"]) }}

                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon md-library text-info font-size-18"></i> Estudios Académicos</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-info add_study waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Estudio Académico</span>
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
                                    <h3 class="panel-title"><i class="icon md-badge-check text-danger font-size-18"></i> Certificaciones</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-danger add_certification waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Certificación</span>
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
                                    <h3 class="panel-title"><i class="icon fa fa-wrench text-warning"></i> Especialidades</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-warning add_speciality waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Especialidad</span>
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
                                    <h3 class="panel-title"><i class="icon fa fa-bookmark text-success" style="font-size: 16px;"></i></i> Licencias Profesionales</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-success add_professional_license waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Licencia Profesional</span>
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

                        {{ Form::open(["route" => "employees.store", "method" => "POST", "id" => "step3"]) }}

                            <div class="panel panel-bordered">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon fa fa-wheelchair text-warning"></i> Discapacidades</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-warning add_disabilities waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Discapacidad</span>
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
                                        <span class="label label-outline label-success add_diseases waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Enfermedad</span>
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
                                    <h3 class="panel-title"><i class="icon fa fa-stethoscope text-info"></i> Exámenes Preocupacionales</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-info add_exams waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Examen Preocupacional</span>
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
                                    <h3 class="panel-title"><i class="icon fa fa-child text-danger"></i> Cargas Familiares</h3>
                                    <div class="panel-actions">
                                        <span class="label label-outline label-danger add_family_responsability waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Carga Familiar</span>
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
                            <div class="row hide show-icon">
                                <div class="col-md-12 text-center">
                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-primary"></i><span class="sr-only">Loading...</span>
                                </div>
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
            <a href="{{ route('employees.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/human-resources/employees/create-edit-custom-employees.js') }}"></script>

    <script type="text/javascript">

        $(document).on( "change", "input[name=doc]", function()
        {
            if ($(this).val() == 'rut') {
                $('#rutField').html('<label for="rut" class="control-label">Rut Nacional</label> <i data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true" class="fa fa-info-circle tooltip-primary text-primary"></i><input id="rut" name="rut" type="text" class="form-control check_rut">');
            }

            if ($(this).val() == 'passport') {
                $('#rutField').html('<label for="passport" class="control-label">Pasaporte</label><input name="rut" type="text" class="form-control">');
            }

            if ($(this).val() == 'foreign') {
                $('#rutField').html('<label for="foreign" class="control-label">Rut Extranjero</label> <i data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true" class="fa fa-info-circle tooltip-primary text-primary"></i><input id="foreign" name="rut" type="text" class="form-control format_rut">');
            }

            $('.tooltip-primary').tooltip();
        });

        $(document).ready(function () {

            var count_contacts                  = {{ Session::get('count_contacts') ? Session::get('count_contacts') : 0 }}
            var count_family_relationships      = {{ Session::get('count_family_relationships') ? Session::get('count_family_relationships') : 0 }};
            var count_studies                   = {{ Session::get('count_studies') ? Session::get('count_studies') : 0 }};
            var count_certifications            = {{ Session::get('count_certifications') ? Session::get('count_certifications') : 0 }};
            var count_specialities              = {{ Session::get('count_specialities') ? Session::get('count_specialities') : 0 }};
            var count_professional_licenses     = {{ Session::get('count_professional_licenses') ? Session::get('count_professional_licenses') : 0 }};
            var count_disabilities              = 0;
            var count_diseases                  = 0;
            var count_exams                     = 0;
            var count_family_responsabilities   = 0;

            /**
             *  Constructor Wizard
             */

            var wizard = $('#form_new_employee').wizard({}).data('wizard');

            /**
             *  Initializa date type (before and after today)
             */

            initializaComponentsWithDateBeforeCurrentDate();

            initializaComponentsWithDateAfterCurrentDate();

            function initializaComponentsWithDateBeforeCurrentDate() {

                $('.input-group.date.beforeCurrentDate').datepicker({
                    autoclose: true,
                    language: 'es',
                    format: 'dd-mm-yyyy',
                    orientation: "bottom",
                    endDate: new Date(),
                    todayBtn: true,
                    todayHighlight: true
                });

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
            }

            function initializaComponentsWithDateAfterCurrentDate() {

                $('.input-group.date.afterCurrentDate').datepicker({
                    autoclose: true,
                    language: 'es',
                    format: 'dd-mm-yyyy',
                    orientation: "bottom",
                    startDate: new Date(),
                    todayBtn: true,
                    todayHighlight: true
                });

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
            }

            /**
             *  Validation and Submit Step 1
             */

            wizard.get('#datos_personales').setValidator(function () {

                if (validateStep1()) {

                    var full_name   = capitalize($('#first_name').val()) + " " + capitalize($('#second_name').val()) + " " + capitalize($('#male_surname').val()) + " " + capitalize($('#female_surname').val());
                    var status      = false;

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("step1") }}',
                        data: $('#step1').serialize() + "&full_name=" + full_name + "&count_family_relationships=" + count_family_relationships + "&count_contacts=" + count_contacts,
                        async: false,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                status = true;
                                scrollTop();
                            } else {
                                swal("Oops", "Ha ocurrido un error. No es posible conectar con el servidor.", "error");
                            }
                        },
                        error: function (response) {
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });

                            scrollTop();
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
                        url: '{{ route("step2") }}',
                        data: $('#step2').serialize() + "&count_studies=" + count_studies + "&count_certifications=" + count_certifications + "&count_specialities=" + count_specialities + "&count_professional_licenses=" + count_professional_licenses + "&count_disabilities=" + count_disabilities,
                        async: false,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                $('#js').addClass('hide');
                                status = true;
                                scrollTop();
                            } else {
                                swal("Oops", "Ha ocurrido un error. No es posible conectar con el servidor.", "error");
                            }
                        },
                        error: function (response) {
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });

                            scrollTop();

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

                    $('.finish').addClass('btn-success');
                    $('.replace-icon').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Guardando...');

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("employees.store") }}',
                        data: $('#step3').serialize() + "&count_disabilities=" + count_disabilities + "&count_diseases=" + count_diseases + "&count_exams=" + count_exams + "&count_family_responsabilities=" + count_family_responsabilities,
                        async: true,
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                window.location.href = response.url;
                            } else {
                                swal("Oops", "Ha ocurrido un error. No es posible conectar con el servidor.", "error");
                            }
                        },
                        error: function (response) {
                            $('.finish').removeClass('btn-warning').addClass('btn-primary');
                            $('.replace-icon').html('<i class="fa fa-floppy-o"></i> Guardar');
                            var errors = $.parseJSON(response.responseText);
                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                                return false;
                            });

                            scrollTop();
                        }
                    });
                }

            });

            /**
             *  Add Contact
             */

            $('.add_contact_employee').click(function() {

                var contact = '<span id="contact"><div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_contact" class="text-success"> Contacto #' + (count_contacts + 1) + ' </span> <a id="contact" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Contacto" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide">{{Form::label("id_contact", "ID", ["class"=> "control-label"])}}{{Form::text("id_contact[]", 0, ["id"=> "id_contact", "class"=> "form-control"])}}</div><div class="col-sm-4 col-md-3 form-group"> {{Form::label("contact_relationship_id", "Relación", ["class"=> "control-label"])}}{{Form::select("contact_relationship_id[]", $relationships, null, ["class"=> "form-control"])}}</div><div class="col-sm-4 col-md-6 form-group">{{Form::label('name_contact', 'Nombre', ['class'=> 'control-label'])}}{{Form::text('name_contact[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '120'])}}</div><div class="col-sm-4 col-md-3 form-group">{{Form::label('tel_contact', 'Teléfono', ['class'=> 'control-label'])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text('tel_contact[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '20'])}}</div></div></div><div class="row"><div class="col-sm-6 col-md-6 form-group">{{Form::label('email_contact', 'Email', ['class'=> 'control-label'])}}{{Form::text('email_contact[]', null, ['id' => 'EmailContactEmployee', 'class'=> 'form-control maxlength', 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60'])}}</div><div class="col-sm-6 col-md-6 form-group">{{Form::label('address_contact', 'Dirección', ['class'=> 'control-label'])}}{{Form::text('address_contact[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '100'])}}</div></div><br /></span>';

                if (count_contacts == 0)
                    $('#content_contact_employee').html(contact);
                else
                    $('#content_contact_employee').append(contact);

                $('span#contact').attr('id', 'contact' + count_contacts);
                $('span#num_contact').attr('id', 'num_contact' + count_contacts);

                $('.maxlength').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 15
                });
                $('.tooltip-danger').tooltip();
                count_contacts++;

            });

            /**
             *  Add Family Relationships
             */

            $('.add_family_relationship').click(function () {

                var family_relationship = '<span id="family_relationship"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_family_relationship" class="text-warning">Parentesco Familiar #' + (count_family_relationships + 1) + '</span> <a id="family_relationship" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Parentesco Familiar" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide"> {{Form::label("id_family_relationship", "ID", ["class"=> "control-label"])}}{{Form::text("id_family_relationship[]", 0, ["id"=> "id_family_relationship", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-6 form-group"> {{Form::label('relationship_id[]', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-6 form-group"> {{Form::label('employee_family_id[]', 'Nombre Familiar', ['class'=> 'control-label'])}}{{Form::select('employee_family_id[]', $employees, null, ['class'=> 'form-control'])}}</div></div><br/></span>';

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

                var study = '<span id="study"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study" class="text-info">Estudio Académico #' + (count_studies + 1) + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide">{{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group">{{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 6, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group">{{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '80'])}}</div><div class="col-sm-6 col-md-4 form-group hide">{{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group">{{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group">{{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/></span>';

                if (count_studies == 0)
                    $('#content_studies').html(study);
                else
                    $('#content_studies').append(study);

                $('span#study').attr('id', 'study' + count_studies);
                $('span#num_study').attr('id', 'num_study' + count_studies);

                $('.maxlength').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 15
                });
                initializaComponentsWithDateBeforeCurrentDate();
                count_studies++;

            });

            /**
             *  Add Certifications
             */

            $('.add_certification').click(function () {

                var certification = '<span id="certification"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-danger alert-dismissible" role="alert"> <span id="num_certification" class="text-danger">Certificación #' + (count_certifications + 1) + '</span> <a id="certification" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Certificación" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> {{Form::label("id_certification", "ID", ["class"=> "control-label"])}}{{Form::text("id_certification[]", 0, ["id"=> "id_certification", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('type_certification_id', 'Tipo Certificación', ['class'=> 'control-label'])}}{{Form::select('type_certification_id[]', $typeCertifications, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('institution_certification_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_certification_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('emission_certification', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_certification[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('expired_certification', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_certification[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/></span>';

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

                var speciality = '<span id="speciality"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_speciality" class="text-warning">Especialidad #' + (count_specialities + 1) + '</span> <a id="speciality" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Especialidad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> {{Form::label("id_speciality", "ID", ["class"=> "control-label"])}}{{Form::text("id_speciality[]", 0, ["id"=> "id_speciality", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('type_speciality_id', 'Tipo Especialidad', ['class'=> 'control-label'])}}{{Form::select('type_speciality_id[]', $typeSpecialities, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('institution_speciality_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_speciality_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('emission_speciality', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_speciality[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('expired_speciality', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_speciality[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/></span>';

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

                var professional_license = '<span id="license"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_license" class="text-success">Licencia Profesional #' + (count_professional_licenses + 1) + '</span> <a id="license" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Licencia Profesional" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> {{Form::label("id_professional_license", "ID", ["class"=> "control-label"])}}{{Form::text("id_professional_license[]", 0, ["id"=> "id_professional_license", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('type_professional_license_id', 'Tipo Licencia', ['class'=> 'control-label'])}}{{Form::select('type_professional_license_id[]', $typeProfessionalLicenses, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-offset-2 col-md-2 form-group text-center"> {{Form::label("is_donor", "Es donante?")}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 1, false)}}{{Form::label("is_donor", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("is_donor", 0, true)}}{{Form::label("is_donor", "No", ['class'=> 'control-label'])}}</div></li></ul> </div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('emission_license', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_license[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('expired_license', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_license[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><div class="row"> <div class="col-sm-12 col-md-12 form-group"> {{Form::label('detail_license', 'Restricciones', ['class'=> 'control-label'])}}{{Form::textarea('detail_license[]', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div><br/></span>';

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

                var disability = '<span id="disability"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_disability" class="text-warning"> Discapacidad #' + (count_disabilities + 1) + '</span> <a id="disability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Discapacidad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 hide"> {{Form::label("id_disability", "ID", ["class"=> "control-label"])}}{{Form::text("id_disability[]", 0, ["id"=> "id_disability", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-6 form-group"> {{Form::label("type_disability_id", "Tipo Discapacidad", ['class'=> 'control-label'])}}{{Form::select("type_disability_id[]", $typeDisabilities, null, ["class"=> "form-control"])}}</div><div class="col-sm-6 col-md-6 form-group text-center"> {{Form::label("treatment_disability", "Está en tratamiento?", ['class'=> 'control-label'])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 1, false)}}{{Form::label("treatment_disability", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disability", 0, true)}}{{Form::label("treatment_disability", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div><div class="row"> <div class="col-sm-12 col-md-12 form-group"> {{Form::label("detail_disability", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disability[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div><br/></span>';

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

                var disease = '<span id="disease"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_disease" class="text-success"> Enfermedad #' + (count_diseases + 1) + ' </span> <a id="disease" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Enfermedad" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> {{Form::label("id_disease", "ID", ["class"=> "control-label"])}}{{Form::text("id_disease[]", 0, ["id"=> "id_disease", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-6 form-group"> {{Form::label("type_disease_id", "Tipo Enfermedad", ['class'=> 'control-label'])}}{{Form::select("type_disease_id[]", $typeDiseases, null, ["class"=> "form-control"])}}</div><div class="col-sm-6 col-md-6 form-group text-center"> {{Form::label("treatment_disease", "Está en tratamiento?", ["class"=> "control-label"])}}<ul class="list-unstyled list-inline"> <li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 1, false)}}{{Form::label("treatment_disease", "Si", ['class'=> 'control-label'])}}</div></li><li> <div class="radio-custom radio-primary">{{Form::radio("treatment_disease", 0, true)}}{{Form::label("treatment_disease", "No", ['class'=> 'control-label'])}}</div></li></ul> </div></div><div class="row"> <div class="col-sm-12 col-md-12 form-group"> {{Form::label("detail_disease", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_disease[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div><br/></span>';

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

                var exam = '<span id="exam"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_exam" class="text-info"> Examen Preocupacional #' + (count_exams + 1) + ' </span> <a id="exam" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Examen Preocupacional" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> {{Form::label("id_exam", "ID", ["class"=> "control-label"])}}{{Form::text("id_exam[]", 0, ["id"=> "id_exam", "class"=> "form-control"])}}</div><div class="col-sm-12 col-md-4 form-group"> {{Form::label('type_exam_id', 'Examen', ['class'=> 'control-label'])}}{{Form::select('type_exam_id[]', $typeExams, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('emission_exam', 'Fecha Emisión', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('emission_exam[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('expired_exam', 'Fecha Expiración', ['class'=> 'control-label'])}}<div class="input-group date afterCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired_exam[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><div class="row"> <div class="col-sm-12 col-md-12 form-group"> {{Form::label("detail_exam", "Detalle", ['class'=> 'control-label'])}}{{Form::textarea("detail_exam[]", null, ["class"=> "form-control", "rows"=> "3"])}}</div></div><br/></span>';

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

                var family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-danger alert-dismissible" role="alert"><span id="num_family_responsability" class="text-danger"> Carga Familiar #' + (count_family_responsabilities + 1) + ' </span><a id="family_responsability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Carga Familiar" data-html="true"><i class="fa fa-trash"></i></a></div></div></div><div class="row"><div class="col-md-1 hide"> {{Form::label("id_family_responsability", "ID", ["class"=> "control-label"])}}{{Form::text("id_family_responsability[]", 0, ["id"=> "id_family_responsability", "class"=> "form-control"])}}</div><div class="col-sm-12 col-md-6 form-group"> {{Form::label('name_responsability', 'Nombre Completo', ['class'=> 'control-label'])}}{{Form::text('name_responsability[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '120'])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('rut_responsability', 'Rut', ['class'=> 'control-label'])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>{{Form::text('rut_responsability[]', null, ['class'=> 'form-control check_rut'])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('relationship_id', 'Relación', ['class'=> 'control-label'])}}{{Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control'])}}</div></div><br/></span>';

                if (count_family_responsabilities == 0)
                    $('#content_family_responsabilities').html(family_responsability);
                else
                    $('#content_family_responsabilities').append(family_responsability);

                $('span#family_responsability').attr('id', 'family_responsability' + count_family_responsabilities);
                $('span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsabilities);

                $('.maxlength').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 15
                });
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
                    case 'contact':

                        for (var i = 0; i < span.length; i++) {

                            var item = verificaUltimosNumeros(span[i].id);

                            $('span#num_contact' + item).text('Contacto #' + (i + 1));
                            $('span#num_contact' + item).attr('id', 'num_contact' + i);
                            $('span#contact' + item).attr('id', 'contact' + i);

                        }

                        count_contacts--;
                        if (count_contacts == 0) {
                            var html = '<br /><h3 class="text-center text-success">No existe Información de Contacto Asociada <br /><small>(Pulse "Agregar Contacto" para comenzar su adición)</small></h3><br /><br />'
                            $('#content_contact_employee').html(html);
                        }


                        break;

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

            /**
             *  Change Study Option Select
             */

            $(document).on('change', '.degrees', function () {

                var html           = '';
                var value          = $(this).val();
                var study          = $(this).parent().parent().parent().attr('id');
                var num_study      = verificaUltimosNumeros($(this).parent().parent().parent().attr('id'));
                var text_num_study = verificaUltimosNumeros($.trim($(this).parent().parent().prev().find('span').text()));

                // add num_study a id
                switch (value) {
                    case '1':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label("degree_id", "Nivel de Estudio", ["class"=> "control-label"])}}{{Form::select("degree_id[]", $degrees, 1, ["class"=> "form-control degrees"])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin'=> 'maxlength', 'maxlength'=> '50'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group hide"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label("date_obtention", "Fecha Obtención", ["class"=> "control-label"])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("date_obtention[]", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><br/>';
                        break;
                    case '2':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label("degree_id", "Nivel de Estudio", ["class"=> "control-label"])}}{{Form::select("degree_id[]", $degrees, 2, ["class"=> "form-control degrees"])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin'=> 'maxlength', 'maxlength'=> '50'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group hide"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label("date_obtention", "Fecha Obtención", ["class"=> "control-label"])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("date_obtention[]", null, ["class"=> "form-control text-center", "readonly"])}}</div></div></div><br/>';
                        break;

                    case '3':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 3, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin'=> 'maxlength', 'maxlength'=> '50'])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('name_institution', 'Institución', ['class'=> 'control-label'])}}{{Form::text('name_institution[]', null, ['class'=> 'form-control maxlength', 'data-plugin'=> 'maxlength', 'maxlength'=> '80'])}}</div><div class="col-sm-6 col-md-3 form-group hide"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;

                    case '4':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 4, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '50'])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;

                    case '5':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 5, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '50'])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;

                    case '6':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 6, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '50'])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;

                    case '7':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 7, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '50'])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;

                    case '8':
                        html = '<div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-info alert-dismissible" role="alert"> <span id="num_study' + num_study + '" class="text-info">Estudio Académico #' + text_num_study + '</span> <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"><div class="col-md-1 form-group hide"> {{Form::label("id_study", "ID", ["class"=> "control-label"])}}{{Form::text("id_study[]", 0, ["id"=> "id_study", "class"=> "form-control"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('degree_id', 'Nivel de Estudio', ['class'=> 'control-label'])}}{{Form::select('degree_id[]', $degrees, 8, ['class'=> 'form-control degrees'])}}</div><div class="col-sm-6 col-md-4 form-group"> {{Form::label('name_study', 'Profesión u Oficio', ['class'=> 'control-label'])}}{{Form::text('name_study[]', null, ['class'=> 'form-control maxlength', 'data-plugin' => 'maxlength', 'maxlength' => '50'])}}</div><div class="col-sm-6 col-md-4 form-group hide"> {{Form::label("name_institution", "Institución", ["class"=> "control-label"])}}{{Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"])}}</div><div class="col-sm-6 col-md-3 form-group"> {{Form::label('institution_study_id', 'Institución', ['class'=> 'control-label'])}}{{Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control'])}}</div><div class="col-sm-6 col-md-2 form-group"> {{Form::label('date_obtention', 'Fecha Obtención', ['class'=> 'control-label'])}}<div class="input-group date beforeCurrentDate"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('date_obtention[]', null, ['class'=> 'form-control text-center', 'readonly'])}}</div></div></div><br/>';
                        break;
                }

                $('#' + study).html(html);

                $('.maxlength').maxlength({
                    placement: 'bottom-right-inside',
                    threshold: 15
                });

                initializaComponentsWithDateBeforeCurrentDate();
            });

        });

    </script>
@stop