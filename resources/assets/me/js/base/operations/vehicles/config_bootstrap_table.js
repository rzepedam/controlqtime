$('#vehicle_table').bootstrapTable({
    url: "/operations/getVehicles",
    columns: [
        {
            formatter : function(value,row,index) {
                if (row.state == 'disable') {
                    var $state = row.id + ' <a href="/operations/vehicles/attachFiles/' + row.id +'" class="tooltip-danger" data-toggle="tooltip" data-original-title="Activar Vehículo"><i class="fa fa-exclamation-circle text-danger pointer" aria-hidden="true"></i></a>'
                    return $state;
                }else {
                    return row.id;
                }
            }

        }, {},
        {
            formatter : function(value, row, index) {
                return row.type_vehicle.name;
            }
        },
        {
            formatter : function(value, row, index) {
                return row.model_vehicle.name;
            }
        },
        {
            formatter : function(value, row, index) {
                return '<a href="/operations/vehicles/' + row.id + '"><i class="fa fa-search text-info" aria-hidden="true"></i></a>&nbsp ' +
                    '<a href="/operations/vehicles/' + row.id +'/edit"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></a>&nbsp ' +
                    '<a href="/operations/vehicles/attachFiles/' + row.id + '"><i class="fa fa-cloud-upload text-primary" aria-hidden="true"></i></a>&nbsp ';
            }
        }
    ],
});
