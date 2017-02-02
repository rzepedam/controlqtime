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

    $('#preview_contract').on('shown.bs.modal', function () {
        $('.modal-body').asScrollable({});
    });

    $('#btn-preview-contract').on('click', function (e) {
        e.preventDefault();

        var company          = $('#company_id option:selected').val();
        var employee         = $('#employee_id option:selected').val();
        var type_contract_id = $('#type_contract_id option:selected').val();
        var typeContract     = $('#type_contract_id option:selected').text();
        var position         = $('#position_id option:selected').text();
        var dayTrip          = $('#day_trip_id option:selected').text();
        var initMorning      = $('#init_morning').val();
        var endMorning       = $('#end_morning').val();
        var initAfternoon    = $('#init_afternoon').val();
        var endAfternoon     = $('#end_afternoon').val();
        var salary           = $('#salary').val();

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
        $('#company_lot_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_bod_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_floor_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');
        $('#company_ofi_preview').html('<i class="fa fa-spinner fa-pulse fa-fw text-primary"></i>');

        $.post('/human-resources/contracts/loadDataPreviewContract',
            {company: company, employee: employee, type_contract_id: type_contract_id},
            function (response) {

                var company         = response.company;
                var companyLot      = company.address.detail_address_company.lot ? ', Lote ' + company.address.detail_address_company.lot : '';
                var companyBod      = company.address.detail_address_company.bod ? ', Bodega ' + company.address.detail_address_company.bod : '';
                var companyFloor    = company.address.detail_address_company.floor ? ', Piso ' + company.address.detail_address_company.floor : '';
                var companyOfi      = company.address.detail_address_company.ofi ? ', Oficina ' + company.address.detail_address_company.ofi : '';
                var companyAddress  = company.address.address + companyLot + companyBod + companyFloor + companyOfi + ', ' + company.address.commune.name + '. ' + company.address.commune.province.name + '. ' + company.address.commune.province.region.name;
                var employee        = response.employee;
                var employeeDepto   = employee.address.detail_address_legal_employee.depto ? ', Depto ' + employee.address.detail_address_legal_employee.depto : '';
                var employeeBlock   = employee.address.detail_address_legal_employee.block ? ', Block ' + employee.address.detail_address_legal_employee.block : '';
                var employeeNumHome = employee.address.detail_address_legal_employee.block ? ', Nº Casa ' + employee.address.detail_address_legal_employee.block : '';
                var expiresAt       = typeContract === 'Indefinido' ? 'Indefinido' : response.expiresAt;

                $('.company_city_contract_preview').html(company.address.commune.province.name);
                $('#company_firm_name_preview').html(company.firm_name);
                $('#company_rut_preview').html(company.rut);
                $('.company_address_preview').html(companyAddress);
                $('#legal_representative_preview').html(company.legal_representative.full_name);

                $('#employee_name_preview').html(employee.full_name);
                $('#employee_rut_preview').html(employee.rut);
                $('#employee_birthday_preview').html(employee.birthday);
                $('#employee_marital_status_preview').html(employee.marital_status.name);
                $('#employee_nationality_preview').html(employee.nationality.name);
                $('#employee_address_preview').html(employee.address.address + employeeDepto + employeeBlock + employeeNumHome + '. ' + employee.address.commune.name + '. ' + employee.address.commune.province.name + '. ' + employee.address.commune.province.region.name);

                $('#position_preview').html(position);
                $('#company_lot_preview').html(companyAddress);
                $('#day_trip_preview').html(dayTrip);
                $('#init_morning_preview').html(initMorning);
                $('#end_morning_preview').html(endMorning);
                $('#init_afternoon_preview').html(initAfternoon);
                $('#end_afternoon_preview').html(endAfternoon);
                $('#salary_preview').html(salary);
                $('#expires_at_contract_preview').html(expiresAt);
                $('#btnSubmit').attr('disabled', false);
            }
        );
    });
});
