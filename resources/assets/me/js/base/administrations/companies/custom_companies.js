$(document).ready(function () {

    $('#btnSubmit').click(function (e) {

        e.preventDefault();

        var form      = $('#form-submit');
        var action    = $('#form-submit').attr('action');
        var button    = $(this);
        var full_name = '';

        if ($('#second_name').val() === '') {
            full_name = capitalize($.trim($('#first_name').val())) + " " + capitalize($.trim($('#male_surname').val())) + " " + capitalize($.trim($('#female_surname').val()));
        } else {
            full_name = capitalize($.trim($('#first_name').val())) + " " + capitalize($.trim($('#second_name').val())) + " " + capitalize($.trim($('#male_surname').val())) + " " + capitalize($.trim($('#female_surname').val()));
        }

        button.addClass('btn-success').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Guardando...');
        $.ajax({
            type: 'POST',
            url: action,
            data: form.serialize() + "&full_name=" + full_name,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    window.location.href = response.url;
                } else {
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

