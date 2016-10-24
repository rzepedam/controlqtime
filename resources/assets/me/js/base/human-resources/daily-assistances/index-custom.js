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

        $("#data-access-update").html('<tr class="text-center"><td></td><td></td><td><i class="fa fa-spinner fa-spin fa-fw fa-3x text-primary"></i></td><td></td><td></td></tr>');
        $("#data-daily-update").html('<tr class="text-center"><td></td><td></td><td><i class="fa fa-spinner fa-spin fa-fw fa-3x text-primary"></i></td><td></td><td></td></tr>');
        
        $.post('daily-assistances-by-date',
            {"date": date},
            function (response) {
                $('#access_control').html(response.accessControls.length);
                $('#daily_assistance').html(response.dailyAssistances.length);
                $('#num_employees').html(response.num_employees.length);
                $("#data-access-update").empty();

                if (response.accessControls.length > 0) {
                    $.each(response.accessControls, function (i, td) {
                        $("#data-access-update").append('<tr> <td>' + (i + 1) + '</td><td>' + (td.employee.full_name) + ' </td>' +
                            '<td class="text-center">' + (td.num_device) + '</td><td class="text-center">' + (td.created_at) + '</td>' +
                            '<td class="text-center"><a href="human-resources/employees/' + td.employee.id +
                            '" class="btn btn-squared btn-info waves-effect waves-light"><i class="fa fa-search" ' +
                            'aria-hidden="true"></i></a></td></tr>');
                    });
                }else {
                    $("#data-access-update").append('<tr class="text-center"><td></td><td></td><td><i class="fa fa-exclamation-circle text-danger"></i> No existe información asociada</td><td></td><td></td></tr>');
                }

                $("#data-daily-update").empty();
                if (response.dailyAssistances.length > 0) {
                    $.each(response.dailyAssistances, function (i, td) {
                        $("#data-daily-update").append('<tr> <td>' + (i + 1) + '</td><td>' + (td.employee.full_name) + ' </td>' +
                            '<td class="text-center">' + (td.num_device) + '</td><td class="text-center">' + (td.created_at) + '</td>' +
                            '<td class="text-center"><a href="human-resources/employees/' + td.employee.id +
                            '" class="btn btn-squared btn-info waves-effect waves-light"><i class="fa fa-search" ' +
                            'aria-hidden="true"></i></a></td></tr>');
                    });
                }else{
                    $("#data-daily-update").append('<tr class="text-center"><td></td><td></td><td><i class="fa fa-exclamation-circle text-danger"></i> No existe información asociada</td><td></td><td></td></tr>');
                }

                dateLast = date;
            }).fail(function (response) {
                alert('No existen coincidencias para la fecha seleccionada.');
            }
        );
    }
});
