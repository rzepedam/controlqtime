$('#type_vehicle_table').bootstrapTable({
    url: "/maintainers/getTypeVehicles",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.weight.acr;
            }
        },
        {
            formatter : function(value,row,index) {
                return row.engine_cubic.acr;
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/type-vehicles/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
