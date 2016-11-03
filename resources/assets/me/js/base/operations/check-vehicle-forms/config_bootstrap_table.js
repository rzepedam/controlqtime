$('#check_vehicle_form_table').bootstrapTable({
    url: "/operations/getCheckVehicleForms",
    columns: [
        {},
        {
            formatter : function(value, row) {
                return row.user.employee.full_name;
            }
        },
        {
            formatter : function(value, row) {
                return row.vehicle.patent;
            }
        }, {},
        {
            formatter : function(value, row) {
                return '<a href="/operations/check-vehicle-forms/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                    '<a href="/operations/check-vehicle-forms/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
