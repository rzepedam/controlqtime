



    $("input[name=disability]:radio").change(function () {

        var selected = $('input:radio[name=disability]:checked').val();

        if (selected == 'si') {
            var html =

                "<div class='col-md-3'>" +
                "<label for='hello'>Hola</label>" +
                "{!! Form::select('disability_id', $disabilities, null, ['class' => 'form-control']) !!}" +
                "</div><div class='col-md-2'>" +
                "</div><div class='col-md-3 text-center'>" +
                "{!! Form::label('treatment', 'Está en tratamiento ?') !!}<br>" +
                "{!! Form::label('si', 'Si') !!}" +
                "{!! Form::radio('treatment', 'Si', false) !!}" +
                "{!! Form::label('no', 'No') !!}" +
                "{!! Form::radio('treatment', 'No', true) !!}" +
                "</div><div class='col-md-4'></div>" +
                "<div class='col-md-12'>" +
                "{!! Form::label('details', 'Detalle') !!}" +
                "{!! Form::textarea('details', null, ['class' => 'form-control', 'rows' => '5']) !!}" +
                "</div>";

            $('#disabilities').html(html);

        }else {

        }

    });
