$(document).ready(function(){

    $('#type_vehicle_id').on('')

    $('#btnSubmit').click(function(e) {

        e.preventDefault();

        var form    = $('#form-submit');
        var action  = $('#form-submit').attr('action');
        var button  = $(this);

        sanitizedDecimalNumberFields();
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
});
