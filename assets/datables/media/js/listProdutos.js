$(document).ready(function(){
    $('#myTable').DataTable({
        "aaSorting":[[3,"asc"]],
        "bPaginate": true,
        "bFilter": true,
        "sType": "Produtos",
        "aoColumns": [
            []
        ]
    });
});