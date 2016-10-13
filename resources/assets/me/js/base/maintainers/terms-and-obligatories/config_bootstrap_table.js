$('#terms_and_obligatory_table').bootstrapTable({
    url: "/maintainers/getTermsAndObligatories",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                if (row.act)
                    return '<i class="fa fa-check-circle font-size-18 text-success"></i>';
                else
                    return '<i class="fa fa-times-circle font-size-18 text-danger"></i>';
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/terms-and-obligatories/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
