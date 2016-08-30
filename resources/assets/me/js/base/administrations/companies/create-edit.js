$(document).ready(function(){

    $('#btnSubmit').click(function(e) {

        e.preventDefault();

        var formCompany = $('#form-company');
        var action      = $('#form-company').attr('action');
        var button      = $(this);

        button.html('<i class="fa fa-refresh fa-spin fa-fw"></i>').css({ width: '122px' });
        $.post( action,
            formCompany.serialize(),
            function(response) {
                if (response.success) {
                    window.location.href = response.url;
                }
            }).fail(function(response) {
                button.html('<i class="fa fa-floppy-o"></i> Guardar');
                var errors = $.parseJSON(response.responseText);
                $.each(errors, function (index, value) {
                    $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                    $('#' + index).focus();
                    return false;
                });
            }
        );
    });
});