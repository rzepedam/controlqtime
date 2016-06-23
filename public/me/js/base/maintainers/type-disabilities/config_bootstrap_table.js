$('#type_disability_table').bootstrapTable({
    url: "/maintainers/getTypeDisabilities",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/type-disabilities/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>';
            }
        }
    ],
});
