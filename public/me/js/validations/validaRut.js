/**
 * Created by Raul on 11-03-2016.
 */

$(document).on('blur', '.check_rut', function(input) {

    var element = $('#' + $(this).attr('id'));
    
    element.Rut({
        on_success: function(){
            element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        },

        on_error: function(){
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