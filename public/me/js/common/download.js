$('.download-file').click(function(){

    var file = $(this).attr('data-id');
    var form = $('#form-download').append('<input type="hidden" name="file" value=' + file + ' />');
    form.submit();

});


