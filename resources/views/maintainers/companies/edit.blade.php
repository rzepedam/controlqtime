@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-datepicker.css') }}

@stop

@section('title_header') Editar Empresa: <span class="text-primary">{{ $company->id }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    {{ Form::model($company, array('route' => array('maintainers.companies.update', $company), 'method' => 'PUT', 'id' => 'form-company')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa <small>(Información Casa Matriz)</small></h3>
            </div>
            <div class="panel-body">

                @include('maintainers.companies.partials.edit.data_company')

            </div>
        </div>

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <div class="panel-actions">
                    <span class="label label-outline label-success add_license waves-effect waves-block" onclick="$(this).addLegalRepresentative(this)"><i class="fa fa-plus"></i> Agregar Representante Legal</span>
                </div>
                <h3 class="panel-title"><i class="fa fa-gavel text-success"></i> Datos Representante Legal</h3>
            </div>

            <div class="panel-body">
                <div id="content_legal_representatives">

                    @include('maintainers.companies.partials.edit.data_legal_representative')

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
            <button id="btnUpdateCompany" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
        </div>
    </div>

    <br />
    <br />
    <br />

    @include('maintainers.companies.partials.delete')
    <br />

@stop

@section('scripts')

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/verificaUltimosNumeros.js') }}
    {{ Html::script('assets/js/jquery.Rut.js') }}
    {{ Html::script('me/js/validations/validaRut.js') }}
    {{ Html::script('me/js/changeMethods/changeRegionProvince.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/bootstrap-datepicker.es.min.js') }}
    {{ Html::script('me/js/delete.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            var count_legal_representative  = {{ ($company->num_representative > 0) ? $company->num_representative : 1 }};
            var id_deletes_legal            = [];

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

                var element     = $(this).attr('id');
                var padre       = $(this).parent().parent().parent().parent().parent();
                var num_element = verificaUltimosNumeros($(this).parent().parent().parent().parent().attr('id'));

                if (element == 'legal_representative') {
                    if ($('#id_legal' + num_element).val() != 0)
                        id_deletes_legal.push($('#id_legal' + num_element).val());
                }

                $(this).parent().parent().parent().parent().remove();
                var span        = padre.children("span");

                switch (element)
                {
                    case 'legal_representative':

                        for (var i = 1; i < span.length; i++) {

                            item = verificaUltimosNumeros(span[i].id);

                            $('span#legal_representative' + item).attr('id', 'legal_representative' + i);
                            $('span#num_legal_representative' + item).text('Representante Legal #' + (i + 1));
                            $('span#num_legal_representative' + item).attr('id', 'num_legal_representative' + i);

                            $('label[for="id_legal' + item + '"]').attr('for', 'id_legal' + i);
                            $('#id_legal' + item).attr('id', 'id_legal' + i);

                        }

                        count_legal_representative--;

                    break;
                }
            });


            $.fn.addLegalRepresentative = function() {

                var new_legal = '<span id="legal_representative"> <div class="row"> <div class="col-md-12"> <div class="alert alert-alt alert-success alert-dismissible" role="alert"> <span id="num_legal_representative" class="text-success">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Representante Legal" data-html="true"><i class="fa fa-trash"></i></a> </div></div></div><div class="row"> <div class="col-md-1 hide"> <div class="form-group">{{Form::label("id_legal", "ID", ["class"=> "control-label"])}}{{Form::text("id_legal[]", 0, ["id"=> "id_legal", "class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("male_surname[]", "Apellido Paterno", ["class"=> "control-label"])}}{{Form::text("male_surname[]", null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("female_surname[]", "Apellido Materno", ["class"=> "control-label"])}}{{Form::text("female_surname[]", null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("first_name[]", "Primer Nombre", ["class"=> "control-label"])}}{{Form::text("first_name[]", null, ["class"=> "form-control"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("second_name[]", "Segundo Nombre", ["class"=> "control-label"])}}{{Form::text("second_name[]", null, ["class"=> "form-control"])}}</div></div></div><div class="row"> <div class="col-md-2"> <div class="form-group">{{Form::label("rut_legal[]", "Rut", ["class"=> "control-label"])}} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>{{Form::text("rut_legal[]", null, ["class"=> "form-control check_rut"])}}</div></div><div class="col-md-3"> <div class="form-group">{{Form::label("birthday[]", "Fecha de Nac.", ["class"=> "control-label"])}}<div class="input-group date"> <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>{{Form::text("birthday[]", null, ["class"=> "form-control", "readonly"])}}</div></div></div><div class="col-md-3"> <div class="form-group">{{Form::label("nationality_id[]", "Nacionalidad", ["class"=> "control-label"])}}{{Form::select("nationality_id[]", $nationalities, null, ["class"=> "form-control"])}}</div></div><div class="col-md-2"> <div class="form-group">{{Form::label("phone1_legal[]", "Teléfono 1", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{{Form::text("phone1_legal[]", null, ["class"=> "form-control"])}}</div></div></div><div class="col-md-2"> <div class="form-group">{{Form::label("phone2_legal[]", "Teléfono 2", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{{Form::text("phone2_legal[]", null, ["class"=> "form-control"])}}</div></div></div></div><div class="row"> <div class="col-md-6"> <div class="form-group">{{Form::label("email_legal[]", "Email", ["class"=> "control-label"])}}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{{Form::text("email_legal[]", null, ["id"=> "Representative", "class"=> "form-control"])}}</div></div></div></div><hr/></span>';

                $('#content_legal_representatives').append(new_legal);

                $('span#legal_representative').attr('id', 'legal_representative' + count_legal_representative);
                $('span#num_legal_representative').attr('id', 'num_legal_representative' + count_legal_representative);

                $('label[for="id_legal"]').attr('for', 'id_legal' + count_legal_representative);
                $('#id_legal').attr('id', 'id_legal' + count_legal_representative);

                count_legal_representative++;
                initializaComponents();
            };


            $('#btnUpdateCompany').click(function(e) {

                e.preventDefault();

                var formCompany     = $('#form-company');
                var action          = formCompany.attr('action');
                var button          = $(this);

                button.html('<i class="fa fa-spin fa-refresh fa-fw" aria-hidden="true"></i>').css({ width: '138px' });
                $.post(action, formCompany.serialize() + "&id_deletes_legal=" + id_deletes_legal + "&count_legal_representative=" + count_legal_representative, function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    }
                });

            })

        });


    </script>
@stop