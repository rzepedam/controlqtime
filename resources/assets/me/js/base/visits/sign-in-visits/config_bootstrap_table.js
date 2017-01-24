$('#sign_in_visit_table').bootstrapTable({
    url: "/visits/getSignInVisits",
    columns: [
        {}, {}, {}, {},
        {
            formatter : function(value,row,index) {
                return  '<a href="/visits/sign-in-visits/' + row.id + '" class="btn btn-squared btn-info btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a> ' +
                        '<a href="/visits/sign-in-visits/' + row.id + '" class="btn btn-squared btn-info btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-search"></i></a> ' +
                        '<a href="/visits/sign-in-visits/' + row.id +'/edit" class="btn btn-squared btn-warning btn-sm waves-effect waves-light hidden-xs hidden-sm tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a> ' +
                        '<a href="/visits/sign-in-visits/' + row.id +'/edit" class="btn btn-squared btn-warning btn-xs waves-effect waves-light hidden-md hidden-lg"><i class="fa fa-pencil"></i></a> ';
            }
        },
    ],
});
