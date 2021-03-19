$(function(){
  $(document).ready(function() {
    getSearch();
  });
});
function getSearch(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table= $('#doctorstable').DataTable( {
        "processing": true,
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
        "pageLength": 10,
        "serverSide": true,
        "destroy" :true,
        "ajax": {
                    "url": '../admin/showsearch',
                    "data": function ( d ) {
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "location" },
            { "data": "name" },
            { "data": "chamber_name" },
            { "data": "department" },
            { "data": "latitude" },
            { "data": "longitude" }

        ]
  });
}