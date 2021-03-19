$(function(){
  $(document).ready(function() {
    getUsers();
  });
});
function getUsers(){
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
                    "url": '../admin/showsamplecollection',
                    "data": function ( d ) {
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "username" },
            { "data": "address" },
            { "data": "email" },
            { "data": "phone_number" },
            { "data": "id",
              "render": function ( data, type, full, meta ) {
                return "<a href=\"editusers/"+data+"\"><button class=\"btn btn-success btn\"><i class=\"fa fa-pencil\"></i></button></a>"+
                         "<button onclick=\"deleteusers('"+data+"');\" class=\"btn btn-danger btn delete_news\"><i class=\"fa fa-trash-o\"></i></button"
              }
            }
        ]
  });
}

function deleteUsers(id){
    var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
        $.ajax({
            type: 'get',
            url: './deleteusers/'+id,
            // data: {
            //   id : id
            // },
            dataType: 'text',
        })
        .done(function (data) {
          alert("Successfully deleted.")
          getUsers();
        });
    }
}