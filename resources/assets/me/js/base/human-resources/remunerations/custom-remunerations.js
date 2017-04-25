$('#employee_id').on('change', function() {

    var employee = $('#employee_id').val();

    $('#content-detail-remuneration').html('<br /><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-primary"></i><br /><br />').addClass('text-center');
    $.post('/human-resources/remunerations/loadDataForEmployeeSelected',
        {employee: employee},
        function(response) {
            var employee = response.employee;

            $('#content-detail-remuneration').html('' +
                '<div class="col-xs-12 col-sm-6 col-md-6">Rut: ' + employee.rut +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Días Trabajados: ' + response.daysWorked +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Área: ' + employee.contract.area.name +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Días Atrasos: ' + response.daysDelays +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Cargo: ' + employee.contract.position.name +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Días Inasistencia: ' + response.daysNonAssistance +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Fecha Ingreso: ' + employee.contract.created_at +
                '</div><div class="col-xs-12 col-sm-6 col-md-6">Horas Extras: ' + response.daysExtraHours + '</div>'
            ).removeClass('text-center');

            $('#sueldo_base').text(response.sueldoBase);
            $('#gratification').text(response.gratification);
            $('#valor_total_horas_extra').text(response.valorTotalHorasExtra);
            $('#valor_inasistencia').text(response.valorInasistencia);
            $('#valor_atraso').text(response.valorAtraso);
            $('#total_asistencia_atrasos').text(response.totalAsistenciaAtrasos);
            $('#total_imponible').text(response.totalImponible);
            $('#asignacion_familiar').text(response.asignacionFamiliar);
            $('#mobilization').text(response.mobilization);
            $('#collation').text(response.collation);
            $('#bono_no_imponible').text(response.bonoNoImponible);
            $('#total_haber').text(response.totalHaber);
            $('#total_pension').text(response.totalPension);
            $('#seguro_cesantia').text(response.seguroCesantia);
            $('#total_forecast').text(response.totalForecast);
            $('#descuentos_afectos').text(response.descuentosAfectos);
            $('#base_tributable').text(response.baseTributable);
            $('#valor_impuesto_segunda_categoria').text(response.valorImpuestoSegundaCategoria);
            $('#rebaja_impuesto').text(response.rebajaImpuesto);
            $('#impuesto_unico').text(response.impuestoUnico);
            $('#total_descuentos').text(response.totalDescuentos);
            $('#sueldo_liquido').text(response.sueldoLiquido);
        }
    );
});