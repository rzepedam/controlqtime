@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/sweetalert.css') }}
    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Trabajadores
    <br/>
    @if (Session::get('step1'))
        <a href="{{ route('human-resources.employees.create') }}" class="btn btn-primary waves-effect waves-light" id="modalSessionConfirmation"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @else
        <a href="{{ route('human-resources.employees.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @endif
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Trabajadores</li>
@stop
@section('content')

    @include('human-resources.employees.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/sweetalert.min.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-export.js') }}
    {{ Html::script('assets/js/tableExport.js') }}
    {{ Html::script('assets/js/jquery.base64.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}

    <script>

        $(document).ready(function () {

            $('#employee_table').bootstrapTable({
                url: "{{ route('human-resources.employees.getEmployees') }}",
                search: true,
                sortName: 'id',
                sortOrder: 'desc',
                striped: true,
                pagination: true,
                iconsPrefix: 'fa',
                icons: {
                    paginationSwitchDown: 'fa-caret-square-o-down',
                    paginationSwitchUp: 'fa-caret-square-o-up',
                    refresh: 'fa-refresh',
                    toggle: 'fa-list-alt',
                    columns: 'fa-th',
                    detailOpen: 'fa-plus',
                    detailClose: 'fa-minus'
                },
                pageList: [25, 50, 100],
                pageSize: 25,
                columns: [
                    {}, {}, {},
                    {
                        formatter : function(value,row,index) {
                            return row.company.firm_name;
                        }
                    },
                    {
                        formatter : function(value,row,index) {
                            if (row.state == 'enable') {
                                var $state_enable = '<a class="btn btn-squared btn-success waves-effect waves-light btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="' + row.id + '"><i class="fa fa-clock-o" aria-hidden="true"></i></a>';
                            }else {
                                var $state_enable = '<a class="btn btn-squared btn-success waves-effect waves-light disabled btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="' + row.id +'"><i class="fa fa-clock-o" aria-hidden="true"></i></a>';
                            }

                            return  '<a href="/human-resources/employees/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                                    '<a href="/human-resources/employees/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                                    '<a href="/human-resources/employees/attachFiles/' + row.id + '" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a> ' +
                                    $state_enable;
                        }
                    }
                ],

                onAll: function (name, args) {
                    $('[data-toggle="tooltip"]').tooltip();
                },

                onLoadSuccess: function () {
                    $('#myToolbar').html($('.page-list'));
                },

                onPageChange: function () {
                    $('#myToolbar').html('');
                    $('#myToolbar').html($('.page-list'));
                },
            });

            /*
             * Delete Data in Session Storage
             */

            $('#modalSessionConfirmation').on("click", function (event) {

                event.preventDefault();

                swal({
                    title: "Continuar con registro de usuario?",
                    text: "Existen datos en sesión asociados a un trabajador que no ha sido registrado. Si confirma, estos datos se cargarán en el formulario. De lo contrario, se presentará un formulario nuevo.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal({
                                title: "Datos Cargados!",
                                text: "Puede continuar con el formulario.",
                                type: "success"
                            }, function () {
                                window.location.href = "{{ route('human-resources.employees.create')  }}";
                            });
                        }
                        else {

                            /*
                             * Call ajax for destroy Session data
                             */

                            $.ajax({
                                url: "{{ route('destroyEmployeeData') }}",
                                type: "GET"

                            }).done(function () {
                                swal({
                                    title: "Datos eliminados satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success"
                                }, function () {
                                    window.location.href = "{{ route('human-resources.employees.create')  }}";
                                });
                            });
                        }
                    }
                );
            });

            /*
             * Start Daily Assistance
             */

            $('.btnStartDailyAssistance').click(function () {

                var id = $(this).data('id');

                swal({
                            title: "Confirma Iniciar la Jornada Laboral del Trabajador con ID: <span style='color:#3F51B5'>" + id + "</span>",
                            text: "Al iniciar, el Trabajador comenzará inmediatamente su jornada laboral.",
                            type: "info",
                            showCancelButton: true,
                            showLoaderOnConfirm: true,
                            closeOnConfirm: false,
                            confirmButtonText: 'Confirmar',
                            cancelButtonText: 'Cancelar',
                            html: true,
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('human-resources.employees.startDailyAssistance') }}',
                                    data: "manpower_id=" + id,
                                    dataType: 'json',
                                    success: function (response) {
                                        swal({
                                            title: "<span style='color:#A5DC86'>" + response[0].name + "</span> <br />inició su jornada laboral satisfactoriamente",
                                            text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                            type: "success",
                                            html: true,
                                        }, function (isConfirm) {
                                            window.location.href = response[0].url;
                                        });
                                    },
                                });
                            }
                        });

            });

            /*
             * Stop Daily Assistance
             */

            $('.btnUpdateDailyAssistance').click(function () {

                var id = $(this).data('id');

                swal({
                    title: "Desea finalizar la Jornada Laboral del Trabajador con ID: <span style='color:#3F51B5'>" + id + "</span>",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    html: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Finalizar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('human-resources.employees.updateDailyAssistance') }}",
                            data: $('#form-assistance-update').serialize(),
                            dataType: 'json',
                            success: function (response) {
                                alert('...');
                                /*swal({
                                 title: "<span style='color:#A5DC86'>" + response[0].name + "</span> <br />inició su jornada laboral satisfactoriamente",
                                 text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                 type: "success",
                                 html: true,
                                 }, function(isConfirm) {
                                 window.location.href = response[0].url;
                                 });*/
                            },
                        });
                    }
                })
            });
        });

    </script>

@stop