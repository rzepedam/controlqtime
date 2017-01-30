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

        var company       = $('#company_id option:selected').val();
        var employee      = $('#employee_id option:selected').val();
        var typeContract  = $('#type_contract_id option:selected').text();
        var position      = $('#position_id option:selected').text();
        var dayTrip       = $('#day_trip_id option:selected').text();
        var initMorning   = $('#init_morning').val();
        var endMorning    = $('#end_morning').val();
        var initAfternoon = $('#init_afternoon').val();
        var endAfternoon  = $('#end_afternoon').val();
        var salary        = $('#salary').val();

        $('#company_city_contract_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_firm_name_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_rut_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_address_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#legal_representative_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_name_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_rut_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_birthday_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_marital_status_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_nationality_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#employee_address_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');

        $.post('/human-resources/contracts/loadDataPreviewContract',
            {company: company, employee: employee},
            function (response) {
                var company         = response.company;
                var employee        = response.employee;
                var employeeDepto   = employee.address.detail_address_legal_employee.depto ? ', Depto ' + employee.address.detail_address_legal_employee.depto : '';
                var employeeBlock   = employee.address.detail_address_legal_employee.block ? ', Block ' + employee.address.detail_address_legal_employee.block : '';
                var employeeNumHome = employee.address.detail_address_legal_employee.block ? ', Nº Casa ' + employee.address.detail_address_legal_employee.block : '';

                $('#company_city_contract_preview').text(company.address.commune.province.name);
                $('#company_firm_name_preview').text(company.firm_name);
                $('#company_rut_preview').text(company.rut);
                $('#company_address_preview').text(company.address.address + ', ' + company.address.commune.name + '. ' + company.address.commune.province.name + '. ' + company.address.commune.province.region.name);
                $('#legal_representative_preview').text(company.legal_representative.full_name);

                $('#employee_name_preview').text(employee.full_name);
                $('#employee_rut_preview').text(employee.rut);
                $('#employee_birthday_preview').text(employee.birthday);
                $('#employee_marital_status_preview').text(employee.marital_status.name);
                $('#employee_nationality_preview').text(employee.nationality.name);
                $('#employee_address_preview').text(employee.address.address + employeeDepto + employeeBlock + employeeNumHome + '. ' + employee.address.commune.name + '. ' + employee.address.commune.province.name + '. ' + employee.address.commune.province.region.name);

                $('#position_preview').text(position);
                $('#day_trip_preview').text(dayTrip);
                $('#init_morning_preview').text(initMorning);
                $('#end_morning_preview').text(endMorning);
                $('#init_afternoon_preview').text(initAfternoon);
                $('#end_afternoon_preview').text(endAfternoon);
                $('#salary_preview').text(salary);
            }
        );

    });
});
