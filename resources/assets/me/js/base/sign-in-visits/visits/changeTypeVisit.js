$(document).ready(function() {
    
    $('#type_visit_id').on('change', function() {

        if ( $(this).val() == 1 || $(this).val() == 5 )
        {
            $('#span_date').html('<div class="col-xs-12 col-sm-3 col-md-3 form-group"><label for="date" class="control-label">Fecha Visita</label><div class="input-group date"><input type="text" name="date" class="form-control text-center" value="' + moment().add(1, 'days').format('DD-MM-YYYY') + '" readonly="readonly"><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div></div><div class="col-xs-12 col-sm-3 col-md-3 form-group"><label for="hour" class="control-label">Hora</label><div class="input-group hour"><input type="text" name="hour" class="form-control text-center" readonly="readonly"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div>');
        } else {
            $('#span_date').html('<div class="col-xs-12 col-sm-3 col-md-3 form-group"><label for="start_date" class="control-label">Fecha Inicio Visita</label><div class="input-group date"><input type="text" name="start_date" class="form-control text-center" value="' + moment().add(1, 'days').format('DD-MM-YYYY') + '" readonly="readonly"><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div></div><div class="col-xs-12 col-sm-3 col-md-3 form-group"><label for="end_date" class="control-label">Fecha Fin Visita</label><div class="input-group date"><input type="text" name="end_date" class="form-control text-center" value="' + moment().add(1, 'days').format('DD-MM-YYYY') + '" readonly="readonly"><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div></div>');
        }

        $('.input-group.date').datepicker({
            autoclose: true,
            language: 'es',
            format: 'dd-mm-yyyy',
            orientation: "bottom",
            startDate: moment().add(1, 'days').format('DD-MM-YYYY'),
            todayBtn: true,
            todayHighlight: true
        });

        $('.hour').clockpicker({
            autoclose: true
        });
    });
});