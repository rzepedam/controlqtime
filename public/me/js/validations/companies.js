
$('#btn-submit').click(function(e){

	e.preventDefault();

	/**************************************************
    ******************* Validations *******************
    **************************************************/

    if ($('#rut').parent().hasClass('has-error')) {
    	$("#collapseOne").collapse("show");
    	$('#rut').focus();
		return false;
    }

    if ($('#rut').val() == '') {
		$("#collapseOne").collapse("show");
		$('#rut').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#rut').closest('.form-group').find('i.fa-check').remove();
        $('#rut').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#rut').focus();
		return false;
    }else {
        $('#rut').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#rut').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#name').val() == '') {
		$("#collapseOne").collapse("show");
		$('#name').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#name').closest('.form-group').find('i.fa-check').remove();
        $('#name').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#name').focus();
		return false;
	}else {
        $('#name').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#name').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#gyre').val() == '') {
		$("#collapseOne").collapse("show");
		$('#gyre').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#gyre').closest('.form-group').find('i.fa-check').remove();
        $('#gyre').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#gyre').focus();
		return false;
	}else {
        $('#gyre').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#gyre').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#from').val() == '') {
		$("#collapseOne").collapse("show");
		$('#from').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#from').closest('.form-group').find('i.fa-check').remove();
        $('#from').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#from').focus();
		return false;
	}else {
        $('#from').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#from').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#address').val() == '') {
		$("#collapseOne").collapse("show");
		$('#address').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#address').closest('.form-group').find('i.fa-check').remove();
        $('#address').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#address').focus();
		return false;
	}else {
        $('#address').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#address').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#region_id').val() == '') {
		$("#collapseOne").collapse("show");
		$('#region_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#region_id').closest('.form-group').find('i.fa-check').remove();
        $('#region_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#region_id').focus();
		return false;
	}else {
        $('#region_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#region_id').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#province_id').val() == '') {
		$("#collapseOne").collapse("show");
		$('#province_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#province_id').closest('.form-group').find('i.fa-check').remove();
        $('#province_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#province_id').focus();
		return false;
	}else {
        $('#province_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#province_id').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#commune_id').val() == '') {
		$("#collapseOne").collapse("show");
		$('#commune_id').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#commune_id').closest('.form-group').find('i.fa-check').remove();
        $('#commune_id').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#commune_id').focus();
		return false;
	}else {
        $('#commune_id').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#commune_id').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#num').val() == '') {
		$("#collapseOne").collapse("show");
		$('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#num').closest('.form-group').find('i.fa-check').remove();
        $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#num').focus();
		return false;
	}else {
        $('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#num').closest('.form-group').find('i.fa-times').remove();
	}

	if (isNaN($('#num').val())){
		$("#collapseOne").collapse("show");
		$('#num').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#num').closest('.form-group').find('i.fa-check').remove();
        $('#num').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#num').focus();
		return false;
	}else{
		$('#num').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#num').closest('.form-group').find('i.fa-times').remove();
	}

	if (isNaN($('#floor').val())){
		$("#collapseOne").collapse("show");
		$('#floor').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#floor').closest('.form-group').find('i.fa-check').remove();
        $('#floor').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#floor').focus();
		return false;
	}else{
		$('#floor').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#floor').closest('.form-group').find('i.fa-times').remove();
	}


	if ($('#muni_license').val() == '') {
		$("#collapseOne").collapse("show");
		$('#muni_license').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#muni_license').closest('.form-group').find('i.fa-check').remove();
        $('#muni_license').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#muni_license').focus();
		return false;
	}else {
        $('#muni_license').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#muni_license').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#email').parent().parent().hasClass('has-error')) {
    	$("#collapseOne").collapse("show");
    	$('#email').focus();
		return false;
    }

	if ($('#email').val() == '') {
		$("#collapseOne").collapse("show");
		$('#email').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#email').closest('.form-group').find('i.fa-check').remove();
        $('#email').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#email').focus();
		return false;
	}else {
        $('#email').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#email').closest('.form-group').find('i.fa-times').remove();
	}

	if ($('#phone1').val() == '') {
		$("#collapseOne").collapse("show");
		$('#phone1').closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $('#phone1').closest('.form-group').find('i.fa-check').remove();
        $('#phone1').closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		$('#phone1').focus();
		return false;
	}else {
        $('#phone1').closest('.form-group').removeClass('has-error').addClass('has-feedback');
		$('#phone1').closest('.form-group').find('i.fa-times').remove();
	}

});