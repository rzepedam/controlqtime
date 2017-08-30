@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">
    <link rel="stylesheet" href="{{ mix('css/human-resources/daily-assistances/index-custom-daily-assistances.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <style type="text/css">
        @media screen and (min-width: 768px) {
            .header-custom {
                padding-top: 20px; 
                padding-left: 30px; 
                padding-right: 52px; 
            }
        }
        @media screen and (max-width: 768px) {
            .header-custom {
                padding-top: 20px; 
                padding-left: 20px; 
                padding-right: 20px; 
            }
        }
    </style>
@stop

@section('title_header')
    Control Asistencia <span class="text-capitalize text-primary">{{ Date::parse(\Carbon\Carbon::now())->format('l j F') }}</span>
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Asistencia Diaria</li>
@stop

@section('content')

    @include('layout.messages.errors-js')
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <div class="row header-custom">

                @include('human-resources.daily-assistances.partials.header')

            </div>
        </div>
        <div class="panel-body">
            <div class="row col-sm-12">

                @include('human-resources.daily-assistances.partials.table')
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/human-resources/daily-assistances/index-custom-daily-assistances.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            var params = {
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "responsive": true,
                "pageLength": 25,
                "sDom": '<"top"l>t<"F"ip><"clear"><"clear">',
                "ajax": {
                    url: "/human-resources/getAssistances",
                },
                "drawCallback": function () {
                    if ($(".datatables_search_custom").length === 0) {
                        $('.top').append('<div class="datatables_search_custom"><div class="input-search input-group-sm pull-right"> <button type="submit" class="input-search-btn"> <i class="icon md-search" aria-hidden="true"></i> </button> <input id="search" type="text" class="form-control" placeholder="Search..."> </div></div>');
                    }
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm pagination-no-border col-xs-12');
                },
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
                "order": [[4, 'desc']],
                "columns": [
                    {
                        data: 'full_name', name: 'full_name'
                    },
                    {
                        data: 'rut', name: 'rut', className: 'text-center', searchable: false
                    },
                    {
                        data: 'firm_name', name: 'firm_name', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            return '<a class="label label-round label-info">' + data.substring(0,20) + '...'  + '</a>';
                        }
                    },
                    {
                        data: 'name', name: 'name', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            return '<a class="label label-round label-success">' + data + '</a>';
                        }
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
                    },
                    {
                        data: 'employee_id', name: 'employee_id', className: 'text-center', searchable: false, orderable: false,
                        'render': function (data, type, row, meta) {
                            return '<a href="/human-resources/employees/' + data + '"><i class="fa fa-search text-info" aria-hidden="true"></i>';
                        }
                    },
                ]
            }

            var table = $('#tblAssistances').on('preXhr.dt', function (e, settings, data) {
                data.employee_id = $('#employee_id').val();
                data.company_id  = $('#company_id').val();
                data.area_id     = $('#area_id').val();
                data.init        = $('#init').val();
                data.end         = $('#end').val();
            }).DataTable(params);

            // Reload table to the change company select
            $(document).on('change', '#company_id', function () {
                $('.companyForm').val($(this).val());
                $('#area_id').val('');
                $('#employee_id').val('');
                table.ajax.reload();
                $.get('/human-resources/daily-assistances/loadCompany',
                    { company_id: $(this).val() }
                    ).done(function( data ) {
                        $('#area_id').empty();
                        $('#area_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                        $.each(data.areas, function(key, element) {
                            $('#area_id').append("<option value='" + key + "'>" + element + "</option>");
                        });
                        $('#area_id').selectpicker('refresh');
                        $('#employee_id').empty();
                        $('#employee_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                        $.each(data.employees, function(key, element) {
                            $('#employee_id').append("<option value='" + key + "'>" + element + "</option>");
                        });
                        $('#employee_id').selectpicker('refresh');
                    }
                );
            });

            // Reload table to the change area select
            $(document).on('change', '#area_id', function () {
                $('.areaForm').val($(this).val());
                $('.employeeForm').val('');
                $('#employee_id').val('');
                table.ajax.reload();
                $.get('/human-resources/daily-assistances/loadArea',
                    { company_id: $('#company_id').val(), area_id: $(this).val(), employee_id: $('#employee_id').val() }
                    ).done(function( data ) {
                        if (data.areas) {
                            $('#area_id').empty();
                            $('#area_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                            $.each(data.areas, function (key, element) {
                                $('#area_id').append("<option value='" + key + "'>" + element + "</option>");
                            });
                            $('#area_id').selectpicker('refresh');
                        }
                        $('#employee_id').empty();
                        $('#employee_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                        $.each(data.employees, function(key, element) {
                            $('#employee_id').append("<option value='" + key + "'>" + element + "</option>");
                        });
                        $('#employee_id').selectpicker('refresh');
                    }
                );
            });

            // Reload table to the change employee select
            $(document).on('change', '#employee_id', function () {
                $('.employeeForm').val($(this).val());
                $('#area_id').val('');
                table.ajax.reload();
                $.get('/human-resources/daily-assistances/loadEmployee',
                    { company_id: $('#company_id').val(), employee_id: $(this).val() }
                    ).done(function( data ) {
                        $('#area_id').empty();
                        $('#area_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                        $.each(data.areas, function (key, element) {
                            if ( $('#employee_id').val() ) {
                                $('#area_id').append("<option selected='selected' value='" + key + "'>" + element + "</option>");
                                $('.areaForm').val(key);
                            } else {
                                $('.areaForm').val('');
                                $('#area_id').append("<option value='" + key + "'>" + element + "</option>");
                            }
                        });
                        $('#area_id').selectpicker('refresh');

                        if ( $('#employee_id').val() ) {
                            $('#employee_id').empty();
                            $('#employee_id').append("<option data-icon='fa fa-search' value=''>Seleccione</option>");
                            $.each(data.employees, function (key, element) {
                                if (data.selected === key) {
                                    $('#employee_id').append("<option selected='selected' value='" + key + "'>" + element + "</option>");
                                } else {
                                    $('#employee_id').append("<option value='" + key + "'>" + element + "</option>");
                                }
                            });
                            $('#employee_id').selectpicker('refresh');
                        }
                    }
                );
            });

            // Reload table to the change init input
            $('#init').on('change', function () {
                var init = moment($(this).val(), "DD-MM-YYYY", true);
                var end = moment($('#end').val(), "DD-MM-YYYY", true);
                
                if ( init.isAfter(end) ) 
                {
                    var aux = $(this).val();
                    $('#end').datepicker({ format: 'dd-mm-yyyy', autoclose: true }).datepicker("update", aux);
                    $('.initForm').val(aux);
                    $('.endForm').val(aux);
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('.initForm').val($(this).val());
                $('#js').addClass('hide');
                table.ajax.reload();
            });

            // Reload table to the change end input
            $('#end').on('change', function () {
                var init = moment($('#init').val(), "DD-MM-YYYY", true);
                var end = moment($(this).val(), "DD-MM-YYYY", true);

                if ( init.isAfter(end) ) 
                {
                    var aux = $(this).val();
                    $('#init').datepicker({ format: 'dd-mm-yyyy', autoclose: true }).datepicker("update", aux);
                    $('.initForm').val(aux);
                    $('.endForm').val(aux);
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('.endForm').val($(this).val());
                $('#js').addClass('hide');
                table.ajax.reload();
            });

            // Search method
            $(document).on('keyup', '#search', function () {
                table.search($(this).val()).draw();
            })
        });

    </script>
@stop