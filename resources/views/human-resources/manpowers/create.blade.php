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
            {{ Form::open(["route" => "human-resources.manpowers.store", "method" => "POST", "files" => true, "id" => "step3"]) }}
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


            var count_family_relationship = {{ Session::get('count_family_relationship') ? Session::get('count_family_relationship') : 0  }};
            var count_disabilities = 0;
            var count_diseases = 0;
            var count_family_responsability = 0;
            var count_certification = 0;
            var count_license = 0;
            var count_speciality = 0;



            /******************************************************************
            ********************* Initialize components ***********************
            ******************************************************************/



            $('.mitooltip').tooltip();

            $('#wizard').smartWizard({
                labelNext:'Siguiente',
                labelPrevious:'Anterior',
                labelFinish:'Guardar',
                transitionEffect: 'slideleft',

            });

            //Cancel next step event in click event automatically, necesary for validation
            $('#sendElement').unbind('click');


            /******************************************************************
             ************************ Delete elements *************************
             ******************************************************************/


            function verificaUltimosNumeros(element)
            {
                var aux = element.charAt(element.length - 2);

                //Verificamos si penúltimo dígito es letra, si lo es solamente me quedo con último N°
                //Sino, retorno 2 últimos N°s
                if(isNaN(aux) == true){
                    num_element = element.charAt(element.length - 1);
                }else{
                    var temp    = element.charAt(element.length - 2);
                    var temp2   = element.charAt(element.length - 1);
                    num_element = temp + temp2;
                }

                return num_element;
            }


            $(document).on('click','.delete-elements',function() {

                var element = $(this).attr('id');
                var padre = $(this).parent().parent().parent().parent();
                $(this).parent().parent().parent().remove();
                var span = padre.children("span");

                switch (element)
                {
                    case 'family_relationship':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_family_relationship' + item).text('Parentesco Familiar #' + (i + 1));
                            $('span#num_family_relationship' + item).attr('id', 'num_family_relationship' + i);
                            $('span#family_relationship' + item).attr('id', 'family_relationship' + i);
                            $('label[for="family_relationship' + item + '"]').attr('for', "family_relationship" + i);
                            $('select#family_relationship' + item).each(function(j) {
                                $(this).attr('id', 'family_relationship' + i);
                                $(this).attr('name', 'family_relationship' + i);
                            });

                            $('label[for="manpower' + item + '"]').attr('for', 'manpower' + i);
                            $('select#manpower' + item).each(function(j) {
                                $(this).attr('id', 'manpower' + i);
                                $(this).attr('name', 'manpower' + i);
                            });
                        }

                        count_family_relationship--;
                        if (count_family_relationship == 0) {
                            var html = '<h2 class="text-center text-light-blue">No existen Parentescos Familiares Asociados <br /><small class="text-muted">(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_family_relationships').html(html);
                        }

                    break;

                    case 'disability':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_disability' + item).text('Discapacidad #' + (i + 1));
                            $('span#num_disability' + item).attr('id', 'num_disability' + i);
                            $('span#disability' + item).attr('id', 'disability' + i);

                            $('label[for="disability' + item + '"]').attr('for', "disability" + i);
                            $('select#disability' + item).each(function(j) {
                                $(this).attr('id', 'disability' + i);
                                $(this).attr('name', 'disability' + i);
                            });

                            $('label[for="treatment_disability' + item + '"]').attr('for', 'treatment_disability' + i);
                            $('input:radio[name="treatment_disability' + item + '"]').each(function(j){
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
                            var html = '<h2 class="text-center text-light-blue">No existen Discapacidades asociadas <br /><small class="text-muted">(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h2><br /><hr />'
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
                            $('select#disease' + item).each(function(j) {
                                $(this).attr('id', 'disease' + i);
                                $(this).attr('name', 'disease' + i);
                            });

                            $('label[for="treatment_disease' + item + '"]').attr('for', 'treatment_disease' + i);
                            $('input:radio[name="treatment_disease' + item + '"]').each(function(j){
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
                            var html = '<h2 class="text-center text-green">No existen Enfermedades asociadas <br /><small class="text-muted">(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h2><br /><hr />'
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
                            $('select#kin_id' + item).each(function(j) {
                                $(this).attr('id', 'kin_id' + i);
                                $(this).attr('name', 'kin_id' + i);
                            });
                        }

                        count_family_responsability--;
                        if (count_family_responsability == 0) {
                            var html = '<h2 class="text-center text-yellow">No existen Cargas Familiares asociadas <br /><small class="text-muted">(Pulse "Agregar Carga Familiar" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_family_responsabilities').html(html);
                        }

                    break;

                    case 'certification':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#num_certification' + item).text('Certificación #' + (i + 1));
                            $('span#num_certification' + item).attr('id', 'num_certification' + i);
                            $('span#certification' + item).attr('id', 'certification' + i);

                            $('label[for="certification' + item + '"]').attr('for', "certification" + i);
                            $('#content_certifications select#certification' + item).each(function(j) {
                                $(this).attr('id', 'certification' + i);
                                $(this).attr('name', 'certification' + i);
                            });

                            $('label[for="institution_id' + item + '"]').attr('for', "institution_id" + i);
                            $('#content_certifications select#institution_id' + item).each(function(j) {
                                $(this).attr('id', 'institution_id' + i);
                                $(this).attr('name', 'institution_id' + i);
                            });

                            $('div#img_certification' + item).attr('id', 'img_certification' + i);
                        }

                        count_certification--;
                        if (count_certification == 0) {
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

                        count_license--;
                        if (count_license == 0) {
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
                            $('#content_specialities select#speciality' + item).each(function(j) {
                                $(this).attr('id', 'speciality' + i);
                                $(this).attr('name', 'speciality' + i);
                            });

                            $('label[for="institution_id' + item + '"]').attr('for', "institution_id" + i);
                            $('#content_specialities select#institution_id' + item).each(function(j) {
                                $(this).attr('id', 'institution_id' + i);
                                $(this).attr('name', 'institution_id' + i);
                            });

                            $('div#img_speciality' + item).attr('id', 'img_speciality' + i);
                        }

                        count_speciality--;
                        if (count_speciality == 0) {
                            var html = '<h2 class="text-center text-green">No existen Especialidades Asociadas <br /><small class="text-muted">(Pulse "Agregar Especialidad" para comenzar su adición)</small></h2><br /><hr />';
                            $('#content_specialities').html(html);
                        }

                    break

                }

                $("#wizard").smartWizard("fixHeight");
            });



            /******************************************************************
             *********************** Dropzone methods *************************
             ******************************************************************/

            //get name file for delete
            function removedFile(file, fileList) {

                var rmvFile = '';

                for (var f = 0; f < fileList.length; f++) {

                    if (fileList[f].fileName == file.name)
                        rmvFile = fileList[f].serverFileName;

                }

                return rmvFile;
            }


            //delete file in server
            function deleteImg(name)
            {
                $.ajax({
                    url: "{{ route('human-resources.manpowers.deleteImg') }}",
                    type: "POST",
                    data: {"element": name},

                    error: function (data) {
                        alert('Hubo un error. Porfavor intente nuevamente.');
                    }
                });
            }



            /*****************************************************************
             **************** Add Family Relationship zone ***************
             *****************************************************************/

            $.fn.addElementFamilyRelationship = function() {

                $family_relationship = '<span id="family_relationship"><div class="row"><div class="col-md-12"><span id="num_family_relationship" class="title-elements text-light-blue">Parentesco Familiar #' + (count_family_relationship + 1) + '</span><a id="family_relationship" class="delete-elements pull-right mitooltip" title="Eliminar Parentesco Familiar"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6">{{Form::label('family_relationship', 'Parentesco Familiar')}}{{Form::select('family_relationship', $kins, null, ['class'=> 'form-control'])}}</div><div class="col-md-6">{{Form::label('manpower', 'Nombre')}}{{Form::select('manpower', $manpowers, null, ['class'=> 'form-control'])}}</div></div><hr/></span>';

                if (count_family_relationship == 0)
                    $('#content_family_relationships').html($family_relationship);
                else
                    $('#content_family_relationships').append($family_relationship);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element family_relationships
                $('span#family_relationship').attr('id', 'family_relationship' + count_family_relationship);
                $('span#num_family_relationship').attr('id', 'num_family_relationship' + count_family_relationship);

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

                $disability = '<span id="disability"><div class="row"><div class="col-md-12"><span id="num_disability" class="title-elements text-primary">Discapacidad #' + (count_disabilities + 1) + '</span><a id="disability" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("disability", "Nombre") !!}{!! Form::select("disability", $disabilities, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disability", "Está en tratamiento?") !!}<br>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "si", false, ['class'=> 'treatment_disability']) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disability", "no", true) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disability", "Detalle") !!}{!! Form::textarea("detail_disability", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div id="img_disability" class="dropzone"><div class="dz-message"> <h3 class="text-primary">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div><hr /></span>';

                if (count_disabilities == 0)
                    $('#content_disabilities').html($disability);
                else
                    $('#content_disabilities').append($disability);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element disability
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

                $('div#img_disability').attr('id', 'img_disability' + count_disabilities);

                var fileList = new Array;
                var i =0;
                var myDropzone = new Dropzone("#img_disability" + count_disabilities, {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "disabilities",
                    params: {
                        element: count_disabilities
                    },

                    init: function() {

                        this.on("sending", function (file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                            $("#wizard").smartWizard("fixHeight");
                        });

                        this.on('success', function (file, serverFileName) {
                            fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
                            i++;
                        });

                        this.on("removedfile", function (file) {
                            var rmvFile = removedFile(file, fileList);

                            if (rmvFile)
                                deleteImg(rmvFile);

                        });
                    }
                });

                count_disabilities++;
                $('.mitooltip').tooltip();

            });



            /*****************************************************************
             *********************** Add Disease zone ************************
             *****************************************************************/


            $.fn.addElementDisease = function() {

                $disease = '<span id="disease"><div class="row"><div class="col-md-12"><span id="num_disease" class="title-elements text-success">Enfermedad #' + (count_diseases + 1) + '</span><a id="disease" class="delete-elements pull-right mitooltip" title="Eliminar Enfermedad"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{!! Form::label("disease", "Nombre") !!}{!! Form::select("disease", $diseases, null, ["class"=> "form-control"]) !!}</div><div class="col-md-6 text-center">{!! Form::label("treatment_disease", "Está en tratamiento?") !!}<br/>{!! Form::label("si", "Si") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "si", false) !!}&nbsp&nbsp{!! Form::label("no", "No") !!}&nbsp&nbsp{!! Form::radio("treatment_disease", "no", true, ['class'=> 'treatment_disease']) !!}</div></div><br/><div class="row"><div class="col-md-12">{!! Form::label("detail_disease", "Detalle") !!}{!! Form::textarea("detail_disease", null, ["class"=> "form-control", "rows"=> "3"]) !!}</div></div><br/><div id="img_disease" class="dropzone"><div class="dz-message"> <h3 class="text-green">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div><hr /></span>';

                if (count_diseases == 0)
                    $('#content_diseases').html($disease);
                else
                    $('#content_diseases').append($disease);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element disease
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

                $('div#img_disease').attr('id', 'img_disease' + count_diseases);

                var fileList = new Array;
                var i =0;
                var myDropzone = new Dropzone("#img_disease" + count_diseases, {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "diseases",
                    params: {
                        element: count_diseases
                    },

                    init: function() {

                        this.on("sending", function (file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                            $("#wizard").smartWizard("fixHeight");
                        });

                        this.on('success', function (file, serverFileName) {
                            fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
                            i++;
                        });

                        this.on("removedfile", function (file) {
                            var rmvFile = removedFile(file, fileList);

                            if (rmvFile)
                                deleteImg(rmvFile);

                        });
                    }

                });

                count_diseases++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             *************** Add Family Responsabilities zone ****************
             *****************************************************************/


            $.fn.addElementFamilyResponsability = function() {

                $family_responsability = '<span id="family_responsability"><div class="row"><div class="col-md-12"><span id="num_family_responsability" class="title-elements text-yellow">Carga Familiar #' + (count_family_responsability + 1) + '</span><a id="family_responsability" class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-6">{{Form::label('name_responsability', 'Nombre Completo')}}{{Form::text('name_responsability', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('rut', 'Rut')}}{{Form::text('rut', null, ['class'=> 'form-control'])}}</div><div class="col-md-3">{{Form::label('kin_id', 'Parentesco')}}{{Form::select('kin_id', $kins, null, ['class'=> 'form-control'])}}</div></div><hr /></span>';

                if (count_family_responsability == 0)
                    $('#content_family_responsabilities').html($family_responsability);
                else
                    $('#content_family_responsabilities').append($family_responsability);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element family_responsabilities
                $('#content_family_responsabilities span#family_responsability').attr('id', 'family_responsability' + count_family_responsability);
                $('#content_family_responsabilities span#num_family_responsability').attr('id', 'num_family_responsability' + count_family_responsability);

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

                $certification = '<span id="certification"><div class="row"><div class="col-md-12"><span id="num_certification" class="title-elements text-red">Certificación #' + (count_certification + 1) + '</span><a id="certification" class="delete-elements pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-7">{{Form::label('certification', 'Nombre')}}{{Form::select('certification', $certifications, null, ['class'=> 'form-control'])}}</div><div class="col-md-5">{{Form::label('institution_id', 'Institución')}}{{Form::select('institution_id', $institutions, null, ['class'=> 'form-control'])}}</div></div><br /><div id="img_certification" class="dropzone"><div class="dz-message"> <h3 class="text-red">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div><hr /></span>';

                if (count_certification == 0)
                    $('#content_certifications').html($certification);
                else
                    $('#content_certifications').append($certification);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element certifications
                $('span#certification').attr('id', 'certification' + count_certification);
                $('span#num_certification').attr('id', 'num_certification' + count_certification);

                $('label[for="certification"]').attr('for', 'certification' + count_certification);
                $('select#certification').each(function(i) {
                    $(this).attr('id', 'certification' + count_certification);
                    $(this).attr('name', 'certification' + count_certification);
                });

                $('label[for="institution_id"]').attr('for', 'institution_id' + count_certification);
                $('#content_certifications select#institution_id').each(function(i) {
                    $(this).attr('id', 'institution_id' + count_certification);
                    $(this).attr('name', 'institution_id' + count_certification);
                });

                $('div#img_certification').attr('id', 'img_certification' + count_certification);

                var fileList = new Array;
                var i =0;
                var myDropzone = new Dropzone("#img_certification" + count_certification, {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "certifications",
                    params: {
                        element: count_certification
                    },

                    init: function() {

                        this.on("sending", function (file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                            $("#wizard").smartWizard("fixHeight");
                        });

                        this.on('success', function (file, serverFileName) {
                            fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
                            i++;
                        });

                        this.on("removedfile", function (file) {
                            var rmvFile = removedFile(file, fileList);

                            if (rmvFile)
                                deleteImg(rmvFile);

                        });
                    }

                });

                count_certification++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ************************ Add Licenses zone **********************
             *****************************************************************/


            $.fn.addElementLicense = function() {

                $license = '<span id="license"><div class="row"><div class="col-md-12"><span id="num_license" class="title-elements text-yellow">Licencia #' + (count_license + 1) + '</span><a id="license" class="delete-elements pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-4">{{Form::label('license', 'Tipo Licencia')}}{{Form::select('license', $licenses, null, ['class'=> 'form-control'])}}</div><div class="col-md-2">{{Form::label('expired', 'Fecha de Vencimiento')}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text('expired', null, ['class'=> 'form-control required', 'data-inputmask'=> 'alias": "dd/mm/yyyy', 'data-mask'=> ''])}}</div></div></div><br/><div class="row"><div class="col-md-12">{{Form::label('detail_license', 'Detalle')}}{{Form::textarea('detail_license', null, ['class'=> 'form-control', 'rows'=> 3])}}</div></div><br /><div id="img_license" class="dropzone"><div class="dz-message"> <h3 class="text-yellow">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div><hr /></span>';

                if (count_license == 0)
                    $('#content_licenses').html($license);
                else
                    $('#content_licenses').append($license);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element licenses
                $('span#license').attr('id', 'license' + count_license);
                $('span#num_license').attr('id', 'num_license' + count_license);

                $('label[for="license"]').attr('for', 'license' + count_license);
                $('select#license').each(function(i) {
                    $(this).attr('id', 'license' + count_license);
                    $(this).attr('name', 'license' + count_license);
                });

                $('label[for="expired"]').attr('for', 'expired' + count_license);
                $('input#expired').attr('name', 'expired' + count_license);
                $('input#expired').attr('id', 'expired' + count_license);

                $('label[for="detail_license"]').attr('for', 'detail_license' + count_license);
                $('textarea#detail_license').attr('name', 'detail_license' + count_license);
                $('textarea#detail_license').attr('id', 'detail_license' + count_license);

                $('div#img_license').attr('id', 'img_license' + count_license);

                var fileList = new Array;
                var i =0;
                var myDropzone = new Dropzone("#img_license" + count_license, {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "licenses",
                    params: {
                        element: count_license
                    },

                    init: function() {

                        this.on("sending", function (file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                            $("#wizard").smartWizard("fixHeight");
                        });

                        this.on('success', function (file, serverFileName) {
                            fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
                            i++;
                        });

                        this.on("removedfile", function (file) {
                            var rmvFile = removedFile(file, fileList);

                            if (rmvFile)
                                deleteImg(rmvFile);

                        });
                    }

                });

                count_license++;
                $('.mitooltip').tooltip();
            }



            /*****************************************************************
             ********************** Add Specialities zone ********************
             *****************************************************************/


            $.fn.addElementSpeciality = function() {

                $speciality = '<span id="speciality"><div class="row"><div class="col-md-12"><span id="num_speciality" class="title-elements text-green">Especialidad #' + (count_speciality + 1) + '</span><a id="speciality" class="delete-elements pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-6">{{Form::label('speciality', 'Especialidad')}}{{Form::select('speciality', $specialities, null, ['class'=> 'form-control'])}}</div><div class="col-md-6">{{Form::label('institution_id', 'Institución')}}{{Form::select('institution_id', $institutions, null, ['class'=> 'form-control'])}}</div></div><br/><div id="img_speciality" class="dropzone"><div class="dz-message"> <h3 class="text-green">Arrastre sus archivos hasta aquí</h3> <span class="note">(También puede hacer click y seleccionarlos manualmente)</span> </div></div><hr /></span>';

                if (count_speciality == 0)
                    $('#content_specialities').html($speciality);
                else
                    $('#content_specialities').append($speciality);

                $("#wizard").smartWizard("fixHeight");

                //Refresh N° element specialities
                $('span#speciality').attr('id', 'speciality' + count_speciality);
                $('span#num_speciality').attr('id', 'num_speciality' + count_speciality);

                $('label[for="speciality"]').attr('for', 'speciality' + count_speciality);
                $('#content_specialities select#speciality').each(function(i) {
                    $(this).attr('id', 'speciality' + count_speciality);
                    $(this).attr('name', 'speciality' + count_speciality);
                });

                $('label[for="institution_id"]').attr('for', 'institution_id' + count_speciality);
                $('#content_specialities select#institution_id').each(function(i) {
                    $(this).attr('id', 'institution_id' + count_speciality);
                    $(this).attr('name', 'institution_id' + count_speciality);
                });

                $('div#img_speciality').attr('id', 'img_speciality' + count_speciality);

                var fileList = new Array;
                var i =0;
                var myDropzone = new Dropzone("#img_speciality" + count_speciality, {
                    url: "{{ route('human-resources.manpowers.storage') }}",
                    autoProcessQueue: true,
                    paramName: "specialities",
                    params: {
                        element: count_speciality
                    },

                    init: function() {

                        this.on("sending", function (file, xhr, formData) {
                            formData.append("_token", $('[name=_token]').val());
                            $("#wizard").smartWizard("fixHeight");
                        });

                        this.on('success', function (file, serverFileName) {
                            fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
                            i++;
                        });

                        this.on("removedfile", function (file) {
                            var rmvFile = removedFile(file, fileList);

                            if (rmvFile)
                                deleteImg(rmvFile);

                        });
                    }
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

                //Step 1
                if (currentStep == 1) {
                    if (validateStep1() != false) {

                        $.ajax({
                            type: 'POST',
                            url: '{{ route("human-resources.manpowers.step1") }}',
                            data: $('#step' + currentStep).serialize() + "&count_family_relationship=" + count_family_relationship,
                            dataType: "json",

                            beforeSend: function() {
                                $('#sendElement').html('<i class="fa fa-spinner fa-pulse"></i>');
                            },

                            success: function (data) {
                                $('#sendElement').html('Siguiente <i class="fa fa-chevron-right"></i>');
                                $('#js').addClass('hide');
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
                    }else {
                        return false;
                    }

                }

                //Step 2
                if (currentStep == 2) {
                    if (validateStep2() != false) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("human-resources.manpowers.step2") }}',
                            data: $('#step' + currentStep).serialize() + "&count_disabilities=" + count_disabilities,
                            dataType: "json",

                            beforeSend: function() {
                                $('#sendElement').html('<i class="fa fa-spinner fa-pulse"></i>');
                            },

                            success: function (data) {
                                $('#sendElement').html('Siguiente <i class="fa fa-chevron-right"></i>');
                                $('#js').addClass('hide');
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
                    }
                }

                $("#wizard").smartWizard("goForward");
                $("#wizard").smartWizard("fixHeight");
            });


            /*****************************************************************
             ************************** Submit form **************************
             *****************************************************************/

            $('#submit-all').click(function(){

                //Validation Step 3
                if ($("#wizard").smartWizard("currentStep") == 3) {

                    if (validateStep3() != false) {

                        $('form#step3').submit();

                    }
                }

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

            function validateStep2()
            {
                //disabilities
                for(var i = 0; i < count_disabilities; i++) {

                    //disability
                    if ($('select#disability' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#disability' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Discapacidad ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('select#disability' + i).focus();
                    }

                    //detail_disability
                    if ($('#detail_disability' + i).val() == '') {
                        $('#js').removeClass('hide');
                        $('#detail_disability' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Detalle Discapacidad ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#detail_disability' + i).focus();
                    }
                }

                //diseases
                for(var i = 0; i < count_diseases; i++) {

                    //disease
                    if ($('select#disease' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#disease' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Enfermedad ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('select#disease' + i).focus();
                    }

                    //detalle disease
                    if ($('#detail_disease' + i).val() == '') {
                        $('#js').removeClass('hide');
                        $('#detail_disease' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Detalle Enfermedad ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#detail_disease' + i).focus();
                    }
                }

                //family_responsabilities
                for (var i = 0; i < count_family_responsability; i++) {

                    //full_name
                    if ($('#name_responsability' + i).val() == '') {
                        $('#js').removeClass('hide');
                        $('#name_responsability' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nombre Completo ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#name_responsability' + i).focus();
                    }

                    //rut
                    if ($('#rut' + i).val() == '') {
                        $('#js').removeClass('hide');
                        $('#rut' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#rut' + i).focus();
                    }

                    //kin_id
                    if ($('select#kin_id' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#kin_id' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Parentesco ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('select#kin_id' + i).focus();
                    }
                }
            }

            function validateStep3()
            {
                //certifications
                for(var i = 0; i < count_certification; i++) {

                    //certification
                    if ($('select#certification' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#certification' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Certificación ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('select#certification' + i).focus();
                    }

                    //institution certification
                    if ($('#content_certifications select#institution_id' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('#content_certifications select#institution_id' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Institución ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#content_certifications select#institution_id' + i).focus();
                    }
                }

                //licenses
                for(var i = 0; i < count_license; i++) {

                    //type licence
                    if ($('select#license' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#license' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Tipo Licencia ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('select#license' + i).focus();
                    }

                    //expired
                    if ($('#expired' + i).val() == '') {
                        $('#js').removeClass('hide');
                        $('#expired' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Vencimiento ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#expired' + i).focus();
                    }
                }

                //specialities
                for(var i = 0; i < count_speciality; i++) {

                    //speciality
                    if ($('select#speciality' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('select#speciality' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Especialidad ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('select#speciality' + i).focus();
                    }

                    //institution specialities
                    if ($('#content_specialities select#institution_id' + i).val() == null) {
                        $('#js').removeClass('hide');
                        $('#content_specialities select#institution_id' + i).focus();
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Institución ' + (i + 1) + '</strong> es obligatorio').removeClass('hide');
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#content_specialities select#institution_id' + i).focus();
                    }
                }
            }

            /*****************************************************************
             ************************ Fin Validations ************************
             *****************************************************************/

        });

    </script>
@stop