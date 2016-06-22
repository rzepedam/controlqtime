$('#company_table').bootstrapTable({
    url: "/administration/getCompanies",
    columns: [
        {}, {}, {},
        {
            formatter : function(value,row,index) {
                return  '<a href="/administration/companies/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                '<a href="/administration/companies/' + row.id +'/edit" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                '<a href="/administration/companies/attachFiles/' + row.id + '" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a>';
            }
        }
    ],
});
