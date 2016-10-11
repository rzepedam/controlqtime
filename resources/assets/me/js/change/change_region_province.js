$('#region_id').change(function(){

    $.post('/loadProvinces',
        { id: $('#region_id').val() },
        function(data) {
            $('#province_id').empty();
            $('#province_id').append("<option value='provincia'>Seleccione Provincia...</option>");
            $('#commune_id').empty();
            $('#commune_id').append("<option value='comuna'>Seleccione Comuna...</option>");
            $.each(data, function(key, element) {
                $('#province_id').append("<option value='" + key + "'>" + element + "</option>");
            });
        }
    );
});


$('#province_id').change(function(){

    if ($('#province_id').val() == 'provincia') {
        $('#commune_id').empty();
        $('#commune_id').append("<option value='comuna'>Seleccione Comuna...</option>");
    }else {
        $.post('/loadCommunes',
            { id: $('#province_id').val() },
            function(data) {
                $('#commune_id').empty();
                $.each(data, function(key, element) {
                    $('#commune_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            }
        );
    }
});

$('#region_legal_id').change(function(){

    $.post('/loadProvinces',
        { id: $('#region_legal_id').val() },
        function(data) {
            $('#province_legal_id').empty();
            $('#province_legal_id').append("<option value='provincia'>Seleccione Provincia...</option>");
            $('#commune_legal_id').empty();
            $('#commune_legal_id').append("<option value='comuna'>Seleccione Comuna...</option>");
            $.each(data, function(key, element) {
                $('#province_legal_id').append("<option value='" + key + "'>" + element + "</option>");
            });
        }
    );
});


$('#province_legal_id').change(function(){

    if ($('#province_legal_id').val() == 'provincia') {
        $('#commune_legal_id').empty();
        $('#commune_legal_id').append("<option value='comuna'>Seleccione Comuna...</option>");
    }else {
        $.post('/loadCommunes',
            { id: $('#province_legal_id').val() },
            function(data) {
                $('#commune_legal_id').empty();
                $.each(data, function(key, element) {
                    $('#commune_legal_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            }
        );
    }
});
