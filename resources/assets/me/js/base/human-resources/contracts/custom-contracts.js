$(document).ready(function(){

    $('#btnSubmit').click(function(e) {

        e.preventDefault();

        var form    = $('#form-submit');
        var action  = $('#form-submit').attr('action');

        sanitizedMoneyFields();
        $('#btnSubmit').addClass('btn-success');
        $('#btnSubmit').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Guardando...');

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
