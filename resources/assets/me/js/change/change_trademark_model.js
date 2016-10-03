$(document).on('change', '#trademark_id', function () {
    $.post('/loadModelVehicles',
        { id: $('#trademark_id').val() },
        function(data) {
            $('#model_vehicle_id').empty();
            $.each(data, function(key, element) {
                $('#model_vehicle_id').append("<option value='" + key + "'>" + element + "</option>");
            });
        }
    );
});
