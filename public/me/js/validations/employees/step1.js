function validateStep1() {

    if ($('#male_surname').val() == '') {
        $('#male_surname').focus();
        $('#male_surname').parent().addClass('has-error');
        $('#js').html('<i class="fa fa-times"></i> El campo Apellido Paterno es obligatorio.').removeClass('hide');
        return false;
    }else {
        $('#js').addClass('hide');
        $('#male_surname').parent().removeClass('has-error');
        return true;
    }
}
