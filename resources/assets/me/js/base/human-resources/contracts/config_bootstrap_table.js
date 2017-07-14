$('#contract_table').bootstrapTable({
    url: "/human-resources/getContracts",
    columns: [
        {
            formatter : function(value, row) {
                return row.employee.full_name;
            }
        },
        {
            formatter : function(value, row) {
                return row.company.firm_name;
            }
        },
        {},
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/contracts/' + row.id + '" class="waves-effect waves-light" data-toggle="tooltip" data-original-title="Detalle"><i class="fa fa-search text-info"></i></a>&nbsp ' +
                        '<a href="/human-resources/contracts/getPdf/' + row.id + '" target="_blank" class="waves-effect waves-light" data-toggle="tooltip" data-original-title="Generar PDF"><i class="fa fa-file-pdf-o text-danger"></i></a>&nbsp ';
            }
        }
    ],
});
