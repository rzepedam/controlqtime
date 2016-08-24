$('#terminal_table').bootstrapTable({
    url: "/maintainers/getTerminals",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.commune.name;
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="javascript:void(0)" class="btn btn-squared btn-info waves-effect waves-light tooltip-danger" data-toggle="tooltip" data-original-title="Ubicación"><i class="fa fa-map-pin"></i></a> ' +
                    '<a href="/maintainers/terminals/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
