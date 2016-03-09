$(document).ready(function(){

    var id;
    var form;

    $('.btn-delete').click(function(e){
        e.preventDefault();
        id   = $(this).data('id');
        form = $('#form-delete');
        $("#id_delete").text('Confirma eliminar el registro con ID: ' + id + '?');
    });

    $('.btn-eliminar').click(function(){
        form.submit();
    });
});
