$(document).ready(function () {

    $('#btnSubmit').click(function (e) {

        e.preventDefault();

        var form   = $('#form-submit');
        var action = $('#form-submit').attr('action');
        var button = $(this);

        sanitizedMoneyFields();
        button.addClass('btn-success').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Guardando...');
        $.ajax({
            type: 'POST',
            url: action,
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    window.location.href = response.url;
                }
            },
            error: function (response) {
                button.removeClass('btn-success').html('<i class="fa fa-floppy-o"></i> Guardar');
                var errors = $.parseJSON(response.responseText);
                $.each(errors, function (index, value) {
                    $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                    $('#' + index).focus();
                    return false;
                });
            }
        });
    });

    $('#btn-preview-contract').on('click', function (e) {
        e.preventDefault();

        var companyFirmName = $('#company_id option:selected').text();
        var typeContract    = $('#type_contract_id option:selected').text();
        var employee        = $('#employee_id option:selected').text();
        var position        = $('#position_id option:selected').text();
        var dayTrip         = $('#day_trip_id option:selected').text();
        var initMorning     = $('#init_morning').val();
        var endMorning      = $('#end_morning').val();
        var initAfternoon   = $('#init_afternoon').val();
        var endAfternoon    = $('#end_afternoon').val();
        var salary          = $('#salary').val();

        $('.type_contract_preview').text(typeContract);
        $('#company_firm_name_preview').text(companyFirmName);
        $('#employee_preview').text(employee);
        $('#position_preview').text(position);
        $('#day_trip_preview').text(dayTrip);
        $('#init_morning_preview').text(initMorning);
        $('#end_morning_preview').text(endMorning);
        $('#init_afternoon_preview').text(initAfternoon);
        $('#end_afternoon_preview').text(endAfternoon);
        $('#salary_preview').text(salary);
    });
});
