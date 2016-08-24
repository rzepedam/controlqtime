$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Created by Raul on 29-02-2016.
 */

function verificaUltimosNumeros(element)
{
    var aux = element.charAt(element.length - 2);

    //Verificamos si penúltimo dígito es letra, si lo es solamente me quedo con último N°
    //Sino, retorno 2 últimos N°s
    if(isNaN(aux) == true){
        num_element = element.charAt(element.length - 1);
    }else{
        var temp    = element.charAt(element.length - 2);
        var temp2   = element.charAt(element.length - 1);
        num_element = temp + temp2;
    }

    return num_element;
}

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


$.fn.changeRegion = function() {

    var num_element = verificaUltimosNumeros($(this).attr('id'));

    $.post('/loadProvinces',
        { id: $(this).val() },
        function(data) {
            $('#province_suc_id' + num_element).empty();
            $('#province_suc_id' + num_element).append("<option value='provincia'>Seleccione Provincia...</option>");
            $('#commune_suc_id' + num_element).empty();
            $('#commune_suc_id' + num_element).append("<option value='comuna'>Seleccione Comuna...</option>");
            $.each(data, function(key, element) {
                $('#province_suc_id' + num_element).append("<option value='" + key + "'>" + element + "</option>");
            });
        }
    );
}


$.fn.changeProvince = function() {

    var num_element = verificaUltimosNumeros($(this).attr('id'));

    if ($(this).val() == 'provincia') {
        $('#commune_suc_id' + num_element).empty();
        $('#commune_suc_id' + num_element).append("<option value='comuna'>Seleccione Comuna...</option>");
    }else {
        $.post('/loadCommunes',
            { id: $(this).val() },
            function(data) {
                $('#commune_suc_id' + num_element).empty();
                $.each(data, function(key, element) {
                    $('#commune_suc_id' + num_element).append("<option value='" + key + "'>" + element + "</option>");
                });
            }
        );
    }
}
