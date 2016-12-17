$(document).on('change', '#name', function () {

    var selected = $(this).find('option:selected').text();

    switch (selected) {
        case 'Plazo Fijo':
            var content = '<div class="row"><div class="col-md-4"> <div class="form-group"><label for="name">Tipo Contrato</label><select class="form-control" id="name" name="name"><option value="Plazo Fijo" selected="selected">Plazo Fijo</option><option value="Indefinido">Indefinido</option></select></div></div><div class="col-md-2"> <div class="form-group"><label for="dur">Nº Meses</label><input class="form-control text-center" data-plugin="maxlength" maxlength="2" name="dur" type="text" id="dur"></div></div></div>';

            break;

        case 'Indefinido':
            var content = '<div class="row"><div class="col-md-4"> <div class="form-group"><label for="name">Tipo Contrato</label><select class="form-control" id="name" name="name"><option value="Plazo Fijo">Plazo Fijo</option><option value="Indefinido" selected="selected">Indefinido</option></select></div></div><div class="col-md-2 hide"> <div class="form-group"><label for="dur">Nº Meses</label><input class="form-control text-center" name="dur" type="text" id="dur" value="0" readonly></div></div></div>';

            break;
    }

    $('.content_info_type_contract').html(content);
    $('#dur').maxlength({
        placement: 'bottom-right-inside',
        threshold: 20
    });
});

$('#btnSubmit').click(function (e) {

    e.preventDefault();

    var form   = $('#form-submit');
    var action = $('#form-submit').attr('action');
    var button = $(this);

    if ($('#name').val() == 'Indefinido') {
        var full_name = 'Indefinido';
    } else {
        var full_name = ($('#dur').val() == 1) ? capitalize($('#name').val()) + " " + $('#dur').val() + " mes" : capitalize($('#name').val()) + " " + $('#dur').val() + " meses";
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