$(document).on('blur', '.check_rut', function () {

    var element = $(this);

    element.Rut({
        on_success: function () {
            element.closest('.form-group').removeClass('has-error has-feedback');
        },

        on_error: function () {
            element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');

            toastr.error(
                'Verifique que el rut ha sido ingresado correctamente',
                'Rut Incorrecto',
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
        }
    });
});

$(document).on('blur', '.format_rut', function () {
    var sRut1      = jQuery.Rut.quitarFormato($(this).val());    // Quitar formato
    var nPos       = 0;     // Guarda el rut invertido con los puntos y el guión agregado
    var sInvertido = "";    // Guarda el resultado final del rut como debe ser
    var sRut       = "";

    for (var i = sRut1.length - 1; i >= 0; i--) {
        sInvertido += sRut1.charAt(i);
        if (i == sRut1.length - 1)
            sInvertido += "-";
        else if (nPos == 3) {
            sInvertido += ".";
            nPos = 0;
        }
        nPos++;
    }
    for (var j = sInvertido.length - 1; j >= 0; j--) {
        if (sInvertido.charAt(sInvertido.length - 1) != ".")
            sRut += sInvertido.charAt(j);
        else if (j != sInvertido.length - 1)
            sRut += sInvertido.charAt(j);
    }

    $(this).val(sRut.toUpperCase());
});

jQuery.Rut = {
    quitarFormato: function(rut)
    {
        var strRut = new String(rut);
        while( strRut.indexOf(".") != -1 )
        {
            strRut = strRut.replace(".","");
        }
        while( strRut.indexOf("-") != -1 )
        {
            strRut = strRut.replace("-","");
        }

        return strRut;
    }
};