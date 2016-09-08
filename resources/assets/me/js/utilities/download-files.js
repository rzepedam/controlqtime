$('.download-file').click(function(){
    
    var file = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var form = $('#form-download').append('<input type="hidden" name="file" value=' + file + ' />' +
        '<input type="hidden" name="name" value=' + name + ' />');

    form.submit();

});


