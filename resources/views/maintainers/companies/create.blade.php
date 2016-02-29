@extends('layout.index')

@section('title_header') Crear Nueva Empresa @stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {!! Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST')) !!}

        @include('maintainers.companies.partials.fields')

	{!! Form::close() !!}

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
    {{ Html::script('me/js/verificaUltimosNumeros.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            var count_legal_representative = 1;
            var count_subsidiary           = 0;

            $('.mitooltip').tooltip();

            $('select#area_id').select2({
                theme: 'classic'
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


            /*****************************************************************
             ************************ Delete elements ************************
             *****************************************************************/


            $(document).on('click','.delete-elements-panel2',function() {

                var element = $(this).attr('id');
                var padre   = $(this).parent().parent().parent().parent();
                $(this).parent().parent().parent().remove();
                var span    = padre.children("span");

                switch (element)
                {
                    case 'subsidiary':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#subsidiary' + item).attr('id', 'subsidiary' + i);
                            $('span#num_subsidiary' + item).text('Sucursal#' + (i + 1));
                            $('span#num_subsidiary' + item).attr('id', 'num_subsidiary' + i);

                            $('label[for="muni_license' + item + '"]').attr('for', 'muni_license' + i);
                            $('#content_subsidiaries #muni_license' + item).attr('name', 'muni_license' + i);
                            $('#content_subsidiaries #muni_license' + item).attr('id', 'muni_license' + i);

                            $('label[for="address' + item + '"]').attr('for', 'address' + i);
                            $('#content_subsidiaries #address' + item).attr('name', 'address' + i);
                            $('#content_subsidiaries #address' + item).attr('id', 'address' + i);

                            $('label[for="region_id' + item + '"]').attr('for', 'region_id' + i);
                            $('#content_subsidiaries #region_id' + item).each(function(i){
                                $(this).attr('name', 'region_id' + i);
                                $(this).attr('id', 'region_id' + i);
                            });

                            $('label[for="province_id' + item + '"]').attr('for', 'province_id' + i);
                            $('#content_subsidiaries #province_id' + item).each(function(i){
                                $(this).attr('name', 'province_id' + i);
                                $(this).attr('id', 'province_id' + i);
                            });

                            $('label[for="commune_id' + item + '"]').attr('for', 'commune_id' + i);
                            $('#content_subsidiaries #commune_id' + item).each(function(i){
                                $(this).attr('name', 'commune_id' + i);
                                $(this).attr('id', 'commune_id' + i);
                            });

                            $('label[for="num' + item + '"]').attr('for', 'num' + i);
                            $('#content_subsidiaries #num' + item).attr('name', 'num' + i);
                            $('#content_subsidiaries #num' + item).attr('id', 'num' + i);

                            $('label[for="lot' + item + '"]').attr('for', 'lot' + i);
                            $('#content_subsidiaries #lot' + item).attr('name', 'lot' + i);
                            $('#content_subsidiaries #lot' + item).attr('id', 'lot' + i);

                            $('label[for="ofi' + item + '"]').attr('for', 'ofi' + i);
                            $('#content_subsidiaries #ofi' + item).attr('name', 'ofi' + i);
                            $('#content_subsidiaries #ofi' + item).attr('id', 'ofi' + i);

                            $('label[for="floor' + item + '"]').attr('for', 'floor' + i);
                            $('#content_subsidiaries #floor' + item).attr('name', 'floor' + i);
                            $('#content_subsidiaries #floor' + item).attr('id', 'floor' + i);

                            $('label[for="email' + item + '"]').attr('for', 'email' + i);
                            $('#content_subsidiaries #email' + item).attr('name', 'email' + i);
                            $('#content_subsidiaries #email' + item).attr('id', 'email' + i);

                            $('label[for="phone1-' + item + '"]').attr('for', 'phone1-' + i);
                            $('#content_subsidiaries #phone1-' + item).attr('name', 'phone1-' + i);
                            $('#content_subsidiaries #phone1-' + item).attr('id', 'phone1-' + i);

                            $('label[for="phone2-' + item + '"]').attr('for', 'phone2-' + i);
                            $('#content_subsidiaries #phone2-' + item).attr('name', 'phone2-' + i);
                            $('#content_subsidiaries #phone2-' + item).attr('id', 'phone2-' + i);

                        }

                        count_subsidiary--;
                        if (count_subsidiary == 0) {
                            var html = '<h2 class="text-center text-yellow">No existen Sucursales Asociadas <br /><small class="text-muted">(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2><br /><hr />'
                            $('#content_subsidiaries').html(html);
                        }

                    break;

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


            $.fn.addSubsidiary = function() {

                $add_subsidiary = '<span id="subsidiary"> <div class="row"> <div class="col-md-12"> <span id="num_subsidiary" class="title-elements-panel2 text-yellow">Sucursal #' + (count_subsidiary + 1) + '</span><a id="subsidiary" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Sucursal"><i class="fa fa-trash"></i></a> </div></div><br /><div class="row"> <div class="col-md-6">{{Form::label("address", "Dirección")}}<small class="text-muted"> (Casa Matriz)</small>{{Form::text("address", null, ["class"=> "form-control"])}}</div><div class="col-md-2">{{Form::label("region_id", "Región")}}{{Form::select("region_id", $regions, null, ["class"=> "form-control"])}}</div><div class="col-md-2">{{Form::label("province_id", "Provincia")}}{{Form::select("province_id", $provinces, null, ["class"=> "form-control"])}}</div><div class="col-md-2">{{Form::label("commune_id", "Comuna")}}{{Form::select("commune_id", $communes, null, ["class"=> "form-control"])}}</div></div><br/> <div class="row"> <div class="col-md-2">{{Form::label("muni_license", "Patente Municipal")}}{{Form::text("muni_license", null, ["class"=> "form-control text-center"])}}</div><div class="col-md-1">{{Form::label("num", "N°")}}{{Form::text("num", null, ["class"=> "form-control text-center"])}}</div><div class="col-md-1">{{Form::label("lot", "Lote")}}{{Form::text("lot", null, ["class"=> "form-control text-center"])}}</div><div class="col-md-1">{{Form::label("ofi", "Oficina")}}{{Form::text("ofi", null, ["class"=> "form-control text-center"])}}</div><div class="col-md-1">{{Form::label("floor", "Piso")}}{{Form::text("floor", null, ["class"=> "form-control text-center"])}}</div><div class="col-md-6">{{Form::label("email", "Email")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::email("email", null, ["class"=> "form-control"])}}</div></div></div><br/> <div class="row"> <div class="col-md-2">{{Form::label("phone1-", "Teléfono 1")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1-", null, ["class"=> "form-control"])}}</div></div><div class="col-md-2">{{Form::label("phone2-", "Teléfono 2")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2-", null, ["class"=> "form-control"])}}</div></div></div><hr /></span>';

                if (count_subsidiary == 0)
                    $('#content_subsidiaries').html($add_subsidiary);
                else
                    $('#content_subsidiaries').append($add_subsidiary);


                $('span#subsidiary').attr('id', 'subsidiary' + count_subsidiary);
                $('span#num_subsidiary').attr('id', 'num_subsidiary' + count_subsidiary);

                $('label[for="address"]').attr('for', 'address' + count_subsidiary);
                $('#content_subsidiaries #address').attr('name', 'address' + count_subsidiary);
                $('#content_subsidiaries #address').attr('id', 'address' + count_subsidiary);

                $('label[for="region_id"]').attr('for', 'region_id' + count_subsidiary);
                $('#content_subsidiaries #region_id').each(function(i){
                    $(this).attr('name', 'region_id' + count_subsidiary);
                    $(this).attr('id', 'region_id' + count_subsidiary);
                });

                $('label[for="province_id"]').attr('for', 'province_id' + count_subsidiary);
                $('#content_subsidiaries #province_id').each(function(i){
                    $(this).attr('name', 'province_id' + count_subsidiary);
                    $(this).attr('id', 'province_id' + count_subsidiary);
                });

                $('label[for="commune_id"]').attr('for', 'commune_id' + count_subsidiary);
                $('#content_subsidiaries #commune_id').each(function(i){
                    $(this).attr('name', 'commune_id' + count_subsidiary);
                    $(this).attr('id', 'commune_id' + count_subsidiary);
                });

                $('label[for="muni_license"]').attr('for', 'muni_license' + count_subsidiary);
                $('#content_subsidiaries #muni_license').attr('name', 'muni_license' + count_subsidiary);
                $('#content_subsidiaries #muni_license').attr('id', 'muni_license' + count_subsidiary);

                $('label[for="num"]').attr('for', 'num' + count_subsidiary);
                $('#content_subsidiaries #num').attr('name', 'num' + count_subsidiary);
                $('#content_subsidiaries #num').attr('id', 'num' + count_subsidiary);

                $('label[for="lot"]').attr('for', 'lot' + count_subsidiary);
                $('#content_subsidiaries #lot').attr('name', 'lot' + count_subsidiary);
                $('#content_subsidiaries #lot').attr('id', 'lot' + count_subsidiary);

                $('label[for="ofi"]').attr('for', 'ofi' + count_subsidiary);
                $('#content_subsidiaries #ofi').attr('name', 'ofi' + count_subsidiary);
                $('#content_subsidiaries #ofi').attr('id', 'ofi' + count_subsidiary);

                $('label[for="floor"]').attr('for', 'floor' + count_subsidiary);
                $('#content_subsidiaries #floor').attr('name', 'floor' + count_subsidiary);
                $('#content_subsidiaries #floor').attr('id', 'floor' + count_subsidiary);

                $('label[for="email"]').attr('for', 'email' + count_subsidiary);
                $('#content_subsidiaries #email').attr('name', 'email' + count_subsidiary);
                $('#content_subsidiaries #email').attr('id', 'email' + count_subsidiary);

                $('label[for="phone1-"]').attr('for', 'phone1-' + count_subsidiary);
                $('#content_subsidiaries #phone1-').attr('name', 'phone1-' + count_subsidiary);
                $('#content_subsidiaries #phone1-').attr('id', 'phone1-' + count_subsidiary);

                $('label[for="phone2-"]').attr('for', 'phone2-' + count_subsidiary);
                $('#content_subsidiaries #phone2-').attr('name', 'phone2-' + count_subsidiary);
                $('#content_subsidiaries #phone2-').attr('id', 'phone2-' + count_subsidiary);


                count_subsidiary++;
                $('.mitooltip').tooltip();
            }


            $.fn.addLegalRepresentative = function() {

                $add_representative_legal = '<span id="legal_representative"><div class="row"><div class="col-md-12"><span id="num_legal_representative" class="title-elements-panel2 text-green">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-3">{!! Form::label("male_surname", "Apellido Paterno") !!}{!! Form::text("male_surname", null, ["class"=> "form-control"]) !!}</div><div class="col-md-3">{!! Form::label("female_surname", "Apellido Materno") !!}{!! Form::text("female_surname", null, ["class"=> "form-control"]) !!}</div><div class="col-md-3">{!! Form::label("first_name", "Primer Nombre") !!}{!! Form::text("first_name", null, ["class"=> "form-control"]) !!}</div><div class="col-md-3">{!! Form::label("second_name", "Segundo Nombre") !!}{!! Form::text("second_name", null, ["class"=> "form-control"]) !!}</div></div><br/><div class="row"> <div class="col-md-2">{!! Form::label('rut', 'Rut') !!} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin guión ni dígito verificador. Ej: 80900568"></i>{!! Form::text('rut', null, ['class'=> 'form-control']) !!}</div><div class="col-md-1">{{Form::label('dv', 'Dv')}}{{Form::text('dv', null, ['class'=> 'form-control', 'disabled'])}}</div><div class="col-md-3">{!! Form::label('country_id', 'Nacionalidad') !!}{!! Form::select('country_id', $countries, null, ['class'=> 'form-control']) !!}</div><div class="col-md-4">{!! Form::label('email', 'Email') !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{!! Form::email('email', null, ['class'=> 'form-control']) !!}</div></div><div class="col-md-2">{!! Form::label('phone1-', 'Teléfono 1') !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text('phone1-', null, ['class'=> 'form-control'])}}</div></div></div><br/><div class="row"><div class="col-md-2">{!! Form::label('phone2-', 'Teléfono 2') !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text('phone2-', null, ['class'=> 'form-control'])}}</div></div></div><hr/></span>';

                $('#content_legal_representatives').append($add_representative_legal);

                //Refresh N° element disability
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

                $('label[for="dv"]').attr('for', 'dv' + count_legal_representative);
                $('input#dv').attr('name', 'dv' + count_legal_representative);
                $('input#dv').attr('id', 'dv' + count_legal_representative);

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