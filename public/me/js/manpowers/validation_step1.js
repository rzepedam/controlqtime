function validateStep1() {

    var isValid = true;

    /* male_surname */
    if ($('#male_surname').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#male_surname').closest('div').addClass('has-error');
        $('#male_surname').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#male_surname').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#male_surname').focus();
    }


    if ($('#male_surname').val().length > 30) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#male_surname').closest('div').addClass('has-error');
        $('#male_surname').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> no debe ser mayor que 30 caracteres.');
        return false;
    } else {
        $('#male_surname').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#male_surname').focus();
    }

    /* female_surname */
    if ($('#female_surname').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#female_surname').closest('div').addClass('has-error');
        $('#female_surname').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#female_surname').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#female_surname').focus();
    }


    if ($('#female_surname').val().length > 30) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#female_surname').closest('div').addClass('has-error');
        $('#female_surname').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> no debe ser mayor que 30 caracteres.');
        return false;
    } else {
        $('#female_surname').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#female_surname').focus();
    }

    /* first_name */
    if ($('#first_name').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#first_name').closest('div').addClass('has-error');
        $('#first_name').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#first_name').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#first_name').focus();
    }


    if ($('#first_name').val().length > 30) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#first_name').closest('div').addClass('has-error');
        $('#first_name').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> no debe ser mayor que 30 caracteres.');
        return false;
    } else {
        $('#first_name').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#first_name').focus();
    }

    /* second_name */
    if ($('#second_name').val().length > 30) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#second_name').closest('div').addClass('has-error');
        $('#second_name').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Segundo Nombre</strong> no debe ser mayor que 30 caracteres.');
        return false;
    } else {
        $('#second_name').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#second_name').focus();
    }

    /* rut */
    if ($('#rut').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#rut').closest('div').addClass('has-error');
        $('#rut').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#rut').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#rut').focus();
    }

    /* birthday */
    if ($('#birthday').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#birthday').closest('div').addClass('has-error');
        $('#birthday').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Nacimiento</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#birthday').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#birthday').focus();
    }

    /* forecast */
    if ($('#forecast_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#forecast_id').closest('div').addClass('has-error');
        $('#forecast_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Previsión</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#forecast_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#forecast_id').focus();
    }

    /* country */
    if ($('#country_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#country_id').closest('div').addClass('has-error');
        $('#country_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#country_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#country_id').focus();
    }

    /* gender */
    if ($('#gender_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#gender_id').closest('div').addClass('has-error');
        $('#gender_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Sexo</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#gender_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#gender_id').focus();
    }

    /* rating */
    if ($('#rating_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#rating_id').closest('div').addClass('has-error');
        $('#rating_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Cargo</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#rating_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#rating_id').focus();
    }

    /* subarea */
    if ($('#subarea_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#subarea_id').closest('div').addClass('has-error');
        $('#subarea_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Subárea</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#subarea_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#subarea_id').focus();
    }

    /* commune */
    if ($('#commune_id').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#commune_id').closest('div').addClass('has-error');
        $('#commune_id').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#commune_id').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#commune_id').focus();
    }

    /* address */
    if ($('#address').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#address').closest('div').addClass('has-error');
        $('#address').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#address').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#address').focus();
    }

    /* phone1 */
    if ($('#phone1').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#phone1').closest('div').addClass('has-error');
        $('#phone1').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#phone1').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#phone1').focus();
    }

    if ($('#phone1').val().length > 20) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#phone1').closest('div').addClass('has-error');
        $('#phone1').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.');
        return false;
    } else {
        $('#phone1').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#phone1').focus();
    }

    /* phone2 */
    if ($('#phone2').val().length > 20) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#phone2').closest('div').addClass('has-error');
        $('#phone2').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.');
        return false;
    } else {
        $('#phone2').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#phone2').focus();
    }

    /* email */
    if ($('#email').val() == '') {
        isValid = false;
        $('#js').removeClass('hide');
        $('#email').closest('div').addClass('has-error');
        $('#email').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio').removeClass('hide');
        return false;
    } else {
        $('#email').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#email').focus();
    }

    if ($('#email').val().length > 100) {
        isValid = false;
        $('#js').removeClass('hide');
        $('#email').closest('div').addClass('has-error');
        $('#email').focus();
        $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.');
        return false;
    } else {
        $('#email').closest('div').removeClass('has-error');
        $('#js').addClass('hide');
        $('#email').focus();
    }

    return isValid;

}