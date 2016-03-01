@extends('layout.index')

@section('title_header') Crear Nueva Empresa <i class="fa fa-info-circle mitooltip" title="Si la empresa tiene sucursales, debe asociarlas en el mantenedor de sucursales, una vez creada la empresa" data-placement="right"></i> @stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST')) }}

        @include('maintainers.companies.partials.fields')

	{{ Form::close() }}

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/jquery.Rut.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/validations/validaEmail.js') }}
    {{ Html::script('me/js/validations/companies.js') }}

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

            $('select#area_id').select2({
                theme: 'classic'
            });

            $("#rut").Rut({
                on_success: function(){
                    $('#rut').closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-times').remove();
                    $('#rut').closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                },

                on_error: function(){
                    $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#rut').closest('.form-group').find('i.fa-check').remove();
                    $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                }
            });

            $("#rut0").Rut({
                on_success: function(){
                    $('#rut0').closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                    $('#rut0').closest('.form-group').find('i.fa-times').remove();
                    $('#rut0').closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                },

                on_error: function(){
                    $('#rut0').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#rut0').closest('.form-group').find('i.fa-check').remove();
                    $('#rut0').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                }
            });

            /**************************************************
            ********************* Methods *********************
            **************************************************/

            $('#email').blur(function(){
                if (!validaEmail($('#email').val())) {
                    $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                    $('#email').closest('.form-group').find('i.fa-check').remove();
                    $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                }else {
                    $.ajax ({
                        type: 'POST',
                        url: '{{ url("verificaEmail/")}}',
                        data: { email: $('#email').val(), element: "Company" },
                        dataType: "json",

                        beforeSend: function() {
                            $('#email').closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                            $('#email').closest('.form-group').find('i.fa-times').remove();
                            $('#email').closest('.form-group').find('i.fa-check').remove();
                            $('#email').closest('.form-group').append('<i class="fa fa-spinner fa-pulse fa-lg form-control-feedback"></i>');
                        },

                        success: function(data)
                        {
                            $('#email').closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                            $('#email').closest('.form-group').find('i.fa-spinner').remove();
                            $('#email').closest('.form-group').find('i.fa-times').remove();
                            $('#email').closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        },

                        error: function(data){
                            $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                            $('#email').closest('.form-group').find('i.fa-spinner').remove();
                            $('#email').closest('.form-group').find('i.fa-check').remove();
                            $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                        }
                    });
                }
            });

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

                    break;
                }
            });



            /**************************************************
            ****************** Add elements *******************
            **************************************************/


            $.fn.addLegalRepresentative = function() {

                $add_representative_legal = '<span id="legal_representative"><div class="row"><div class="col-md-12"><span id="num_legal_representative" class="title-elements-panel2 text-green">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-3"><div class="form-group">{{ Form::label("male_surname", "Apellido Paterno") }}{{ Form::text("male_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("female_surname", "Apellido Materno") }}{{ Form::text("female_surname", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("first_name", "Primer Nombre") }}{{ Form::text("first_name", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("second_name", "Segundo Nombre") }}{{ Form::text("second_name", null, ["class"=> "form-control"]) }}</div></div></div><br/><div class="row"> <div class="col-md-2"><div class="form-group">{{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin guión ni dígito verificador. Ej: 80900568"></i>{{ Form::text('rut', null, ['class'=> 'form-control']) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label('country_id', 'Nacionalidad') }}{{ Form::select('country_id', $countries, null, ['class'=> 'form-control']) }}</div></div><div class="col-md-5"><div class="form-group">{{ Form::label('email', 'Email') }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{ Form::email('email', null, ['class'=> 'form-control']) }}</div></div></div><div class="col-md-2"><div class="form-group">{{ Form::label('phone1-', 'Teléfono 1') }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text('phone1-', null, ['class'=> 'form-control'])}}</div></div></div></div><br/><div class="row"><div class="col-md-2"><div class="form-group">{{ Form::label('phone2-', 'Teléfono 2') }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text('phone2-', null, ['class'=> 'form-control'])}}</div></div></div></div><hr/></span>';

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
                $('.mitooltip').tooltip();
            };

        });

    </script>

@stop