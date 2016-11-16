$('#modalSessionConfirmation').on("click", function (event) {

    event.preventDefault();

    swal({
            title: "Continuar con registro de usuario?",
            text: "Existen datos en sesión asociados a un trabajador que no ha sido registrado. Si confirma, estos datos se cargarán en el formulario. De lo contrario, se presentará un formulario nuevo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'Continuar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false,
            html: true
        },
        function (isConfirm) {
            if (isConfirm) {
                $('.confirm').html('<i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i>');
                window.location.href = '/human-resources/employees/create';
            } else {
                $.ajax({
                    url: 'employees/session/destroySessionStoreEmployee',
                    type: "GET"
                }).done(function () {
                    window.location.href = 'employees/create';
                });
            }
        }
    );
});
