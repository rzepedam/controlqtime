$('#modalSessionConfirmation').on("click", function (event) {

    event.preventDefault();

    swal({
            title: "Continuar con registro de usuario?",
            text: "Existen datos en sesión asociados a un trabajador que no ha sido registrado. Si confirma, estos datos se cargarán en el formulario. De lo contrario, se presentará un formulario nuevo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: "Datos Cargados!",
                    text: "Puede continuar con el formulario.",
                    type: "success"
                }, function () {
                    window.location.href = '/human-resources/employees/create';
                });
            }else {
                $.ajax({
                    url: 'employees/session/destroySessionStoreEmployee',
                    type: "GET"
                }).done(function () {
                    swal({
                        title: "Datos eliminados satisfactoriamente",
                        text: "Puede continuar con el ingreso de un nuevo Trabajador",
                        type: "success"
                    }, function () {
                        window.location.href = 'employees/create';
                    });
                });
            }
        }
    );
});
