$('#btnSubmit').click(function (e) {

    e.preventDefault();

    var form   = $('#form-submit');
    var action = $('#form-submit').attr('action');
    var button = $(this);

    button.addClass('btn-success').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Guardando...');
    $.post(action,
        form.serialize(),
        function (response) {
            if (response.status) {
                sweetAlert("Yeah!", "Información registrada exitosamente!. Queda atento, pronto te notificaremos el estado de tu visita.", "success");
                button.removeClass('btn-success').html('<i class="fa fa-floppy-o"></i> Guardar');
            } else {
                sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
            }
        }).fail(function (response) {
            button.removeClass('btn-success').html('<i class="fa fa-floppy-o"></i> Guardar');
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function (index, value) {
                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                $('#' + index).focus();
                return false;
            });
        }
    );
});
