@extends('layout.index')

@section('title_header') Crear Nueva Empresa <i class="fa fa-info-circle mitooltip" title="Si la empresa tiene sucursales, debe asociarlas en el mantenedor de sucursales, una vez creada la empresa" data-placement="right"></i> @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST')) }}

        @include('maintainers.companies.partials.fields')

        {{ Form::hidden('count_legal_representative', '1', ['id' => 'count_legal_representative']) }}
	{{ Form::close() }}

@stop

@section('scripts')

    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/jquery.Rut.min.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/validations/validaEmail.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            /**************************************************
            ******************** Variables ********************
            **************************************************/

            var count_legal_representative = 1;


            /**************************************************
            ************** Initialize components **************
            **************************************************/

            $('.mitooltip').tooltip();


            /**************************************************
            ********************* Methods *********************
            **************************************************/


            $.fn.checkEmail = function(input) {

                var element = $('#' + input.id);

                if (!validaEmail(element.val())) {
                    element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    element.closest('.form-group').find('i.fa-check').remove();
                    element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                }else {
                    $.ajax ({
                        type: 'POST',
                        url: '{{ url("verificaEmail/")}}',
                        data: { email: element.val(), element: "Company" },
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

            $.fn.checkRut = function(input) {

                var element = $('#' + input.id);

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
            });


            /**************************************************
            ***************** Delete elements *****************
            **************************************************/


            $(document).on('click','.delete-elements-panel2',function() {

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

                            $('label[for="dv' + item + '"]').attr('for', 'dv' + i);
                            $('input#dv' + item).attr('name', 'dv' + i);
                            $('input#dv' + item).attr('id', 'dv' + i);

                            $('label[for="country_id' + item + '"]').attr('for', "country_id" + i);
                            $('select#country_id' + item).each(function(j) {
                                $(this).attr('id', 'country_id' + i);
                                $(this).attr('name', 'country_id' + i);
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
                }
            });



            /**************************************************
            ****************** Add elements *******************
            **************************************************/


            $.fn.addLegalRepresentative = function() {

                $add_representative_legal = '<span id="legal_representative"><div class="row"><div class="col-md-12"><span id="num_legal_representative" class="title-elements-panel2 text-green">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a></div></div><br /><div class="row"><div class="col-md-3"><div class="form-group">{{ Form::label("male_surname", "Apellido Paterno") }}{{ Form::text("male_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("female_surname", "Apellido Materno") }}{{ Form::text("female_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("first_name", "Primer Nombre") }}{{ Form::text("first_name", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("second_name", "Segundo Nombre") }}{{ Form::text("second_name", null, ["class"=> "form-control"]) }}</div></div></div><div class="row"> <div class="col-md-2"><div class="form-group">{{ Form::label("rut", "Rut") }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin guión ni dígito verificador. Ej: 80900568"></i>{{ Form::text("rut", null, ["class"=> "form-control", "onBlur" => "$(this).checkRut(this)"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("country_id", "Nacionalidad") }}{{ Form::select("country_id", $countries, null, ["class"=> "form-control"]) }}</div></div><div class="col-md-5"><div class="form-group">{{ Form::label("email", "Email") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{ Form::email("email", null, ["class"=> "form-control", "onBlur" => "$(this).checkEmail(this)"]) }}</div></div></div><div class="col-md-2"><div class="form-group">{{ Form::label("phone1-", "Teléfono 1") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1-", null, ["class"=> "form-control"])}}</div></div></div></div><div class="row"><div class="col-md-2"><div class="form-group">{{ Form::label("phone2-", "Teléfono 2") }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2-", null, ["class"=> "form-control"])}}</div></div></div></div><hr/></span>';

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
                $('input#rut').attr('name', 'rut' + count_legal_representative);
                $('input#rut').attr('id', 'rut' + count_legal_representative);

                $('label[for="country_id"]').attr('for', 'country_id' + count_legal_representative);
                $('select#country_id').each(function(i){
                    $(this).attr('name', 'country_id' + count_legal_representative);
                    $(this).attr('id', 'country_id' + count_legal_representative);
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
                $('.mitooltip').tooltip();
            };


            /**************************************************
            ******************* Validations *******************
            **************************************************/

            $('#btn-submit').click(function(e) {

                if ($('#rut').parent().hasClass('has-error')) {
                    $("#collapseOne").collapse("show");
                    $('#rut').focus();
                    return false;
                }

                if ($('#rut').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-check').remove();
                    $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#rut').focus();
                    return false;
                }else {
                    $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#firm_name').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#firm_name').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#firm_name').closest('.form-group').find('i.fa-check').remove();
                    $('#firm_name').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#firm_name').focus();
                    return false;
                }else {
                    $('#firm_name').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#firm_name').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#gyre').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#gyre').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#gyre').closest('.form-group').find('i.fa-check').remove();
                    $('#gyre').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#gyre').focus();
                    return false;
                }else {
                    $('#gyre').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#gyre').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#start_act').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#start_act').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#start_act').closest('.form-group').find('i.fa-check').remove();
                    $('#start_act').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#start_act').focus();
                    return false;
                }else {
                    $('#start_act').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#start_act').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#address').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#address').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#address').closest('.form-group').find('i.fa-check').remove();
                    $('#address').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#address').focus();
                    return false;
                }else {
                    $('#address').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#address').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#region_id').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#region_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#region_id').closest('.form-group').find('i.fa-check').remove();
                    $('#region_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#region_id').focus();
                    return false;
                }else {
                    $('#region_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#region_id').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#province_id').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#province_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#province_id').closest('.form-group').find('i.fa-check').remove();
                    $('#province_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#province_id').focus();
                    return false;
                }else {
                    $('#province_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#province_id').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#commune_id').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-check').remove();
                    $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#commune_id').focus();
                    return false;
                }else {
                    $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#commune_id').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#num').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#num').closest('.form-group').find('i.fa-check').remove();
                    $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#num').focus();
                    return false;
                }else {
                    $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#num').closest('.form-group').find('i.fa-times').remove();
                }

                if (isNaN($('#num').val())){
                    $("#collapseOne").collapse("show");
                    $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#num').closest('.form-group').find('i.fa-check').remove();
                    $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#num').focus();
                    return false;
                }else{
                    $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#num').closest('.form-group').find('i.fa-times').remove();
                }

                if (isNaN($('#floor').val())){
                    $("#collapseOne").collapse("show");
                    $('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-check').remove();
                    $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#floor').focus();
                    return false;
                }else{
                    $('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#floor').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#muni_license').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-check').remove();
                    $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#muni_license').focus();
                    return false;
                }else {
                    $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#muni_license').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#email').parent().parent().hasClass('has-error')) {
                    $("#collapseOne").collapse("show");
                    $('#email').focus();
                    return false;
                }

                if ($('#email').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#email').closest('.form-group').find('i.fa-check').remove();
                    $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#email').focus();
                    return false;
                }else {
                    $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#email').closest('.form-group').find('i.fa-times').remove();
                }

                if ($('#phone1').val() == '') {
                    $("#collapseOne").collapse("show");
                    $('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-check').remove();
                    $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                    $('#phone1').focus();
                    return false;
                }else {
                    $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
                    $('#phone1').closest('.form-group').find('i.fa-times').remove();
                }

                for (i = 0; i < count_legal_representative; i++) {

                    if ($('#male_surname' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#male_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#male_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#male_surname' + i).focus();
                        return false;
                    }else {
                        $('#male_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#male_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#female_surname' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#female_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#female_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#female_surname' + i).focus();
                        return false;
                    }else {
                        $('#female_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#female_surname' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#first_name' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#first_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#first_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#first_name' + i).focus();
                        return false;
                    }else {
                        $('#first_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#first_name' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#rut' + i).parent().hasClass('has-error')) {
                        $("#collapseTwo").collapse("show");
                        $('#rut').focus();
                        return false;
                    }

                    if ($('#rut' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#rut' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#rut' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#rut' + i).focus();
                        return false;
                    }else {
                        $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#country_id' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#country_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#country_id' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#country_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#country_id' + i).focus();
                        return false;
                    }else {
                        $('#country_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#country_id' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#email' + i).parent().parent().hasClass('has-error')) {
                        $("#collapseTwo").collapse("show");
                        $('#email' + i).focus();
                        return false;
                    }

                    if ($('#email' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#email' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#email' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#email' + i).focus();
                        return false;
                    }else {
                        $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#email' + i).closest('.form-group').find('i.fa-times').remove();
                    }

                    if ($('#phone1-' + i).val() == '') {
                        $("#collapseTwo").collapse("show");
                        $('#phone1-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-check').remove();
                        $('#phone1-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        $('#phone1-' + i).focus();
                        return false;
                    }else {
                        $('#phone1-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
                        $('#phone1-' + i).closest('.form-group').find('i.fa-times').remove();
                    }
                }

                e.submit();

            });

        });

    </script>

@stop