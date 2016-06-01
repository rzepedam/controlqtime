@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-datepicker.css') }}

@stop

@section('title_header') Crear Nueva Empresa @stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('administration.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {{-- Show Errors Validations --}}
    <div class="clearfix">
        <div class="col-md-12 col-xs-12 alert alert-danger alert-dismissible hide" role="alert" id="js">
        </div>
    </div>
    {{-- End Show Errors --}}

    {{ Form::open(array('route' => 'administration.companies.store', 'method' => 'POST', 'id' => 'form-company')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa <small>(Información Casa Matriz)</small></h3>
            </div>
            <div class="panel-body">

                @include('administration.companies.partials.create.data_company')

            </div>
        </div>

	{{ Form::close() }}


    {{ Form::open(array('route' => 'administration.companies.store', 'method' => 'POST', 'id' => 'form-representative')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <div class="panel-actions">
                    <span class="label label-outline label-success add_representative waves-effect waves-block"><i class="fa fa-plus"></i> Agregar Representante Empresa</span>
                </div>
                <h3 class="panel-title"><i class="fa fa-users text-success"></i> Datos Representantes Empresa</h3>
            </div>

            <div class="panel-body">
                <div id="content_representative_companies">

                    @include('administration.companies.partials.create.data_representative_companies')

                </div>
            </div>

        </div>

    {{ Form::close() }}

    <br />
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('administration.companies.index') }}">Volver</a>
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

            var count_representative_company  = 1;

            function initializaComponents() {
                $('.input-group.date').datepicker({
                    endDate: new Date(),
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
                    case 'representative_company':

                        for (var i = 1; i < span.length; i++) {

                            var item = verificaUltimosNumeros(span[i].id);

                            $('span#representative_company' + item).attr('id', 'representative_company' + i);
                            $('span#num_representative_company' + item).text('Representante Empresa #' + (i + 1));
                            $('span#num_representative_company' + item).attr('id', 'num_representative_company' + i);

                        }

                        count_representative_company--;

                    break;

                }
            });

            $('.add_representative').click(function() {

                var new_representative = '<span id="representative_company"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_representative_company" class="text-success">Representante Empresa #' + (count_representative_company + 1) + '</span><a id="representative_company" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Representante Empresa" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 form-group hide">{{Form::label("id_representative", "ID", ["class"=> "control-label"])}}{{Form::text("id_representative[]", 0, ["id_representative", "class"=> "form-control"])}}</div><div class="col-md-3 form-group">{{Form::label("type_representative_id", "Tipo Representante", ["class"=> "control-label"])}}{{Form::select("type_representative_id[]", $type_representatives, null, ["class"=> "form-control"])}}</div><div class="col-md-3 form-group">{{Form::label("male_surname", "Apellido Paterno", ["class"=> "control-label"])}}{{Form::text("male_surname[]", null, ["class"=> "form-control"])}}</div><div class="col-md-3 form-group">{{Form::label("female_surname", "Apellido Materno", ["class"=> "control-label"])}}{{Form::text("female_surname[]", null, ["class"=> "form-control"])}}</div><div class="col-md-3 form-group">{{Form::label("first_name", "Primer Nombre", ["class"=> "control-label"])}}{{Form::text("first_name[]", null, ["class"=> "form-control"])}}</div></div><div class="row"> <div class="col-md-3 form-group">{{Form::label("second_name", "Segundo Nombre", ["class"=> "control-label"])}}{{Form::text("second_name[]", null, ["class"=> "form-control"])}}</div><div class="col-md-2 form-group">{{Form::label("rut_representative", "Rut", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos uión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>{{Form::text("rut_representative[]", null, ["class"=> "form-control check_rut"])}}</div><div class="col-md-2 form-group">{{Form::label("birthday", "Fecha de Nac.", ["class"=> "control-label"])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("birthday[]", null, ["class"=> "form-control", "readonly"])}}</div></div><div class="col-md-3 form-group">{{Form::label("nationality_id", "Nacionalidad", ["class"=> "control-label"])}}{{Form::select("nationality_id[]", $nationalities, null, ["class"=> "form-control"])}}</div><div class="col-md-2 form-group">{{Form::label("phone1_representative", "Teléfono 1", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1_representative[]", null, ["class"=> "form-control"])}}</div></div></div><div class="row"> <div class="col-md-2 form-group">{{Form::label("phone2_representative", "Teléfono 2", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2_representative[]", null, ["class"=> "form-control"])}}</div></div><div class="col-md-6 form-group">{{Form::label("email_representative", "Email", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::text("email_representative[]", null, ["id"=> "Representative", "class"=> "form-control"])}}</div></div></div><br/></span>';

                $('#content_representative_companies').append(new_representative);

                $('span#representative_company').attr('id', 'representative_company' + count_representative_company);
                $('span#num_representative_company').attr('id', 'num_representative_company' + count_representative_company);

                $('label[for="id_representative"]').attr('for', 'id_representative' + count_representative_company);
                $('#id_representative').attr('id', 'id_representative' + count_representative_company);

                count_representative_company++;
                initializaComponents();

            });

            $('#btnSubmitCompany').click(function(e) {

                e.preventDefault();

                var formCompany         = $('#form-company');
                var formRepresentative  = $('#form-representative');
                var action              = formCompany.attr('action');
                var button              = $(this);

                button.html('<i class="fa fa-refresh fa-spin fa-fw"></i>').css({ width: '122px' });
                $.post(action, formCompany.serialize() + "&formRepresentative=" + formRepresentative.serialize() + "&count_representative_company=" + count_representative_company, function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    }

                }).fail(function(response) {
                    button.html('<i class="fa fa-floppy-o"></i> Guardar');
                    var errors = $.parseJSON(response.responseText);
                    $.each(errors, function (index, value) {
                        $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                        $('#' + index).focus();
                        return false;
                    });
                });
            });

        });

    </script>

@stop

