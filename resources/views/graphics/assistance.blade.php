@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/graphics/assistance.css') }}">
@stop
@section('title_header') Gráficas Asistencia @stop
@section('content')

    @include('layout.messages.errors-js')
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <div class="row col-xs-offset-1 col-sm-offset-1 col-md-offset-1 padding-top-15 padding-right-20">
                @include('graphics.partials.header')
            </div>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <canvas id="byTypeCompany" width="400" height="300"></canvas>
                <br />
                <br />
                <div class="alert alert-alt alert-success alert-dismissible text-center" role="alert">
                    <i class="fa fa-hashtag text-success" aria-hidden="true"></i>
                    <span id="num_type_company_assistance" class="text-success">{{ $marksTypeCompany->sum() }}</span> asistencias
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <canvas id="byCompany" width="400" height="300"></canvas>
                <br />
                <br />
                <div class="alert alert-alt alert-warning alert-dismissible text-center" role="alert">
                    <i class="fa fa-hashtag text-warning" aria-hidden="true"></i>
                    <span id="num_company_assistance" class="text-warning">{{ $marksCompany->sum() }}</span> asistencias
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <canvas id="byArea" width="400" height="300"></canvas>
                <br />
                <br />
                <div class="alert alert-alt alert-danger alert-dismissible text-center" role="alert">
                    <i class="fa fa-hashtag text-danger" aria-hidden="true"></i>
                    <span id="num_area_assistance" class="text-danger">{{ $marksArea->sum() }}</span> asistencias
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script src="{{ mix('js/graphics/assistance.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            var ctx     = document.getElementById("byCompany").getContext('2d');
            var ctx2    = document.getElementById("byArea").getContext('2d');
            var ctx3    = document.getElementById("byTypeCompany").getContext('2d');

            function syncChangeDateRange() {
                $.get('/graphics/changeDateInput',
                    {
                        company_id: $('#company_id').val(),
                        area_id: $('#area_id').val(),
                        init: $('#init').val(),
                        end: $('#end').val()
                    })
                    .done(function (response) {
                        // Update areas chart
                        areaChart.data.datasets[0].data[0] = response.area[0];
                        areaChart.data.datasets[0].data[1] = response.area[1];
                        areaChart.data.datasets[0].data[2] = response.area[2];
                        areaChart.update();
                        $('#num_area_assistance').text(response.area[0] + response.area[1] + response.area[2]);

                        // Update companies chart
                        companyChart.data.datasets[0].data[0] = response.company[0];
                        companyChart.data.datasets[0].data[1] = response.company[1];
                        companyChart.data.datasets[0].data[2] = response.company[2];
                        companyChart.update();
                        $('#num_company_assistance').text(response.company[0] + response.company[1] + response.company[2]);

                        // Update type companies chart
                        typeCompanyChart.data.datasets[0].data[0] = response.typeCompany[0];
                        typeCompanyChart.data.datasets[0].data[1] = response.typeCompany[1];
                        typeCompanyChart.data.datasets[0].data[2] = response.typeCompany[2];
                        typeCompanyChart.update();
                        $('#num_type_company_assistance').text(response.typeCompany[0] + response.typeCompany[1] + response.typeCompany[2]);
                    }
                );
            }

            $('#init').on('change', function () {
                var init    = moment($(this).val(), 'DD-MM-YYYY');
                var end     = moment($('#end').val(), 'DD-MM-YYYY');
                if (init > end) {
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('#js').addClass('hide');
                syncChangeDateRange();
            });

            $('#end').on('change', function () {
                var init    = moment($('#init').val(), 'DD-MM-YYYY');
                var end     = moment($(this).val(), 'DD-MM-YYYY');
                if (end < init) {
                    $('#js').html('<i class="fa fa-times"></i> Las fechas ingresadas no son válidas. Intente nuevamente.').removeClass('hide');
                    return false;
                }
                $('#js').addClass('hide');
                syncChangeDateRange();
            });

            $(document).on('change', '#company_id', function() {
                $.get('/graphics/changeCompanySelect',
                    { company_id: $('#company_id').val(), init: $('#init').val(), end: $('#end').val() })
                    .done(function (response) {
                        // update areas select
                        $('#area_id').empty();
                        $.each(response.areas, function(key, element) {
                            $('#area_id').append("<option value='" + element + "'>" + key + "</option>");
                        });
                        $('#area_id').selectpicker('refresh');

                        // Update areas chart
                        areaChart.data.datasets[0].data[0] = response.area[0];
                        areaChart.data.datasets[0].data[1] = response.area[1];
                        areaChart.data.datasets[0].data[2] = response.area[2];
                        areaChart.update();
                        $('#num_area_assistance').text(response.area[0] + response.area[1] + response.area[2]);

                        // Update companies chart
                        companyChart.data.datasets[0].data[0] = response.company[0];
                        companyChart.data.datasets[0].data[1] = response.company[1];
                        companyChart.data.datasets[0].data[2] = response.company[2];
                        companyChart.update();
                        $('#num_company_assistance').text(response.company[0] + response.company[1] + response.company[2]);
                    }
                );
            });

            $(document).on('change', '#area_id', function() {
                $.get('/graphics/changeAreaSelect',
                    { company_id: $('#company_id').val(), area_id: $('#area_id').val(), init: $('#init').val(), end: $('#end').val() })
                    .done(function (response) {
                        areaChart.data.datasets[0].data[0] = response.area[0];
                        areaChart.data.datasets[0].data[1] = response.area[1];
                        areaChart.data.datasets[0].data[2] = response.area[2];
                        areaChart.update();
                        $('#num_area_assistance').text(response.area[0] + response.area[1] + response.area[2]);
                    }
                );
            });

            var typeCompanyChart = new Chart(ctx3,{
                type: 'pie',
                data: {
                    labels: {!! $marksTypeCompany->keys() !!},
                    datasets: [{
                        data: {!! $marksTypeCompany->values() !!},
                        borderWidth: 1.3,
                        backgroundColor: [
                            'rgba(206, 147, 216, 1.0)', // PURPLE 200
                            'rgba(128, 222, 234, 1.0)', // CYAN 200
                            'rgba(255, 224, 130, 1.0)'  // AMBER 200
                        ],
                        hoverBackgroundColor: [
                            'rgba(156, 39, 176, 0.8)',  // PURPLE 500
                            'rgba(0, 188, 212, 0.8)',   // CYAN 500
                            'rgba(255, 193, 7, 0.8)'    // AMBER 500
                        ],
                        borderColor: [
                            'rgba(156, 39, 176, 1.0)',  // PURPLE 500
                            'rgba(0, 188, 212, 1.0)',   // CYAN 500
                            'rgba(255, 193, 7, 0.9)'    // AMBER 500
                        ]
                    }]
                }
            });

            var companyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["00:00 - 08:00", "08:00 - 16:00", "16:00 - 00:00"],
                    datasets: [{
                        label: '# de Asistencia por Empresa',
                        data: {!! $marksCompany->values() !!},
                        backgroundColor: [
                            'rgba(239, 154, 154, 0.2)', // RED 200
                            'rgba(144, 202, 249, 0.2)', // BLUE 200
                            'rgba(197, 225, 165, 0.2)'  // LIGHT GREEN 200
                        ],
                        borderColor: [
                            'rgba(244, 67, 54, 1.0)',   // RED 500
                            'rgba(33, 150, 243, 1.0)',  // BLUE 500
                            'rgba(139, 195, 74, 1.0)'   // LIGHT GREEN 500
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

            var areaChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["00:00 - 08:00", "08:00 - 16:00", "16:00 - 00:00"],
                    datasets: [{
                        label: '# de Asistencias por Área',
                        data: {!! $marksArea->values() !!},
                        backgroundColor: [
                            'rgba(159, 168, 218, 0.2)', // INDIGO 200
                            'rgba(128, 203, 196, 0.2)', // TEAL 200
                            'rgba(255, 204, 128, 0.2)'  // ORANGE 200
                        ],
                        borderColor: [
                            'rgba(63, 81, 181, 1.0)',   // INDIGO 500
                            'rgba(0, 150, 136, 1.0)',   // TEAL 500
                            'rgba(255, 152, 0, 1.0)'    // ORANGE 500
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    </script>

@stop
