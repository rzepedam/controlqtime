@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/show-with-image-common.css') }}">
    <link rel="stylesheet" href="{{ mix('css/human-resources/employees/show.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
@stop
@section('title_header')
    Detalle Trabajador: <span class="text-primary">{{ $employee->id }}</span>
@stop
@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('employees.index') }}"><i class="md-accounts font-size-16"></i> Trabajadores</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1"
                                                      role="tab"><i class="fa fa-pencil"></i> Información Personal</a>
            </li>
            <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i
                            class="fa fa-star"></i> Competencias Laborales</a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_3" aria-controls="tab_3" role="tab"><i
                            class="fa fa-heartbeat"></i> Información de Salud</a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_4" aria-controls="tab_4" role="tab"><i
                            class="fa fa-file-text-o"></i> Documentos Adjuntos <span
                            class="badge badge-warning up">{{ $employee->num_total_images }}</span></a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_5" aria-controls="tab_5" role="tab"><i
                            class="fa fa-check-square-o"></i> Registro de Asistencia </a></li>
        </ul>
        <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="tab_1" role="tabpanel">

                @include('human-resources.employees.partials.show.personal_information')

            </div>
            <div class="tab-pane" id="tab_2" role="tabpanel">

                @include('human-resources.employees.partials.show.laboral_skills')

            </div>
            <div class="tab-pane" id="tab_3" role="tabpanel">

                @include('human-resources.employees.partials.show.health_information')

            </div>
            <div class="tab-pane" id="tab_4" role="tabpanel">

                @include('human-resources.employees.partials.show.files_attach')

            </div>
            <div class="tab-pane" id="tab_5" role="tabpanel">

                @include('human-resources.employees.partials.show.assistance')

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
    <script src="{{ mix('js/show-with-image-common.js') }}"></script>
    <script src="{{ mix('js/human-resources/employees/show.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var i = 0;
            var params = {
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "responsive": true,
                "pageLength": 25,
                "sDom": '<"top"l>t<"F"ip><"clear"><"clear">',
                "ajax": {
                    url: "/human-resources/getShowAssistance"
                },
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm pagination-no-border col-xs-12');
                },
                "order": [[2, 'desc']],
                "language": {
                    "thousands": ".",
                    "sProcessing": '<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-primary"></i>',
                    "sInfo": 'Mostrando <span class="text-primary">_START_</span> a <span class="text-primary">_END_</span> de _TOTAL_ registros',
                    "sInfoEmpty": "No existen coincidencias",
                    "sInfoFiltered": '(filtrado de un total de <span class="text-primary">_MAX_</span> registros)',
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "oPaginate": {
                        "sNext": '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                        "sPrevious": '<i class="fa fa-angle-left" aria-hidden="true"></i>'
                    },
                },
                "columns": [
                    {
                        data: 'count', name: 'count', orderable: false,
                        'render': function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'num_device', name: 'num_device', className: 'text-center', orderable: false,
                    },
                    {
                        data: 'log_in', name: 'log_in', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            return moment(data).format('DD MMM HH:mm:ss') + ' <i class="fa fa-sign-in text-success" aria-hidden="true"></i>';
                        }
                    },
                    {
                        data: 'log_out', name: 'log_out', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            if ( data )
                            {
                                return moment(data).format('DD MMM HH:mm:ss') + ' <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>';
                            }

                            return '-';
                        }
                    }
                ]
            }

            var table = $('#tblAssistances').on('preXhr.dt', function (e, settings, data) {
                data.id = window.location.pathname.split("/").pop();
                data.init = $('#init').val();
                data.end = $('#end').val();
            }).DataTable(params);

            // Reload table to the change init input
            $('#init').on('change', function () {
                var init = moment($(this).val(), "DD-MM-YYYY", true);
                var end = moment($('#end').val(), "DD-MM-YYYY", true);

                if ( init.isAfter(end) ) 
                {
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('#initForm').val($(this).val());
                $('#js').addClass('hide');
                table.ajax.reload();
            });

            // Reload table to the change end input
            $('#end').on('change', function () {
                var init = moment($('#init').val(), "DD-MM-YYYY", true);
                var end = moment($(this).val(), "DD-MM-YYYY", true);

                if ( init.isAfter(end) ) 
                {
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('#endForm').val($(this).val());
                $('#js').addClass('hide');
                table.ajax.reload();
            });

        });
    </script>
@stop