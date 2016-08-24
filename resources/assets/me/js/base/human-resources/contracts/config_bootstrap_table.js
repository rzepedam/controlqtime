$('#contract_table').bootstrapTable({
    url: "/human-resources/getContracts",
    columns: [
        {},
        {
            formatter : function(value, row) {
                return row.employee.full_name;
            }
        },
        {
            formatter : function(value, row) {
                return row.company.firm_name;
            }
        }, {},
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/contracts/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                        '<a href="/human-resources/contracts/' + row.id + '" class="btn btn-squared btn-danger waves-effect waves-light tooltip-danger" data-toggle="tooltip" data-original-title="Generar PDF"><i class="fa fa-file-pdf-o"></i></a> ';
            }
        }
    ],
});
