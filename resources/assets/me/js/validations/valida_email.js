
	function validaEmail(email) {

		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return re.test(email);

	}

	$.fn.checkEmail = function() {

		var element = $(this);
		var input   = $(this).attr('id');

		if ($(this).val() == '') {
			element.closest('.form-group').removeClass('has-error has-feedback');
			return false;
		}

		if (!validaEmail(element.val())) {
			element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
			toastr.error(
				'Verifique que el email está ingresado correctamente',
				'Email Incorrecto',
				{
					"closeButton": true,
					"preventDuplicates": true,
					"progressBar": true,
				}
			);
		}else {
			$('div#' + input).removeClass('hide');
			$.ajax ({
				type: 'POST',
				url: '/verificaEmail',
				data: { email: element.val(), element: input },
				dataType: "json",
				success: function()
				{
					$('div#' + input).addClass('hide');
					element.closest('.form-group').removeClass('has-error has-feedback');
					toastr.success(
						'El Email se encuentra disponible en nuestra Base de Datos',
						'Email Válido',
						{
							"closeButton": true,
							"preventDuplicates": true,
							"progressBar": true,
						}
					);
				},

				error: function(){
					$('div#' + input).addClass('hide');
					element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
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

