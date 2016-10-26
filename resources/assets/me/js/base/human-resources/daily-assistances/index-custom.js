var dateLast = '';

$('.date').datepicker({
    autoclose: true,
    language: 'es',
    format: 'dd-mm-yyyy',
    orientation: "bottom",
    todayBtn: true,
    todayHighlight: true,
    endDate: new Date()
}).on('changeDate', function (e) {

    var date = $('#date').val();

    if (date != dateLast) {

        $("#data-access-table").html('<div class="col-md-12 text-center"><i class="fa fa-spinner fa-spin fa-fw fa-3x text-primary"></i></div>');
        $("#data-daily-table").html('<div class="col-md-12 text-center"><i class="fa fa-spinner fa-spin fa-fw fa-3x text-primary"></i></div>');
        
        $.post('daily-assistances-by-date',
            {"date": date},
            function (response) {
                $('#access_control').html(response.accessControls.length);
                $('#daily_assistance').html(response.dailyAssistances.length);
                $('#num_employees').html(response.num_employees.length);

                if (response.accessControls.length > 0) {
                    $("#data-access-table").html('<div class="table-responsive"><table class="table"> <thead> ' +
                        '<tr> <th>#</th> <th>Trabajador</th><th class="text-center">Dispositivo</th> ' +
                        '<th class="text-center">Hora</th> <th class="text-center"></th></tr></thead> ' +
                        '<tbody id="update-data-access-table"></tbody></table></div>');

                    $.each(response.accessControls, function (i, td) {
                        // Se Verifica si acceso es entrada a jornada laboral
                        var entry = (td.created_at === response.entry[td.rut]) ? ' <i class="fa fa-sign-in text-success" aria-hidden="true"></i>' : '';

                        $('#update-data-access-table').apcpend('<tr> <td>' + (i + 1) + '</td><td>' +
                            (td.employee.full_name) + entry + ' </td>' + '<td class="text-center">'
                            + (td.num_device) + '</td><td class="text-center">' + (td.created_at) + '</td>' +
                            '<td class="text-center"><a href="employees/' + td.employee.id +
                            '" class="btn btn-squared btn-info waves-effect waves-light"><i class="fa fa-search" ' +
                            'aria-hidden="true"></i></a></td></tr>');
                    });
                }else {
                    $("#data-access-table").html('<div class="alert alert-danger alert-dismissible text-center" role="alert"> <i class="fa fa-exclamation-circle"></i> No existe información asociada</div>');
                }

                if (response.dailyAssistances.length > 0) {
                    $("#data-daily-table").html('<div class="table-responsive"><table class="table"> <thead> ' +
                        '<tr> <th>#</th> <th>Trabajador</th><th class="text-center">Dispositivo</th> ' +
                        '<th class="text-center">Hora</th> <th class="text-center"></th></tr></thead> ' +
                        '<tbody id="update-data-daily-table"></tbody></table></div>');

                    $.each(response.dailyAssistances, function (i, td) {
                        $('#update-data-daily-table').append('<tr> <td>' + (i + 1) + '</td><td>' + (td.employee.full_name) + ' </td>' +
                            '<td class="text-center">' + (td.num_device) + '</td><td class="text-center">' + (td.created_at) + '</td>' +
                            '<td class="text-center"><a href="employees/' + td.employee.id +
                            '" class="btn btn-squared btn-info waves-effect waves-light"><i class="fa fa-search" ' +
                            'aria-hidden="true"></i></a></td></tr>');
                    });
                }else{
                    $("#data-daily-table").html('<div class="alert alert-danger alert-dismissible text-center" role="alert"> <i class="fa fa-exclamation-circle"></i> No existe información asociada</div>');
                }

                dateLast = date;
            }).fail(function (response) {
                alert('No existen coincidencias para la fecha seleccionada.');
            }
        );
    }
});
