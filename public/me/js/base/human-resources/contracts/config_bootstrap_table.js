$('#contract_table').bootstrapTable({
    url: "/human-resources/getContracts",
    columns: [
        {}, {}, {}, {},
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/contracts/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a>'
            }
        }
    ],
});
