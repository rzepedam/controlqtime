$('#model_vehicle_table').bootstrapTable({
    url: "/maintainers/getModelVehicles",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.trademark.name;
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/model-vehicles/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
