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
                    "url": '../admin/showRegDentalCamp',
                    "data": function ( d ) {
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "reg_name" },
            { "data": "reg_email" },
            { "data": "reg_phone" },
            { "data": "reg_type" },
            { "data": "reg_info" },
            { "data": "id",
              "render": function ( data, type, full, meta ) {
                return "<a href=\"editdentalcamp/"+data+"\"><button class=\"btn btn-success btn\"><i class=\"fa fa-pencil\"></i></button></a>"+
                         "<button onclick=\"deletedentalcamp('"+data+"');\" class=\"btn btn-danger btn delete_news\"><i class=\"fa fa-trash-o\"></i></button"
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
            url: './deletedentalcamp/'+id,
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