@if (Session::has('success'))

    <script>
        $(document).ready(function() {
            toastr.success(
                '{!! Session::get('success') !!}',
                '',
                {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "2500",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            );

        });
    </script>

@endif

