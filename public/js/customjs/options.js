$(function(){
  $(document).ready(function() {
    getOptions();
  });
});

function getOptions(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var table= $('#optionstable').DataTable( {
        "processing": true,
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
        "pageLength": 10,
        // dom: 'Blfrtip',
        // buttons: [
        //     'csv', 'excel', 'pdf', 'print'
        // ],
        // "language": {
        //     "processing": "Hang on. Waiting for response... <img src=\"loader.png\" />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        // },
        "serverSide": true,
        "destroy" :true,
        "ajax": {
                    "url": './getOptions',
                    "data": function ( d ) {
                        d.type = $('#type').val();
                        // d.store_code = $('#store_code').val();
                        // d.store_name = $('#store_name').val();
                        // d.plot_no = $('#plot_no').val();
                        // d.mobilenumber = $('#mobilenumber').val();
                        // d.town_id = $('#town_id').val();
                        // d.zone_id = $('#zone_id').val();
                        // d.territorry_id = $('#territorry_id').val();
                        // d.bdo_name = $('#bdo_name').val();
                        // d.bdo_number = $('#bdo_number').val();
                        // d.bdo_name = $('#bdo_name').val();
                        
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "name" },
            { "data": "type" },
            { "data": "id",
              "render": function ( data, type, full, meta ) {
                return "<a href=\"options/"+data+"/edit\"><button class=\"btn btn-success btn\"><i class=\"fa fa-pencil\"></i></button></a>"+
                         "<button onclick=\"deleteDoctor('"+data+"');\" class=\"btn btn-danger btn delete_news\"><i class=\"fa fa-trash-o\"></i></button"
              }
            }
        ]


  });


}



function deleteDoctor(id){

    var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
        $.ajax({
            type: 'get',
            url: '../admin/doctors/delete/'+id,
            data: {
              id : id
            },
            dataType: 'text',
        })
        .done(function (data) {
          
          alert("Successfully deleted.")
          getOptions();
          
        });
    }
}