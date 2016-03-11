
	function validaEmail(email) {

		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return re.test(email);

	}


	function checkElementEmail(input) {

		if (input.length == 5)
			return "Company";

		if(input.length == 6)
			return "Representative";

		if(input.length == 10)
			return "Subsidiary";
	}


	$.fn.checkEmail = function() {

		var element = $('#' + $(this).attr('id'));
		var input   = checkElementEmail($(this).attr('id'));

		if ($(this).val() == '')
			return false;

		if (!validaEmail(element.val())) {
			element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
			element.closest('.form-group').find('i.fa-check').remove();
			element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
		}else {

			$.ajax ({
				type: 'POST',
				url: '/verificaEmail',
				data: { email: element.val(), element: input },
				dataType: "json",

				beforeSend: function() {
					element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
					element.closest('.form-group').find('i.fa-times').remove();
					element.closest('.form-group').find('i.fa-check').remove();
					element.closest('.form-group').append('<i class="fa fa-spinner fa-pulse fa-lg form-control-feedback"></i>');
				},

				success: function(data)
				{
					element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
					element.closest('.form-group').find('i.fa-spinner').remove();
					element.closest('.form-group').find('i.fa-times').remove();
					element.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
				},

				error: function(data){
					element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
					element.closest('.form-group').find('i.fa-spinner').remove();
					element.closest('.form-group').find('i.fa-check').remove();
					element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
				}
			});
		}
	}

