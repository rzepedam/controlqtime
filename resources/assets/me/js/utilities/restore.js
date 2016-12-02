$(document).on('focusout', '.find-for-restore', function () {

    var name   = $(this).val().trim().split('.').join('');
    var path   = window.location.pathname.split("/").splice(0, 3).join("/");

    $.ajax({
        type: "GET",
        url: path + "/find-data-for-restore",
        data: {name: name},
        success: function (response) {
            if (response.success) {
                swal({
                    title: "Desea restaurar registro ?",
                    text: "Existe información asociada a este registro en nuestra base de datos.",
                    type: "info",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    confirmButtonText: 'Sí, restáuralo',
                    cancelButtonText: 'No, no quiero',
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.post(path + "/restore",
                            {name: name},
                            function (response) {
                                if (response.success) {
                                    swal({
                                        title: "Correcto!",
                                        text: "El registro fue restituido exitosamente!",
                                        type: "success"
                                    }, function (isConfirm) {
                                        if (isConfirm) {
                                            window.location.href = path;
                                        }
                                    });
                                }
                            }
                        );
                    }
                })
            }
        }
    }).error(function () {
        swal("Oops", "Ha ocurrido un error. No es posible conectar con el servidor.", "error");
    });
});
