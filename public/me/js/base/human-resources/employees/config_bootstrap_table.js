$('#employee_table').bootstrapTable({
    url: "/human-resources/getEmployees",
    columns: [
        {
            formatter : function(value,row,index) {
                if (row.state == 'disable') {
                    var $state = row.id + ' <a href="/human-resources/employees/attachFiles/' + row.id +'" class="tooltip-danger" data-toggle="tooltip" data-original-title="Activar Trabajador"><i class="fa fa-exclamation-circle text-danger pointer" aria-hidden="true"></i></a>'
                    return $state;
                }else {
                    return row.id;
                }
            }
            
        }, {}, {},
        {
            formatter : function(value,row,index) {
                return row.company.firm_name;
            }
        },
        {
            formatter : function(value,row,index) {
                if (row.condition == 'available') {
                    var $condition = '<a class="btn btn-squared btn-success waves-effect waves-light btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="' + row.id + '"><i class="fa fa-clock-o" aria-hidden="true"></i></a>';
                }else {
                    var $condition = '<a class="btn btn-squared btn-success waves-effect waves-light disabled btnStartDailyAssistance tooltip-success" data-toggle="tooltip" data-original-title="Iniciar Asistencia Diaria" data-id="' + row.id +'"><i class="fa fa-clock-o" aria-hidden="true"></i></a>';
                }

                return '<a href="/human-resources/employees/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                    '<a href="/human-resources/employees/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                    '<a href="/human-resources/employees/attachFiles/' + row.id + '" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a> ' +
                    $condition;
            }
        }
    ],
});
