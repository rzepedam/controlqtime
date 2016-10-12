$('#type_contract_table').bootstrapTable({
    url: "/maintainers/getTypeContracts",
    columns: [
        {},
        {},
        {
            formatter : function(value,row,index) {
                if (row.dur == 1)
                    return row.dur + ' mes';

                if (row.dur == 0)
                    return '-';
                return row.dur + ' meses';
            }
        },
        {
            formatter : function(value,row,index) {
                return '<a href="/maintainers/type-contracts/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>';
            }
        }
    ],
});
