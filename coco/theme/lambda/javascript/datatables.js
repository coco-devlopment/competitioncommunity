require(['core/first'], function() {
    require(['tool_datatables/init'], function(dt) {
        selector = '#page-admin-report-customsql-index .generaltable, #page-admin-report-customsql-view .generaltable';
        dt.init(selector, {});
    });
});