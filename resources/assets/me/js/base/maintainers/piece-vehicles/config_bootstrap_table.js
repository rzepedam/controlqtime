$('#piece_vehicle_table').bootstrapTable({
    url: "/maintainers/getPieceVehicles",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/piece-vehicles/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
