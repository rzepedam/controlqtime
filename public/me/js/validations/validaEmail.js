
	function validaEmail(email) {

		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return re.test(email);

	}

	$.fn.checkEmail = function() {

		var element = $(this);
		var input   = $(this).attr('id');

		if ($(this).val() == '')
			return false;

		if (!validaEmail(element.val())) {
			element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
			toastr.error(
				'Verifique que el email está ingresado correctamente',
				'Email Incorrecto',
				{
					"closeButton": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": true,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			);
		}else {

			$.ajax ({
				type: 'POST',
				url: '/verificaEmail',
				data: { email: element.val(), element: input },
				dataType: "json",

				/*beforeSend: function() {
					element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
					element.closest('.form-group').append('<i class="fa fa-spinner fa-pulse fa-lg form-control-feedback"></i>');
				},*/

				success: function()
				{
					element.closest('.form-group').removeClass('has-error has-feedback');
					//element.closest('.form-group').find('i.fa-spinner').remove();
				},

				error: function(){
					element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
					//element.closest('.form-group').find('i.fa-spinner').remove();
					toastr.error(
						'El Email ya se encuentra registrado en nuestra Base de Datos',
						'Email Registrado',
						{
							"preventDuplicates": true,
							"progressBar": true,
						}
					);
				}
			});
		}
	}

