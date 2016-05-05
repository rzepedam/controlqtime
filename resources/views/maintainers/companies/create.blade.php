@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-datepicker.css') }}

@stop

@section('title_header') Crear Nueva Empresa @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors')

    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST', 'id' => 'form-company')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa <small>(Información Casa Matriz)</small></h3>
            </div>
            <div class="panel-body">

                @include('maintainers.companies.partials.create.data_company')

            </div>
        </div>

	{{ Form::close() }}


    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST', 'id' => 'form-legal')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <div class="panel-actions">
                    <span class="label label-outline label-success add_license waves-effect waves-block" onclick="$(this).addLegalRepresentative(this)"><i class="fa fa-plus"></i> Agregar Representante Legal</span>
                </div>
                <h3 class="panel-title"><i class="fa fa-gavel text-success"></i> Datos Representante Legal</h3>
            </div>

            <div class="panel-body">
                <div id="content_legal_representatives">

                    @include('maintainers.companies.partials.create.data_legal_representative')

                </div>
            </div>

        </div>

    {{ Form::close() }}

    {{ Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST', 'id' => 'form-subsidiary')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <div class="panel-actions">
                    <span class="label label-outline label-warning add_subsidiary waves-effect waves-block" onclick="$(this).addSubsidiary(this)"><i class="fa fa-plus"></i> Agregar Sucursal</span>
                </div>
                <h3 class="panel-title"><i class="fa fa-cubes text-warning"></i> Datos Sucursales</h3>
            </div>
            <div class="panel-body">
                <div id="content_subsidiaries">

                    <h2 class="text-center text-warning">No existen Sucursales Asociadas <br />
                        <small>(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2>
                    <br />
                    <br />

                </div>
            </div>
        </div>

    {{ Form::close() }}

    <br />
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('maintainers.companies.index') }}">Volver</a>
        </div>
        <div class="col-md-6 pull-right">
            <button id="btnSubmitCompany" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/jquery.Rut.js') }}
    {{ Html::script('me/js/validations/validaRut.js') }}
    {{ Html::script('me/js/validations/validaEmail.js') }}
    {{ Html::script('me/js/changeMethods/changeRegionProvince.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.es.min.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            var count_legal_representative  = 1;
            var count_subsidiary            = 0;

            function initializaComponents() {
                $('.input-group.date').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    language: 'es',
                    autoclose: true,
                    endDate: new Date(),
                    todayBtn: true,
                });

                $('.tooltip-primary').tooltip();
                $('.tooltip-danger').tooltip();
            }

            initializaComponents();

            $(document).on('click', '.delete-elements', function() {

                var element = $(this).attr('id');
                var padre   = $(this).parent().parent().parent().parent().parent();
                $(this).parent().parent().parent().parent().remove();
                var span    = padre.children("span");

                switch (element) {
                    case 'legal_representative':

                        for (var i = 1; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#legal_representative' + item).attr('id', 'legal_representative' + i);
                            $('span#num_legal_representative' + item).text('Representante Legal #' + (i + 1));
                            $('span#num_legal_representative' + item).attr('id', 'num_legal_representative' + i);

                        }

                        count_legal_representative--;
                        $('#count_legal_representative').attr('value', count_legal_representative);

                        break;

                    case 'subsidiary':

                        for (var i = 0; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#subsidiary' + item).attr('id', 'subsidiary' + i);
                            $('span#num_subsidiary' + item).text('Sucursal #' + (i + 1));
                            $('span#num_subsidiary' + item).attr('id', 'num_subsidiary' + i);

                            $('label[for="region_suc_id' + item + '"]').attr('for', 'region_suc_id' + i);
                            $('#region_suc_id' + item).each(function(i){
                                $(this).attr('id', 'region_suc_id' + i);
                            });

                            $('label[for="province_suc_id' + item + '"]').attr('for', 'province_suc_id' + i);
                            $('#province_suc_id' + item).each(function(i){
                                $(this).attr('id', 'province_suc_id' + i);
                            });

                            $('label[for="commune_suc_id' + item + '"]').attr('for', 'commune_suc_id' + i);
                            $('#commune_suc_id' + item).each(function(i){
                                $(this).attr('id', 'commune_suc_id' + i);
                            });

                        }

                        count_subsidiary--;
                        if (count_subsidiary == 0) {
                            var html = '<h2 class="text-center text-warning">No existen Sucursales Asociadas <br /><small>(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2><br /><br />'
                            $('#content_subsidiaries').html(html);
                        }

                        break;

                }
            });

            $.fn.addLegalRepresentative = function() {

                var new_legal = '<span id="legal_representative"><hr/><div class="row"><div class="col-md-12"><div class="alert alert-alt alert-success alert-dismissible" role="alert"><span id="num_legal_representative" class="text-success">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Representante Legal" data-html="true"><i class="fa fa-trash"></i></a></div></div></div><div class="row"><div class="col-md-3"><div class="form-group">{{ Form::label("male_surname[]", "Apellido Paterno", ["class" => "control-label"]) }}{{ Form::text("male_surname[]", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("female_surname[]", "Apellido Materno", ["class" => "control-label"]) }}{{ Form::text("female_surname[]", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("first_name[]", "Primer Nombre", ["class" => "control-label"]) }}{{ Form::text("first_name[]", null, ["class"=> "form-control"]) }}</div></div><div class="col-md-3"><div class="form-group">{{ Form::label("second_name[]", "Segundo Nombre", ["class" => "control-label"]) }}{{ Form::text("second_name[]", null, ["class"=> "form-control"]) }}</div></div></div><div class="row"> <div class="col-md-2"><div class="form-group">{{ Form::label("rut_legal[]", "Rut", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>{{ Form::text("rut_legal[]", null, ["class"=> "form-control check_rut"]) }}</div></div><div class="col-md-3"> <div class="form-group">{{ Form::label("birthday[]", "Fecha de Nac.", ["class" => "control-label"]) }}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{ Form::text("birthday[]", null, ["class"=> "form-control date", "readonly"]) }}</div></div></div><div class="col-md-3"><div class="form-group">{{ Form::label("nationality_id[]", "Nacionalidad", ["class" => "control-label"]) }}{{ Form::select("nationality_id[]", $nationalities, null, ["class"=> "form-control"]) }}</div></div><div class="col-md-2"><div class="form-group">{{ Form::label("phone1_legal[]", "Teléfono 1", ["class" => "control-label"]) }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{ Form::text("phone1_legal[]", null, ["class"=> "form-control"]) }}</div></div></div><div class="col-md-2"><div class="form-group">{{ Form::label("phone2_legal[]", "Teléfono 2", ["class" => "control-label"]) }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{ Form::text("phone2_legal[]", null, ["class"=> "form-control"]) }}</div></div></div></div><div class="row"><div class="col-md-6"><div class="form-group">{{ Form::label("email_legal[]", "Email", ["class" => "control-label"]) }}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{ Form::text("email_legal[]", null, ["id" => "Representative", "class"=> "form-control", "onBlur" => "$(this).checkEmail(this)"]) }}</div></div></div></div></span>';

                $('#content_legal_representatives').append(new_legal);

                $('span#legal_representative').attr('id', 'legal_representative' + count_legal_representative);
                $('span#num_legal_representative').attr('id', 'num_legal_representative' + count_legal_representative);

                count_legal_representative++;
                initializaComponents();

            }

            $.fn.addSubsidiary = function() {

                var new_subsidiary = '<span id="subsidiary"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"> <span id="num_subsidiary" class="text-warning">Sucursal #' + (count_subsidiary + 1) + '</span><a id="subsidiary" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Sucursal" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("address_suc[]", "Dirección")}}{{Form::text("address_suc[]", null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("region_suc_id", "Región")}}{{Form::select("region_suc_id[]", $regions, null, ["class"=> "form-control", "onChange"=> "$(this).changeRegion()", "id"=> "region_suc_id"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("province_suc_id", "Provincia")}}{{Form::select("province_suc_id[]", $provinces, null, ["class"=> "form-control", "onChange"=> "$(this).changeProvince()", "id"=> "province_suc_id"])}}</div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group">{{Form::label("commune_suc_id", "Comuna")}}{{Form::select("commune_suc_id[]", $communes, null, ["class"=> "form-control", "id"=> "commune_suc_id"])}}</div></div><div class="col-md-1"> <div class="form-group">{{Form::label("num_suc[]", "N°")}}{{Form::text("num_suc[]", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"> <div class="form-group">{{Form::label("lot_suc[]", "Lote")}}{{Form::text("lot_suc[]", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"> <div class="form-group">{{Form::label("ofi_suc[]", "Oficina")}}{{Form::text("ofi_suc[]", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"> <div class="form-group">{{Form::label("floor_suc[]", "Piso")}}{{Form::text("floor_suc[]", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("muni_license_suc[]", "Patente Municipal")}}{{Form::text("muni_license_suc[]", null, ["class"=> "form-control text-center"])}}</div></div></div><div class="row"> <div class="col-md-2"> <div class="form-group">{{Form::label("phone1_suc[]", "Teléfono 1")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1_suc[]", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-2"> <div class="form-group">{{Form::label("phone2_suc[]", "Teléfono 2")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2_suc[]", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-6"> <div class="form-group">{{Form::label("email_suc[]", "Email")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::text("email_suc[]", null, [ "id"=> "Subsidiary", "class"=> "form-control", "onBlur"=> "$(this).checkEmail(this)"])}}</div></div></div></div><hr/></span>';

                if (count_subsidiary == 0)
                    $('#content_subsidiaries').html(new_subsidiary);
                else
                    $('#content_subsidiaries').append(new_subsidiary);

                $('span#subsidiary').attr('id', 'subsidiary' + count_subsidiary);
                $('span#num_subsidiary').attr('id', 'num_subsidiary' + count_subsidiary);

                $('label[for="region_suc_id"]').attr('for', 'region_suc_id' + count_subsidiary);
                $('#region_suc_id').each(function(){
                    $(this).attr('id', 'region_suc_id' + count_subsidiary);
                });

                $('label[for="province_suc_id"]').attr('for', 'province_suc_id' + count_subsidiary);
                $('#province_suc_id').each(function(){
                    $(this).attr('id', 'province_suc_id' + count_subsidiary);
                });

                $('label[for="commune_suc_id"]').attr('for', 'commune_suc_id' + count_subsidiary);
                $('#commune_suc_id').each(function(){
                    $(this).attr('id', 'commune_suc_id' + count_subsidiary);
                });

                count_subsidiary++;
                initializaComponents();
            }

            $('#btnSubmitCompany').click(function(e) {

                e.preventDefault();

                var formCompany     = $('#form-company');
                var formLegal       = $('#form-legal');
                var formSubsidiary  = $('#form-subsidiary');
                var action          = formCompany.attr('action');
                var button          = $(this);

                button.html('<i class="fa fa-spinner" aria-hidden="true"></i>').css({ width: '122px' });
                $.post(action, formCompany.serialize() + "&formLegal=" + formLegal.serialize() + "&formSubsidiary=" + formSubsidiary.serialize() + "&count_legal_representative=" + count_legal_representative + "&count_subsidiary=" + count_subsidiary, function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    }

                }).fail(function(response) {
                    var errors = response.responseJSON;
                    console.log(errors);
                    button.html('<i class="fa fa-floppy-o"></i> Guardar');
                    alert('Ocurrió un error');
                });

            });

        });

    </script>

    <!--<script type="text/javascript">

        $(document).ready(function(){

            var count_legal_representative = ;
            var count_subsidiary           = 0;

            $(document).on('click', '.delete-elements', function() {

                var element = $(this).attr('id');
                var padre   = $(this).parent().parent().parent().parent().parent();
                $(this).parent().parent().parent().parent().remove();
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
                            var html = '<h2 class="text-center text-warning">No existen Sucursales Asociadas <br /><small>(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2><br /><br />'
                            $('#content_subsidiaries').html(html);
                        }

                    break;


                }
            });


            /**************************************************
            ****************** Add elements *******************
            **************************************************/





            $.fn.addSubsidiary = function() {

                $add_subsidiary = '<span id="subsidiary"> <div class="row"><div class="col-md-12"> <div class="alert alert-alt alert-warning alert-dismissible" role="alert"><span id="num_subsidiary" class="text-warning">Sucursal #' + (count_subsidiary + 1) + '</span><a id="subsidiary" class="delete-elements pull-right mitooltip" title="Eliminar Sucursal"><i class="fa fa-trash"></i></a></div></div></div><div class="row"> <div class="col-md-6"><div class="form-group">{{Form::label("address_suc", "Dirección")}}{{Form::text("address_suc", null, ["class"=> "form-control"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("region_suc_id", "Región")}}{{Form::select("region_suc_id", $regions, null, ["class"=> "form-control", "onChange"=> "$(this).changeRegion()"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("province_suc_id", "Provincia")}}{{Form::select("province_suc_id", $provinces, null, ["class"=> "form-control", "onChange"=> "$(this).changeProvince()"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("commune_suc_id", "Comuna")}}{{Form::select("commune_suc_id", $communes, null, ["class"=> "form-control"])}}</div></div></div> <div class="row"><div class="col-md-1"><div class="form-group">{{Form::label("num_suc", "N°")}}{{Form::text("num_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("lot_suc", "Lote")}}{{Form::text("lot_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("ofi_suc", "Oficina")}}{{Form::text("ofi_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-1"><div class="form-group">{{Form::label("floor_suc", "Piso")}}{{Form::text("floor_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-2"><div class="form-group">{{Form::label("muni_license_suc", "Patente Municipal")}}{{Form::text("muni_license_suc", null, ["class"=> "form-control text-center"])}}</div></div><div class="col-md-6"><div class="form-group">{{Form::label("email_suc", "Email")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::text("email_suc", null, [ "id" => "Subsidiary", "class"=> "form-control", "onBlur"=> "$(this).checkEmail(this)"])}}</div></div></div></div> <div class="row"> <div class="col-md-2"><div class="form-group">{{Form::label("phone1_suc-", "Teléfono 1")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1_suc-", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-2"><div class="form-group">{{Form::label("phone2_suc-", "Teléfono 2")}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2_suc-", null, ["class"=> "form-control"])}}</div></div></div></div><hr/></span>';

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
             ******************* Form submit ******************
             **************************************************/


            $('#form-company').submit(function(e) {

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{-- route("maintainers.companies.store") --}}',
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
                            $('#js').html('<i class="fa fa-times"></i> ' + value[0]).removeClass('hide');
                            $('#' + index).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                            $('#' + index).closest('.form-group').find('i.fa-check').remove();
                            $('#' + index).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
                            $('#' + index).focus();
                            return false;
                        });
                    }
                });

            });


        });

    </script>-->

@stop

