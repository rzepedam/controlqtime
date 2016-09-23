$('#vehicle_id').change(function() {
    var id = $('#vehicle_id option:selected').val();

    if (id != 'default')
    {
        $.ajax({
            type: 'POST',
            url: '/operations/check-vehicle-forms/loadDetailVehicle',
            data: {id: id},
            dataType: 'json',
            success: function (response) {
                $('.show-detail-vehicle').removeClass('hide');
                $('#trademark_vehicle').text(': ' + response.model_vehicle.trademark.name + ', ' + response.model_vehicle.name + '. Año ' + response.year);
                $('#terminal_name').text(': Pendiente');
                $('#km').text(': ' + response.detail_vehicle.km + ' km.');
            },
            error: function (response) {
                var errors = $.parseJSON(response.responseText);
                $.each(errors, function (index, value) {
                    $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                    $('#' + index).focus();
                    return false;
                });
            }
        })
    }
});