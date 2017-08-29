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
        }, {}, {}, {},
        {
            formatter : function(value, row, index) {
                return row.address.phone1;
            }
        },
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/employees/' + row.id + '"><i class="fa fa-search text-info" aria-hidden="true"></i></a>&nbsp ' +
                        '<a href="/human-resources/employees/' + row.id +'/edit"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></a>&nbsp ' +
                        '<a href="/human-resources/employees/attachFiles/' + row.id + '"><i class="fa fa-cloud-upload text-primary" aria-hidden="true"></i></a>&nbsp ';
            }
        }
    ],
});
