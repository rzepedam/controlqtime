$('#visit_table').bootstrapTable({
    url: "/sign-in-visits/getVisits",
    columns: [
        {
            formatter : function(value,row,index) {
                if (row.state === 'disable') {
                    var $state = row.id + ' <a href="/sign-in-visits/visits/' + row.id +'" class="tooltip-danger" data-toggle="tooltip" data-original-title="Activar Visita"><i class="fa fa-exclamation-circle text-danger pointer" aria-hidden="true"></i></a>'
                    return $state;
                }else {
                    return row.id;
                }
            }
        }, 
        {
            formatter : function(value,row,index) {
                return row.type_visit.name;
            }
        }, {}, {},
        {
            formatter : function(value,row,index) {
                return  '<a href="/sign-in-visits/visits/' + row.id + '" class="btn btn-squared btn-info btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                        '<a href="/sign-in-visits/visits/' + row.id + '" class="btn btn-squared btn-info btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-search"></i></a> ' +
                        '<a href="/sign-in-visits/visits/' + row.id +'/edit" class="btn btn-squared btn-warning btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/sign-in-visits/visits/' + row.id +'/edit" class="btn btn-squared btn-warning btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-pencil"></i></a> ';
            }
        },
    ],
});
