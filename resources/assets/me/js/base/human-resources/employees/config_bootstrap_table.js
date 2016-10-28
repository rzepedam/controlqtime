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
            formatter : function(value, row) {
                return row.nationality.name;
            }
        },
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/employees/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light hidden-xs hidden-sm tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                        '<a href="/human-resources/employees/' + row.id + '" class="btn btn-squared btn-info btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-search"></i></a> ' +
                        '<a href="/human-resources/employees/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light hidden-xs hidden-sm tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/human-resources/employees/' + row.id +'/edit" class="btn btn-squared btn-warning btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/human-resources/employees/attachFiles/' + row.id + '" class="btn btn-squared btn-primary waves-effect waves-light hidden-xs hidden-sm tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a> ' +
                        '<a href="/human-resources/employees/attachFiles/' + row.id + '" class="btn btn-squared btn-primary btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-cloud-upload"></i></a>';
            }
        }
    ],
});
