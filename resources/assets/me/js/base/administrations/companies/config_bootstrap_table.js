$('#company_table').bootstrapTable({
    url: "/administration/getCompanies",
    columns: [
        {
            formatter : function(value,row,index) {
                if (row.state == 'disable') {
                    var $state = row.id + ' <a href="/administration/companies/attachFiles/' + row.id +'" class="tooltip-danger" data-toggle="tooltip" data-original-title="Activar Empresa"><i class="fa fa-exclamation-circle text-danger pointer" aria-hidden="true"></i></a>'
                    return $state;
                }else {
                    return row.id;
                }
            }

        }, {}, {},
        {
            formatter : function(value,row,index) {
                return  '<a href="/administration/companies/' + row.id + '" class="btn btn-squared btn-info btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                        '<a href="/administration/companies/' + row.id + '" class="btn btn-squared btn-info btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-search"></i></a> ' +
                        '<a href="/administration/companies/' + row.id +'/edit" class="btn btn-squared btn-warning btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/administration/companies/' + row.id +'/edit" class="btn btn-squared btn-warning btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/administration/companies/attachFiles/' + row.id + '" class="btn btn-squared btn-primary btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a>' +
                        '<a href="/administration/companies/attachFiles/' + row.id + '" class="btn btn-squared btn-primary btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-cloud-upload"></i></a>';
            }
        }
    ],
});
