$('#type_company_table').bootstrapTable({
    url: "/maintainers/getTypeCompanies",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/type-companies/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>';
            }
        }
    ],
});
