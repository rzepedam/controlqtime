$('#route_table').bootstrapTable({
    url: "/maintainers/getRoutes",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.terminal.name;
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/routes/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
