$('#marital_status_table').bootstrapTable({
    url: "/maintainers/getMaritalStatuses",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/marital-statuses/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        }
    ],
});
