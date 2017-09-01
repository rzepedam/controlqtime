$('#visit_table').bootstrapTable({
    url: "/sign-in-visits/getVisits",
    columns: [
        {}, 
        {
            formatter : function(value,row,index) {
                return row.type_visit.name;
            }
        }, {}, {},
        {
            formatter : function(value,row,index) {
                if (! row.state) {
                    return '<span class="label label-round label-dark">En proceso</span>';
                }

                if (row.state === 'pending') {
                    return '<span class="label label-round label-warning">Pendiente</span>';
                }

                if (row.state === 'approved') {
                    return '<span class="label label-round label-success">Aprobado</span>';
                }

                if (row.state === 'denied') {
                    return '<span class="label label-round label-danger">Denegado</span>';        
                }
            }
        },
        {
            formatter : function(value,row,index) {
                return  '<a href="/sign-in-visits/visits/' + row.id + '"><i class="fa fa-search text-info" aria-hidden="true"></i></a>&nbsp ' +
                        '<a href="/sign-in-visits/visits/' + row.id +'/edit"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></a>&nbsp ';
            }
        },
    ],
});
