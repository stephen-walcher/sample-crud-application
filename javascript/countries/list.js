$(function() {
    $('table').DataTable({
        "order": [ 0, 'asc' ],
        "columnDefs": [
            {
                "class": 'text-center',
                "targets": [1,2,3,4]
            },{
                "sortable": false,
                "targets": 4
            }
        ]
    });
    
    $('a.link-delete').click(function(evt) {
        return confirm('Are you sure you want to delete this record?');
    });
});