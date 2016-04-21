@if (Session::has('success'))

    <script>
        $(document).ready(function() {

            toastr.info(
                '{!! Session::get('success') !!}',
                '',
                {
                    "closeButton": true,
                    "progressBar": true,
                }
            );

        });
    </script>

@endif

