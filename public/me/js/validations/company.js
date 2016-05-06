function validationForm() {

    if ($('#rut').parent().hasClass('has-error')) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> contiene un valor incorrecto.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#rut').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#rut').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#rut').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#rut').closest('.form-group').find('i.fa-check').remove();
        $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#rut').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#rut').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#rut').val().length > 15) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> no debe ser mayor que 15 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#rut').closest('.form-group').find('i.fa-check').remove();
        $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#rut').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#rut').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#firm_name').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Razón Social</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#firm_name').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#firm_name').closest('.form-group').find('i.fa-check').remove();
        $('#firm_name').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#firm_name').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#firm_name').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#firm_name').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#gyre').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Giro</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#gyre').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#gyre').closest('.form-group').find('i.fa-check').remove();
        $('#gyre').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#gyre').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#gyre').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#gyre').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#start_act').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Inicio Act</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#start_act').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#start_act').closest('.form-group').find('i.fa-check').remove();
        $('#start_act').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#start_act').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#start_act').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#start_act').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#address').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#address').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#address').closest('.form-group').find('i.fa-check').remove();
        $('#address').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#address').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#address').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#address').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#commune_id').text() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#commune_id').closest('.form-group').find('i.fa-check').remove();
        $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#commune_id').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#commune_id').closest('.form-group').find('i.fa-times').remove();
    }

    if (isNaN($('#commune_id').val())){
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> debe ser un número entero.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#commune_id').closest('.form-group').find('i.fa-check').remove();
        $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#commune_id').focus();
        return false;
    }else{
        $('#js').addClass('hide');
        $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#commune_id').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#num').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#num').closest('.form-group').find('i.fa-check').remove();
        $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#num').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#num').closest('.form-group').find('i.fa-times').remove();
    }

    if (isNaN($('#num').val())){
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> debe ser un número entero.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#num').closest('.form-group').find('i.fa-check').remove();
        $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#num').focus();
        return false;
    }else{
        $('#js').addClass('hide');
        $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#num').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#num').val().length > 8) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>N°</strong> no debe ser mayor que 8 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#num').closest('.form-group').find('i.fa-check').remove();
        $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#num').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#num').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#lot').val().length > 20) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Lote</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#lot').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#lot').closest('.form-group').find('i.fa-check').remove();
        $('#lot').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#lot').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#lot').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#lot').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#ofi').val().length > 5) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Oficina</strong> no debe ser mayor que 5 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#ofi').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#ofi').closest('.form-group').find('i.fa-check').remove();
        $('#ofi').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#ofi').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#ofi').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#ofi').closest('.form-group').find('i.fa-times').remove();
    }

    if (isNaN($('#floor').val())){
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso</strong> debe ser un número entero.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#floor').closest('.form-group').find('i.fa-check').remove();
        $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#floor').focus();
        return false;
    }else{
        $('#js').addClass('hide');
        $('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#floor').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#floor').val().length > 3) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso</strong> no debe ser mayor que 3 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#floor').closest('.form-group').find('i.fa-check').remove();
        $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#floor').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#floor').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#muni_license').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#muni_license').closest('.form-group').find('i.fa-check').remove();
        $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#muni_license').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#muni_license').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#muni_license').val().length > 50) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal</strong> no debe ser mayor que 50 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#muni_license').closest('.form-group').find('i.fa-check').remove();
        $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#muni_license').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#muni_license').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#email').parent().parent().hasClass('has-error')) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> contiene un valor incorrecto.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#email').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#email').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#email').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#email').closest('.form-group').find('i.fa-check').remove();
        $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#email').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#email').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#email').val().length > 100) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#email').closest('.form-group').find('i.fa-check').remove();
        $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#email').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#email').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#phone1').val() == '') {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#phone1').closest('.form-group').find('i.fa-check').remove();
        $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#phone1').focus();
        return false;
    }else {
        $('#js').addClass('hide');
        $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#phone1').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#phone1').val().length > 20) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#phone1').closest('.form-group').find('i.fa-check').remove();
        $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#phone1').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#phone1').closest('.form-group').find('i.fa-times').remove();
    }

    if ($('#phone2').val().length > 20) {
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
        $("#collapseOne").collapse("show");
        $('#phone2').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#phone2').closest('.form-group').find('i.fa-check').remove();
        $('#phone2').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        $('#phone2').focus();
        return false;
    } else {
        $('#js').addClass('hide');
        $('#phone2').closest('.form-group').removeClass('has-error').addClass('has-feedback');
        $('#phone2').closest('.form-group').find('i.fa-times').remove();
    }


    for(var i = 0; i < count_legal_representative; i++) {

        if ($('#male_surname' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#male_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#male_surname' + i).closest('.form-group').find('i.fa-check').remove();
            $('#male_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#male_surname' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#male_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#male_surname' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#male_surname' + i).val().length > 30) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#male_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#male_surname' + i).closest('.form-group').find('i.fa-check').remove();
            $('#male_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#male_surname' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#male_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#male_surname' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#female_surname' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#female_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#female_surname' + i).closest('.form-group').find('i.fa-check').remove();
            $('#female_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#female_surname' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#female_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#female_surname' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#female_surname' + i).val().length > 30) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#female_surname' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#female_surname' + i).closest('.form-group').find('i.fa-check').remove();
            $('#female_surname' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#female_surname' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#female_surname' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#female_surname' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#first_name' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#first_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#first_name' + i).closest('.form-group').find('i.fa-check').remove();
            $('#first_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#first_name' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#first_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#first_name' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#first_name' + i).val().length > 30) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#first_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#first_name' + i).closest('.form-group').find('i.fa-check').remove();
            $('#first_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#first_name' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#first_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#first_name' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#second_name' + i).val().length > 30) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Segundo Nombre Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 30 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#second_name' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#second_name' + i).closest('.form-group').find('i.fa-check').remove();
            $('#second_name' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#second_name' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#second_name' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#second_name' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#rut' + i).parent().hasClass('has-error')) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> contiene un valor incorrecto.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#rut' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#rut' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#rut' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#rut' + i).closest('.form-group').find('i.fa-check').remove();
            $('#rut' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#rut' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#rut' + i).val().length > 15) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 15 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#rut' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#rut' + i).closest('.form-group').find('i.fa-check').remove();
            $('#rut' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#rut' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#rut' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#rut' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#birthday' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Nac Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#birthday' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#birthday' + i).closest('.form-group').find('i.fa-check').remove();
            $('#birthday' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#birthday' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#birthday' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#birthday' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#nationality_id' + i).text() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#nationality_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#nationality_id' + i).closest('.form-group').find('i.fa-check').remove();
            $('#nationality_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#nationality_id' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#nationality_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#nationality_id' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if (isNaN($('#nationality_id' + i).val())){
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad Rep. Legal ' + (i + 1) + '</strong> debe ser un número entero.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#nationality_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#nationality_id' + i).closest('.form-group').find('i.fa-check').remove();
            $('#nationality_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#nationality_id' + i).focus();
            return false;
        }else{
            $('#js').addClass('hide');
            $('#nationality_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#nationality_id' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email' + i).parent().parent().hasClass('has-error')) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> contiene un valor incorrecto.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#email' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#email' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#email' + i).closest('.form-group').find('i.fa-check').remove();
            $('#email' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#email' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email' + i).val().length > 100) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 100 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#email' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#email' + i).closest('.form-group').find('i.fa-check').remove();
            $('#email' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#email' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#email' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone1-' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Rep. Legal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#phone1-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone1-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone1-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone1-' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#phone1-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone1-' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone1-' + i).val().length > 20) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#phone1-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone1-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone1-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone1-' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#phone1-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone1-' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone2-' + i).val().length > 20) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2 Rep. Legal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
            $("#collapseTwo").collapse("show");
            $('#phone2-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone2-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone2-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone2-' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#phone2-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone2-' + i).closest('.form-group').find('i.fa-times').remove();
        }
    }


    for(var i = 0; i < count_subsidiary; i++) {

        if ($('#address_suc' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#address_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#address_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#address_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#address_suc' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#address_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#address_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#commune_suc_id' + i).text() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#commune_suc_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#commune_suc_id' + i).closest('.form-group').find('i.fa-check').remove();
            $('#commune_suc_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#commune_suc_id' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#commune_suc_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#commune_suc_id' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if (isNaN($('#commune_suc_id' + i).val())){
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna Sucursal ' + (i + 1) + '</strong> debe ser un número entero.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#commune_suc_id' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#commune_suc_id' + i).closest('.form-group').find('i.fa-check').remove();
            $('#commune_suc_id' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#commune_suc_id' + i).focus();
            return false;
        }else{
            $('#js').addClass('hide');
            $('#commune_suc_id' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#commune_suc_id' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#num_suc' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>N° Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#num_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#num_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#num_suc' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#num_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if (isNaN($('#num_suc' + i).val())){
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>N° Sucursal ' + (i + 1) + '</strong> debe ser un número entero.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#num_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#num_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#num_suc' + i).focus();
            return false;
        }else{
            $('#js').addClass('hide');
            $('#num_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#num_suc' + i).val().length > 8) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>N° Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 8 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#num_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#num_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#num_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#num_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#num_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#lot_suc' + i).val().length > 20) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Lote Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#lot_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#lot_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#lot_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#lot_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#lot_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#lot_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#ofi_suc' + i).val().length > 5) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Oficina Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 5 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#ofi_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#ofi_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#ofi_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#ofi_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#ofi_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#ofi_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if (isNaN($('#floor_suc' + i).val())){
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso Sucursal ' + (i + 1) + '</strong> debe ser un número entero.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#floor_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#floor_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#floor_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#floor_suc' + i).focus();
            return false;
        }else{
            $('#js').addClass('hide');
            $('#floor_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#floor_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#floor_suc' + i).val().length > 3) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Piso Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 3 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#floor_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#floor_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#floor_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#floor_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#floor_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#floor_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#muni_license_suc' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#muni_license_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#muni_license_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#muni_license_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#muni_license_suc' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#muni_license_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#muni_license_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#muni_license_suc' + i).val().length > 50) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Patente Municipal Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 50 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#muni_license_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#muni_license_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#muni_license_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#muni_license_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#muni_license_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#muni_license_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email_suc' + i).parent().parent().hasClass('has-error')) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Sucursal ' + (i + 1) + '</strong> contiene un valor incorrecto.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#email_suc' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#email_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email_suc' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#email_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#email_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#email_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#email_suc' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#email_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#email_suc' + i).val().length > 100) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 100 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#email_suc' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#email_suc' + i).closest('.form-group').find('i.fa-check').remove();
            $('#email_suc' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#email_suc' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#email_suc' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#email_suc' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone1_suc-' + i).val() == '') {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Sucursal ' + (i + 1) + '</strong> es obligatorio.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#phone1_suc-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone1_suc-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone1_suc-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone1_suc-' + i).focus();
            return false;
        }else {
            $('#js').addClass('hide');
            $('#phone1_suc-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone1_suc-' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone1_suc-' + i).val().length > 20) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1 Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#phone1_suc-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone1_suc-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone1_suc-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone1_suc-' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#phone1_suc-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone1_suc-' + i).closest('.form-group').find('i.fa-times').remove();
        }

        if ($('#phone2_suc-' + i).val().length > 20) {
            $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2 Sucursal ' + (i + 1) + '</strong> no debe ser mayor que 20 caracteres.').removeClass('hide');
            $("#collapseThree").collapse("show");
            $('#phone2_suc-' + i).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $('#phone2_suc-' + i).closest('.form-group').find('i.fa-check').remove();
            $('#phone2_suc-' + i).closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
            $('#phone2_suc-' + i).focus();
            return false;
        } else {
            $('#js').addClass('hide');
            $('#phone2_suc-' + i).closest('.form-group').removeClass('has-error').addClass('has-feedback');
            $('#phone2_suc-' + i).closest('.form-group').find('i.fa-times').remove();
        }
    }
}