/**
 * Created by Raul on 11-03-2016.
 */

$(document).on('blur', '.check_rut', function(input) {

    var element = $('#' + $(this).attr('id'));

    element.Rut({
        on_success: function(){
            element.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
            element.closest('.form-group').find('i.fa-times').remove();
            element.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
        },

        on_error: function(){
            element.closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            element.closest('.form-group').find('i.fa-check').remove();
            element.closest('.form-group').append('<i class="fa fa-times fa-lg form-control-feedback"></i>');
        }
    });
});