$('#daily_assistance_table').bootstrapTable({
    url: "/human-resources/getDailyAssistances",
    columns: [
        {}, {}, {}, {},
        {
            formatter : function(value, row) {
                return  '<a href="/human-resources/employees/' + row.id + '" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search" aria-hidden="true"></i></a>'
            }
        }
    ],
});
