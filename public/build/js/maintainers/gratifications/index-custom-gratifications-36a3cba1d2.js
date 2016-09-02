$('#gratification_table').bootstrapTable({
    url: "/maintainers/getGratifications",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/gratifications/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
