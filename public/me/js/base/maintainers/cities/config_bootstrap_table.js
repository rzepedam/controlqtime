$('#city_table').bootstrapTable({
    url: "/maintainers/getCities",
    columns: [
        {}, {},
        {
            formatter : function(value,row,index) {
                return row.country.name;
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/cities/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>';
            }
        }
    ],
});
