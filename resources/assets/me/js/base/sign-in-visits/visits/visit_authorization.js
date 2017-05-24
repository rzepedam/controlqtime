$(document).ready(function() {

	$('#btnApproved').on('click', function() {
		var button = $(this);
		var id = $(this).attr('data-id');
		
	    button.html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
		$.get('/sign-in-visits/visit-authorization',
	        {id: id, status: 'approved'},
	        function (response) {
	            if (response.status) {
	                sweetAlert("Yeah!", "Visita autorizada exitosamente. Se le confirmará a través de email fecha y hora señalados.", "success");
	                button.html('<i class="fa fa-check" aria-hidden="true"></i> Aprobar');
	                button.attr('disabled', true);
	                $('#btnDenied').attr('disabled', false);
	                if ( $('#iconState').find('i').attr('data-text') === 'denied' ) {
            			var icon = $('#iconState').find('i').attr('data-text', 'denied');
            			icon.removeClass('fa-times-circle-o text-danger tooltip-danger');
            			icon.addClass('fa-check-circle-o text-success tooltip-success');
            			icon.attr('data-original-title', 'Aprobado');
            			icon.attr('data-text', 'approved');
					} else {
						var icon = $('#iconState').find('i').attr('data-text', 'pending');
            			icon.removeClass('fa-exclamation-circle text-warning tooltip-warning');
            			icon.addClass('fa-check-circle-o text-success tooltip-success');
            			icon.attr('data-original-title', 'Aprobado');
            			icon.attr('data-text', 'approved');
					}
	            } else {
	                sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
	                button.html('<i class="fa fa-check" aria-hidden="true"></i> Aprobar')
	            }
	        }).fail(function (response) {
	            button.html('<i class="fa fa-check" aria-hidden="true"></i> Aprobar');
	        }
	    );
	});

	$('#btnDenied').on('click', function() {
		var button = $(this);
		var id = $(this).attr('data-id');
		
	    button.html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
		$.get('/sign-in-visits/visit-authorization',
	        {id: id, status: 'denied'},
	        function (response) {
	            if (response.status) {
	                sweetAlert("Yeah!", "Visita denegada exitosamente. Se le solicitará la revisión de la documentanción nuevamente.", "success");
	                button.html('<i class="fa fa-times" aria-hidden="true"></i> Denegar');
	                button.attr('disabled', true);
	                $('#btnApproved').attr('disabled', false);
	                if ( $('#iconState').find('i').attr('data-text') === 'approved' ) {
                		var icon = $('#iconState').find('i').attr('data-text', 'approved');
            			icon.removeClass('fa-check-circle-o text-success tooltip-success');
            			icon.addClass('fa-times-circle-o text-danger tooltip-danger');
            			icon.attr('data-original-title', 'Denegado');
            			icon.attr('data-text', 'denied');
	                } else {
                		var icon = $('#iconState').find('i').attr('data-text', 'pending');
            			icon.removeClass('fa-exclamation-circle text-warning tooltip-warning');
            			icon.addClass('fa-times-circle-o text-danger tooltip-danger');
            			icon.attr('data-original-title', 'Denegado');
            			icon.attr('data-text', 'denied');
	                }
	            } else {
	                sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
	                button.html('<i class="fa fa-times" aria-hidden="true"></i> Denegar')
	            }
	        }).fail(function (response) {
	            button.html('<i class="fa fa-times" aria-hidden="true"></i> Denegar');
	        }
	    );
	});
});