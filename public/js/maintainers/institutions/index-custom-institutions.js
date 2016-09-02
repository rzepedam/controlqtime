$('#institution_table').bootstrapTable({
    url: "/maintainers/getInstitutions",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.type_institution.name;
            }
        },
        {
            formatter : function(value,row,index) {
                return  '<a href="/maintainers/institutions/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
