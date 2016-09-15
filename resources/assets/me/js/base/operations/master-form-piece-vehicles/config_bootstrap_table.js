$('#master_form_piece_vehicle_table').bootstrapTable({
    url: "/operations/getMasterFormPieceVehicles",
    columns: [
        {}, {},
        {
            formatter : function(value, row) {
                return  '<a href="/operations/master-form-piece-vehicles/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
