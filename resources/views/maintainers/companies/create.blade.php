@extends('layout.index')

@section('css')
    {{ Html::style('assets/css/dropzone.css') }}
@stop

@section('title_header') Crear Nueva Empresa @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST', 'id' => 'form-company')) }}

        @include('maintainers.companies.partials.fields')

        {{ Form::hidden('count_legal_representative', '1', ['id' => 'count_legal_representative']) }}
        {{ Form::hidden('count_subsidiary', '0', ['id' => 'count_subsidiary']) }}
	{{ Form::close() }}

@stop

@section('scripts')

    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/jquery.Rut.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/validations/validaEmail.js') }}
    {{ Html::script('assets/js/inputmask.js') }}
    {{ Html::script('assets/js/inputmask.date.extensions.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/dropzone.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            /**************************************************
            ******************** Variables ********************
            **************************************************/

            var count_legal_representative = 1;
            var count_subsidiary           = 0;


            /**************************************************
            ************** Initialize components **************
            **************************************************/

            initializeComponents();

            function initializeComponents() {

                $('.mitooltip').tooltip();

                $('.data_mask').inputmask({
                    placeholder: 'dd-mm-yyyy',
                    alias: "dd-mm-yyyy",
                    "clearIncomplete": true,
                    yearrange: { minyear: 1900, maxyear: (new Date()).getFullYear() }
                });
            }



            /**************************************************
            ****************** $.fn Methods *******************
            **************************************************/

            $.fn.checkEmail = function() {

                var element = $('#' + $(this).attr('id'));
                var input   = checkElementEmail($(this).attr('id'));

                if ($(this).val() == '')
                    return false;

                if (!validaEmail(element.val())) {
                    element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    element.closest('.form-group').find('i.fa-check').remove();
                    element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                }else {
                    $.ajax ({
                        type: 'POST',
                        url: '{{ url("verificaEmail/")}}',
                        data: { email: element.val(), element: input },
                        dataType: "json",

                        beforeSend: function() {
                            element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                            element.closest('.form-group').find('i.fa-times').remove();
                            element.closest('.form-group').find('i.fa-check').remove();
                            element.closest('.form-group').append('<i class="fa fa-spinner fa-pulse fa-lg form-control-feedback"></i>');
                        },

                        success: function(data)
                        {
                            element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                            element.closest('.form-group').find('i.fa-spinner').remove();
                            element.closest('.form-group').find('i.fa-times').remove();
                            element.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        },

                        error: function(data){
                            element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                            element.closest('.form-group').find('i.fa-spinner').remove();
                            element.closest('.form-group').find('i.fa-check').remove();
                            element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        }
                    });
                }
            }


            $.fn.changeRegion = function() {

                var num_element = verificaUltimosNumeros($(this).attr('id'));

                $.get('{{ url("loadProvinces")}}',
                    { id: $(this).val() },
                    function(data) {
                        $('#province_suc_id' + num_element).empty();
                        $('#province_suc_id' + num_element).append("<option value='provincia'>Seleccione Provincia...</option>");
                        $('#commune_suc_id' + num_element).empty();
                        $('#commune_suc_id' + num_element).append("<option value='comuna'>Seleccione Comuna...</option>");
                        $.each(data, function(key, element) {
                            $('#province_suc_id' + num_element).append("<option value='" + key + "'>" + element + "</option>");
                        });
                    }
                );
            }


            $.fn.changeProvince = function() {

                var num_element = verificaUltimosNumeros($(this).attr('id'));

                if ($(this).val() == 'provincia') {
                    $('#commune_suc_id' + num_element).empty();
                    $('#commune_suc_id' + num_element).append("<option value='comuna'>Seleccione Comuna...</option>");
                }else {
                    $.get(
                        '{{ url("loadCommunes")}}',
                        { id: $(this).val() },
                        function(data) {
                            $('#commune_suc_id' + num_element).empty();
                            $.each(data, function(key, element) {
                                $('#commune_suc_id' + num_element).append("<option value='" + key + "'>" + element + "</option>");
                            });
                        }
                    );
                }
            }


            /**************************************************
            ************** $(document) Methods ****************
            **************************************************/

            $(document).on('blur', '.check_rut', function(input) {

                var element = $('#' + $(this).attr('id'));

                element.Rut({
                    on_success: function(){
                        element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        element.closest('.form-group').find('i.fa-times').remove();
                        element.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                    },

                    on_error: function(){
                        element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        element.closest('.form-group').find('i.fa-check').remove();
                        element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    }
                });
            });


            $(document).on('click', '.delete-elements-panel2', function() {

                var element = $(this).attr('id');
                var padre   = $(this).parent().parent().parent().parent();
                $(this).parent().parent().parent().remove();
                var span    = padre.children("span");

                switch (element)
                {
                    case 'legal_representative':

                        for (var i = 1; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#legal_representative' + item).attr('id', 'legal_representative' + i);
                            $('span#num_legal_representative' + item).text('Representante Legal#' + (i + 1));
                            $('span#num_legal_representative' + item).attr('id', 'num_legal_representative' + i);

                            $('label[for="male_surname' + item + '"]').attr('for', 'male_surname' + i);
                            $('input#male_surname' + item).attr('name', 'male_surname' + i);
                            $('input#male_surname' + item).attr('id', 'male_surname' + i);

                            $('label[for="female_surname' + item + '"]').attr('for', 'female_surname' + i);
                            $('input#female_surname' + item).attr('name', 'female_surname' + i);
                            $('input#female_surname' + item).attr('id', 'female_surname' + i);

                            $('label[for="first_name' + item + '"]').attr('for', 'first_name' + i);
                            $('input#first_name' + item).attr('name', 'first_name' + i);
                            $('input#first_name' + item).attr('id', 'first_name' + i);

                            $('label[for="second_name' + item + '"]').attr('for', 'second_name' + i);
                            $('input#second_name' + item).attr('name', 'second_name' + i);
                            $('input#second_name' + item).attr('id', 'second_name' + i);

                            $('label[for="rut' + item + '"]').attr('for', 'rut' + i);
                            $('input#rut' + item).attr('name', 'rut' + i);
                            $('input#rut' + item).attr('id', 'rut' + i);

                            $('label[for="birthday' + item + '"]').attr('for', 'birthday' + i);
                            $('input#birthday' + item).attr('name', 'birthday' + i);
                            $('input#birthday' + item).attr('id', 'birthday' + i);

                            $('label[for="dv' + item + '"]').attr('for', 'dv' + i);
                            $('input#dv' + item).attr('name', 'dv' + i);
                            $('input#dv' + item).attr('id', 'dv' + i);

                            $('label[for="nationality_id' + item + '"]').attr('for', "nationality_id" + i);
                            $('select#nationality_id' + item).each(function(j) {
                                $(this).attr('id', 'nationality_id' + i);
                                $(this).attr('name', 'nationality_id' + i);
                            });

                            $('label[for="email' + item + '"]').attr('for', 'email' + i);
                            $('input#email' + item).attr('name', 'email' + i);
                            $('input#email' + item).attr('id', 'email' + i);

                            $('label[for="phone1-' + item + '"]').attr('for', 'phone1-' + i);
                            $('input#phone1-' + item).attr('name', 'phone1-' + i);
                            $('input#phone1-' + item).attr('id', 'phone1-' + i);

                            $('label[for="phone2-' + item + '"]').attr('for', 'phone2-' + i);
                            $('input#phone2-' + item).attr('name', 'phone2-' + i);
                            $('input#phone2-' + item).attr('id', 'phone2-' + i);

                        }

                        count_legal_representative--;
                        $('#count_legal_representative').attr('value', count_legal_representative);

                    break;

                    case 'subsidiary':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#subsidiary' + item).attr('id', 'subsidiary' + i);
                            $('span#num_subsidiary' + item).text('Sucursal#' + (i + 1));
                            $('span#num_subsidiary' + item).attr('id', 'num_subsidiary' + i);

                            $('label[for="address_suc' + item + '"]').attr('for', 'address_suc' + i);
                            $('#content_subsidiaries #address_suc' + item).attr('name', 'address_suc' + i);
                            $('#content_subsidiaries #address_suc' + item).attr('id', 'address_suc' + i);

                            $('label[for="region_suc_id' + item + '"]').attr('for', 'region_suc_id' + i);
                            $('#content_subsidiaries #region_suc_id' + item).each(function(i){
                                $(this).attr('name', 'region_suc_id' + i);
                                $(this).attr('id', 'region_suc_id' + i);
                            });

                            $('label[for="province_suc_id' + item + '"]').attr('for', 'province_suc_id' + i);
                            $('#content_subsidiaries #province_suc_id' + item).each(function(i){
                                $(this).attr('name', 'province_suc_id' + i);
                                $(this).attr('id', 'province_suc_id' + i);
                            });

                            $('label[for="commune_suc_id' + item + '"]').attr('for', 'commune_suc_id' + i);
                            $('#content_subsidiaries #commune_suc_id' + item).each(function(i){
                                $(this).attr('name', 'commune_suc_id' + i);
                                $(this).attr('id', 'commune_suc_id' + i);
                            });

                            $('label[for="muni_license_suc' + item + '"]').attr('for', 'muni_license_suc' + i);
                            $('#content_subsidiaries #muni_license_suc' + item).attr('name', 'muni_license_suc' + i);
                            $('#content_subsidiaries #muni_license_suc' + item).attr('id', 'muni_license_suc' + i);

                            $('label[for="num_suc' + item + '"]').attr('for', 'num_suc' + i);
                            $('#content_subsidiaries #num_suc' + item).attr('name', 'num_suc' + i);
                            $('#content_subsidiaries #num_suc' + item).attr('id', 'num_suc' + i);

                            $('label[for="lot_suc' + item + '"]').attr('for', 'lot_suc' + i);
                            $('#content_subsidiaries #lot_suc' + item).attr('name', 'lot_suc' + i);
                            $('#content_subsidiaries #lot_suc' + item).attr('id', 'lot_suc' + i);

                            $('label[for="ofi_suc' + item + '"]').attr('for', 'ofi_suc' + i);
                            $('#content_subsidiaries #ofi_suc' + item).attr('name', 'ofi_suc' + i);
                            $('#content_subsidiaries #ofi_suc' + item).attr('id', 'ofi_suc' + i);

                            $('label[for="floor_suc' + item + '"]').attr('for', 'floor_suc' + i);
                            $('#content_subsidiaries #floor_suc' + item).attr('name', 'floor_suc' + i);
                            $('#content_subsidiaries #floor_suc' + item).attr('id', 'floor_suc' + i);

                            $('label[for="email_suc' + item + '"]').attr('for', 'email_suc' + i);
                            $('#content_subsidiaries #email_suc' + item).attr('name', 'email_suc' + i);
                            $('#content_subsidiaries #email_suc' + item).attr('id', 'email_suc' + i);

                            $('label[for="phone1_suc-' + item + '"]').attr('for', 'phone1_suc-' + i);
                            $('#content_subsidiaries #phone1_suc-' + item).attr('name', 'phone1_suc-' + i);
                            $('#content_subsidiaries #phone1_suc-' + item).attr('id', 'phone1_suc-' + i);

                            $('label[for="phone2_suc-' + item + '"]').attr('for', 'phone2_suc-' + i);
                            $('#content_subsidiaries #phone2_suc-' + item).attr('name', 'phone2_suc-' + i);
                            $('#content_subsidiaries #phone2_suc-' + item).attr('id', 'phone2_suc-' + i);

                        }

                        count_subsidiary--;
                        $('#count_subsidiary').attr('value', count_subsidiary);
                        if (count_subsidiary == 0) {
                            var html = '<h2 class="text-center text-yellow">No existen Sucursales Asociadas <br /><small class="text-muted">(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_subsidiaries').html(html);
                        }

                    break;


                }
            });


            /**************************************************
            ******************* functions *********************
            **************************************************/

            function checkElementEmail(input) {

                if (input.length == 5)
                    return "Company";

                if(input.length == 6)
                    return "Representative";

                if(input.length == 10)
                    return "Subsidiary";
            }

            $('#region_id').change(function(){
                $.get('{{ url("loadProvinces")}}',
                    { id: $('#region_id').val() },
                    function(data) {
                        $('#province_id').empty();
                        $('#province_id').append("<option value='provincia'>Seleccione Provincia...</option>");
                        $('#commune_id').empty();
                        $('#commune_id').append("<option value='comuna'>Seleccione Comuna...</option>");
                        $.each(data, function(key, element) {
                            $('#province_id').append("<option value='" + key + "'>" + element + "</option>");
                        });
                    }
                );
            });


            $('#province_id').change(function(){

                if ($('#province_id').val() == 'provincia') {
                    $('#commune_id').empty();
                    $('#commune_id').append("<option value='comuna'>Seleccione Comuna...</option>");
                }else {
                    $.get(
                        '{{ url("loadCommunes")}}',
                        { id: $('#province_id').val() },
                        function(data) {
                            $('#commune_id').empty();
                            $.each(data, function(key, element) {
                                $('#commune_id').append("<option value='" + key + "'>" + element + "</option>");
                            });
                        }
                    );
                }
            });


            /**************************************************
            ****************** Add elements *******************
            **************************************************/


            $.fn.addLegalRepresentative = function() {

                $add_representative_legal = '<span id="legal_representative"><div class="row"><div class="col-md-12"><span id="num_legal_representative" class="title-elements-panel2 text-green">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-3"><div class="form-group">{{ Form::label("male_surname", "Apellido Paterno") }}{{ Form::text("male_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("female_surname", "Apellido Materno") }}{{ Form::text("female_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("first_name", "Primer Nombre") }}{{ Form::text("first_name", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("second_name", "Segundo Nombre") }}{{ Form::text("second_name", null, ["class"=> "form-control"]) }}</div></div></div><div class="row"> <div class="col-md-2"><div class="form-group">{{ Form::label("rut", "Rut") }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin guión ni dígito verificador. Ej: 80900568"></i>{{ Form::text("rut", null, ["class"=> "form-control check_rut"]) }}</div></div><div class="col-md-2"> <div class="form-group">{!! Form::label("birthday", "Fecha de Nac.") !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{!! Form::text("birthday", null, ["class"=> "form-control data_mask"]) !!}</div></div></div><div class="col-md-3"><div class="form-group">{{ Form::label("nationality_id", "Nacionalidad") }}{{ Form::select("nationality_id", $nationalities, null, ["class"=> "form-control"]) }}</div></div><div class="col-md-5"><div class="form-group">{{ Form::label("email", "Email") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{ Form::email("email", null, ["class"=> "form-control", "onBlur" => "$(this).checkEmail()"]) }}</div></div></div></div><div class="row"><div class="col-md-2"><div class="form-group">{{ Form::label("phone1-", "Teléfono 1") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1-", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-2"><div class="form-group">{{ Form::label("phone2-", "Teléfono 2") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2-", null, ["class"=> "form-control"])}}</div></div></div></div><hr/></span>';

                $('#content_legal_representatives').append($add_representative_legal);

                $('span#legal_representative').attr('id', 'legal_representative' + count_legal_representative);
                $('span#num_legal_representative').attr('id', 'num_legal_representative' + count_legal_representative);

                $('label[for="male_surname"]').attr('for', 'male_surname' + count_legal_representative);
                $('input#male_surname').attr('name', 'male_surname' + count_legal_representative);
                $('input#male_surname').attr('id', 'male_surname' + count_legal_representative);

                $('label[for="female_surname"]').attr('for', 'female_surname' + count_legal_representative);
                $('input#female_surname').attr('name', 'female_surname' + count_legal_representative);
                $('input#female_surname').attr('id', 'female_surname' + count_legal_representative);

                $('label[for="first_name"]').attr('for', 'first_name' + count_legal_representative);
                $('input#first_name').attr('name', 'first_name' + count_legal_representative);
                $('input#first_name').attr('id', 'first_name' + count_legal_representative);

                $('label[for="second_name"]').attr('for', 'second_name' + count_legal_representative);
                $('input#second_name').attr('name', 'second_name' + count_legal_representative);
                $('input#second_name').attr('id', 'second_name' + count_legal_representative);

                $('label[for="rut"]').attr('for', 'rut' + count_legal_representative);
                $('#content_legal_representatives input#rut').attr('name', 'rut' + count_legal_representative);
                $('#content_legal_representatives input#rut').attr('id', 'rut' + count_legal_representative);

                $('label[for="birthday"]').attr('for', 'birthday' + count_legal_representative);
                $('input#birthday').attr('name', 'birthday' + count_legal_representative);
                $('input#birthday').attr('id', 'birthday' + count_legal_representative);

                $('label[for="nationality_id"]').attr('for', 'nationality_id' + count_legal_representative);
                $('select#nationality_id').each(function(i){
                    $(this).attr('name', 'nationality_id' + count_legal_representative);
                    $(this).attr('id', 'nationality_id' + count_legal_representative);
                });

                $('label[for="email"]').attr('for', 'email' + count_legal_representative);
                $('#content_legal_representatives input#email').attr('name', 'email' + count_legal_representative);
                $('#content_legal_representatives input#email').attr('id', 'email' + count_legal_representative);

                $('label[for="phone1-"]').attr('for', 'phone1-' + count_legal_representative);
                $('input#phone1-').attr('name', 'phone1-' + count_legal_representative);
                $('input#phone1-').attr('id', 'phone1-' + count_legal_representative);

                $('label[for="phone2-"]').attr('for', 'phone2-' + count_legal_representative);
                $('input#phone2-').attr('name', 'phone2-' + count_legal_representative);
                $('input#phone2-').attr('id', 'phone2-' + count_legal_representative);

                count_legal_representative++;
                $('#count_legal_representative').attr('value', count_legal_representative);

                initializeComponents();
            };


            $.fn.addSubsidiary = function() {

                $add_subsidiary = '<span id="subsidiary"> <div class="row"> <div class="col-md-12"> <span id="num_subsidiary" class="title-elements-panel2 text-yellow">Sucursal #' + (count_subsidiary + 1) + '</span><a id="subsidiary" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Sucursal"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"> <div class="col-md-6"><div class="form-group">{{Form::label("address_suc", "Dirección")}}{{Form::text("address_suc", null, ["class"=> "form-control"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("region_suc_id", "Región")}}{{Form::select("region_suc_id", $regions, null, ["class"=> "form-control", "onChange"=> "$(this).changeRegion()"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("province_suc_id", "Provincia")}}{{Form::select("province_suc_id", $provinces, null, ["class"=> "form-control", "onChange"=> "$(this).changeProvince()"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("commune_suc_id", "Comuna")}}{{Form::select("commune_suc_id", $communes, null, ["class"=> "form-control"])}}</div></div></div> <div class="row"><div class="col-md-1"><div class="form-group">{{Form::label("num_suc", "N°")}}{{Form::text("num_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("lot_suc", "Lote")}}{{Form::text("lot_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("ofi_suc", "Oficina")}}{{Form::text("ofi_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("floor_suc", "Piso")}}{{Form::text("floor_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("muni_license_suc", "Patente Municipal")}}{{Form::text("muni_license_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-6"><div class="form-group">{{Form::label("email_suc", "Email")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::email("email_suc", null, ["class"=> "form-control", "onBlur"=> "$(this).checkEmail()"])}}</div></div></div></div> <div class="row"> <div class="col-md-2"><div class="form-group">{{Form::label("phone1_suc-", "Teléfono 1")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1_suc-", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-2"><div class="form-group">{{Form::label("phone2_suc-", "Teléfono 2")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2_suc-", null, ["class"=> "form-control"])}}</div></div></div></div><hr/></span>';

                if (count_subsidiary == 0)
                    $('#content_subsidiaries').html($add_subsidiary);
                else
                    $('#content_subsidiaries').append($add_subsidiary);


                $('span#subsidiary').attr('id', 'subsidiary' + count_subsidiary);
                $('span#num_subsidiary').attr('id', 'num_subsidiary' + count_subsidiary);

                $('label[for="address_suc"]').attr('for', 'address_suc' + count_subsidiary);
                $('#content_subsidiaries #address_suc').attr('name', 'address_suc' + count_subsidiary);
                $('#content_subsidiaries #address_suc').attr('id', 'address_suc' + count_subsidiary);

                $('label[for="region_suc_id"]').attr('for', 'region_suc_id' + count_subsidiary);
                $('#content_subsidiaries #region_suc_id').each(function(i){
                    $(this).attr('name', 'region_suc_id' + count_subsidiary);
                    $(this).attr('id', 'region_suc_id' + count_subsidiary);
                });

                $('label[for="province_suc_id"]').attr('for', 'province_suc_id' + count_subsidiary);
                $('#content_subsidiaries #province_suc_id').each(function(i){
                    $(this).attr('name', 'province_suc_id' + count_subsidiary);
                    $(this).attr('id', 'province_suc_id' + count_subsidiary);
                });

                $('label[for="commune_suc_id"]').attr('for', 'commune_suc_id' + count_subsidiary);
                $('#content_subsidiaries #commune_suc_id').each(function(i){
                    $(this).attr('name', 'commune_suc_id' + count_subsidiary);
                    $(this).attr('id', 'commune_suc_id' + count_subsidiary);
                });

                $('label[for="muni_license_suc"]').attr('for', 'muni_license_suc' + count_subsidiary);
                $('#content_subsidiaries #muni_license_suc').attr('name', 'muni_license_suc' + count_subsidiary);
                $('#content_subsidiaries #muni_license_suc').attr('id', 'muni_license_suc' + count_subsidiary);

                $('label[for="num_suc"]').attr('for', 'num_suc' + count_subsidiary);
                $('#content_subsidiaries #num_suc').attr('name', 'num_suc' + count_subsidiary);
                $('#content_subsidiaries #num_suc').attr('id', 'num_suc' + count_subsidiary);

                $('label[for="lot_suc"]').attr('for', 'lot_suc' + count_subsidiary);
                $('#content_subsidiaries #lot_suc').attr('name', 'lot_suc' + count_subsidiary);
                $('#content_subsidiaries #lot_suc').attr('id', 'lot_suc' + count_subsidiary);

                $('label[for="ofi_suc"]').attr('for', 'ofi_suc' + count_subsidiary);
                $('#content_subsidiaries #ofi_suc').attr('name', 'ofi_suc' + count_subsidiary);
                $('#content_subsidiaries #ofi_suc').attr('id', 'ofi_suc' + count_subsidiary);

                $('label[for="floor_suc"]').attr('for', 'floor_suc' + count_subsidiary);
                $('#content_subsidiaries #floor_suc').attr('name', 'floor_suc' + count_subsidiary);
                $('#content_subsidiaries #floor_suc').attr('id', 'floor_suc' + count_subsidiary);

                $('label[for="email_suc"]').attr('for', 'email_suc' + count_subsidiary);
                $('#content_subsidiaries #email_suc').attr('name', 'email_suc' + count_subsidiary);
                $('#content_subsidiaries #email_suc').attr('id', 'email_suc' + count_subsidiary);

                $('label[for="phone1_suc-"]').attr('for', 'phone1_suc-' + count_subsidiary);
                $('#content_subsidiaries #phone1_suc-').attr('name', 'phone1_suc-' + count_subsidiary);
                $('#content_subsidiaries #phone1_suc-').attr('id', 'phone1_suc-' + count_subsidiary);

                $('label[for="phone2_suc-"]').attr('for', 'phone2_suc-' + count_subsidiary);
                $('#content_subsidiaries #phone2_suc-').attr('name', 'phone2_suc-' + count_subsidiary);
                $('#content_subsidiaries #phone2_suc-').attr('id', 'phone2_suc-' + count_subsidiary);

                count_subsidiary++;
                $('#count_subsidiary').attr('value', count_subsidiary);

                initializeComponents();
            }


            /**************************************************
            ******************* Validations *******************
            **************************************************/


            function validationForm() {

                if ($('#rut').parent().hasClass('has-error')) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> contiene un valor incorrecto.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#rut').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#rut').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-check').remove();
                    $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#rut').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#rut').val().length > 15) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> no debe ser mayor que 15 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-check').remove();
                    $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#rut').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#firm_name').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Razón Social</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#firm_name').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#firm_name').closest('.form-group').find('i.fa-check').remove();
                    $('#firm_name').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#firm_name').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#firm_name').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#firm_name').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#gyre').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Giro</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#gyre').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#gyre').closest('.form-group').find('i.fa-check').remove();
                    $('#gyre').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#gyre').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#gyre').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#gyre').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#start_act').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Inicio Act</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#start_act').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#start_act').closest('.form-group').find('i.fa-check').remove();
                    $('#start_act').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#start_act').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#start_act').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#start_act').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#address').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#address').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#address').closest('.form-group').find('i.fa-check').remove();
                    $('#address').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#address').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#address').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#address').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#commune_id').text() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-check').remove();
                    $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#commune_id').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-times').remove();
                }

                if (isNaN($('#commune_id').val())){
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> debe ser un número entero.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-check').remove();
                    $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#commune_id').focus();
                    return false;
                }else{
                    $('#js').addClass('hide');
                    $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#num').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#num').closest('.form-group').find('i.fa-check').remove();
                    $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#num').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#num').closest('.form-group').find('i.fa-times').remove();
                }

                if (isNaN($('#num').val())){
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> debe ser un número entero.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#num').closest('.form-group').find('i.fa-check').remove();
                    $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#num').focus();
                    return false;
                }else{
                    $('#js').addClass('hide');
                    $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#num').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#num').val().length > 8) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> no debe ser mayor que 8 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#num').closest('.form-group').find('i.fa-check').remove();
                    $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#num').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#num').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#lot').val().length > 20) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Lote</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#lot').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#lot').closest('.form-group').find('i.fa-check').remove();
                    $('#lot').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#lot').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#lot').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#lot').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#ofi').val().length > 5) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Oficina</strong> no debe ser mayor que 5 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#ofi').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#ofi').closest('.form-group').find('i.fa-check').remove();
                    $('#ofi').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#ofi').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#ofi').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#ofi').closest('.form-group').find('i.fa-times').remove();
                }

                if (isNaN($('#floor').val())){
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso</strong> debe ser un número entero.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-check').remove();
                    $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#floor').focus();
                    return false;
                }else{
                    $('#js').addClass('hide');
                    $('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#floor').val().length > 3) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso</strong> no debe ser mayor que 3 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-check').remove();
                    $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#floor').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#muni_license').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-check').remove();
                    $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#muni_license').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#muni_license').val().length > 50) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal</strong> no debe ser mayor que 50 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-check').remove();
                    $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#muni_license').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#email').parent().parent().hasClass('has-error')) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> contiene un valor incorrecto.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#email').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#email').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#email').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#email').closest('.form-group').find('i.fa-check').remove();
                    $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#email').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#email').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#email').val().length > 100) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#email').closest('.form-group').find('i.fa-check').remove();
                    $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#email').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#email').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#phone1').val() == '') {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-check').remove();
                    $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#phone1').focus();
                    return false;
                }else {
                    $('#js').addClass('hide');
                    $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#phone1').val().length > 20) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-check').remove();
                    $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#phone1').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#phone2').val().length > 20) {
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
                    $("#collapseOne").collapse("show");
                    $('#phone2').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#phone2').closest('.form-group').find('i.fa-check').remove();
                    $('#phone2').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#phone2').focus();
                    return false;
                } else {
                    $('#js').addClass('hide');
                    $('#phone2').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#phone2').closest('.form-group').find('i.fa-times').remove();
                }


                for(var i = 0; i < count_legal_representative; i++) {

                    if ($('#male_surname' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#male_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#male_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#male_surname' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#male_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#male_surname' + i).val().length > 30) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#male_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#male_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#male_surname' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#male_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#female_surname' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#female_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#female_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#female_surname' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#female_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#female_surname' + i).val().length > 30) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#female_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#female_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#female_surname' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#female_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#first_name' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#first_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#first_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#first_name' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#first_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#first_name' + i).val().length > 30) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#first_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#first_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#first_name' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#first_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#second_name' + i).val().length > 30) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Segundo Nombre Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#second_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#second_name' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#second_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#second_name' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#second_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#second_name' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#rut' + i).parent().hasClass('has-error')) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> contiene un valor incorrecto.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#rut' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#rut' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#rut' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#rut' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#rut' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#rut' + i).val().length > 15) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 15 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#rut' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#rut' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#rut' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#birthday' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Nac Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#birthday' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#birthday' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#birthday' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#birthday' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#birthday' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#birthday' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#nationality_id' + i).text() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#nationality_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#nationality_id' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#nationality_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#nationality_id' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#nationality_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#nationality_id' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if (isNaN($('#nationality_id' + i).val())){
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad Rep. Legal ' + (i + 1) + '</strong> debe ser un número entero.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#nationality_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#nationality_id' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#nationality_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#nationality_id' + i).focus();
                        return false;
                    }else{
                        $('#js').addClass('hide');
                        $('#nationality_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#nationality_id' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#email' + i).parent().parent().hasClass('has-error')) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> contiene un valor incorrecto.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#email' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#email' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#email' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#email' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#email' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#email' + i).val().length > 100) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 100 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#email' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#email' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#email' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#phone1-' + i).val() == '') {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#phone1-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#phone1-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#phone1-' + i).focus();
                        return false;
                    }else {
                        $('#js').addClass('hide');
                        $('#phone1-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#phone1-' + i).val().length > 20) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#phone1-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#phone1-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#phone1-' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#phone1-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#phone2-' + i).val().length > 20) {
                        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2 Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
                        $("#collapseThree").collapse("show");
                        $('#phone2-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#phone2-' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#phone2-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#phone2-' + i).focus();
                        return false;
                    } else {
                        $('#js').addClass('hide');
                        $('#phone2-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#phone2-' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                }
            }




            /**************************************************
             ******************* Form submit ******************
             **************************************************/


            $('#form-company').submit(function(e) {

                e.preventDefault();

                if(validationForm() != false) {

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("maintainers.companies.store") }}',
                        data: $('#form-company').serialize(),
                        dataType: "json",

                        beforeSend: function () {
                            $('.ajax').html('<i class="fa fa-spinner fa-pulse fa-3x"></i>').removeClass('hide');
                        },

                        success: function (data) {
                            $('.ajax').addClass('hide');
                            window.location.href = data[0].url;
                        },

                        error: function (data) {
                            $('.ajax').addClass('hide');
                            var errors = data.responseJSON;

                            $.each(errors, function (index, value) {
                                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                                $('#' + index).focus();
                            });
                        }
                    });
                }
            });
        });

    </script>

@stop