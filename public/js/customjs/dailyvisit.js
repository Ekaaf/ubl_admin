var url = (window.location.pathname).split('/');
$(function(){
  $(document).ready(function() {
    getDailyvisit();
  });
});

function getDailyvisit(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var table= $('#dailyvisittable').DataTable( {
        "processing": true,
        "lengthMenu": [ [5, 10, 25, 50, -1], [5 ,10, 25, 50, "All"] ],
        "pageLength": 10,
        dom: 'Blfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        // "language": {
        //     "processing": "Hang on. Waiting for response... <img src=\"loader.png\" />" //add a loading image,simply putting <img src="loader.gif" /> tag.
        // },
        "serverSide": true,
        "destroy" :true,
        "ajax": {
                    "url": './getDailyvisit',
                    "data": function ( d ) {
                        d.date = $('#date').val();
                        d.email = $('#email').val();
                        d.bdo_id = $('#bdo_id').val();
                        d.dentist_name = $('#dentist_name').val();
                        d.chamber = $('#chamber').val();
                        d.chamber_address = $('#chamber_address').val();
                        d.zone_id = $('#zone_id').val();
                        d.territorry_id = $('#territorry_id').val();
                        // d.bdo_name = $('#bdo_name').val();
                        
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "timestamp" },
            { "data": "date" },
            { "data": "email" },
            { "data": "visit_status" },
            { "data": "bdoName" },
            { "data": "visit_type" },
            { "data": "visit_cycle" },
            { "data": "sample" },
            { "data": "special_comp" },
            { "data": "sample_quantity" },
            { "data": "doctor_name" },
            { "data": "grade" },
            { "data": "doctor_chamber" },
            { "data": "doctor_chamber_address" },
            { "data": "gps_coordinates",
              "render": function ( data, type, full, meta ) {
                return '<a href="https://maps.google.com/?q='+data+'" target="_blank">'+data+'</a>';
              }
            },
            { "data": "photo_link",
              "render": function ( data, type, full, meta ) {
                  return "<a href=\"javascript:void(0);\" onclick=\"showImage('https://dcptracker.com/uniliver_laravel/"+data+"');\"><img src=\"http://dcptracker.com/uniliver_laravel/"+data+"\" style=\"max-width:150px;\"></a>";
                  
              }
            },
            { "data": "number_prescription" },
            { "data": "product_benifit" },
            { "data": "question" },
            { "data": "feedback_photocode" },
            { "data": "zone" },
            { "data": "territorry" },

            { "data": "id",
              "render": function ( data, type, full, meta ) {
                return "<a href=\"dailyvisit/"+data+"/edit\"><button class=\"btn btn-success btn\"><i class=\"fa fa-pencil\"></i></button></a>"+
                         "<button onclick=\"deletedailyvisit('"+data+"');\" class=\"btn btn-danger btn delete_news\"><i class=\"fa fa-trash-o\"></i></button"
              }
            }
        ]


  });


}


function deletedailyvisit(id){

  var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
        $.ajax({
            type: 'GET',
            url: '../'+url[2]+'/dailyvisit/delete/'+id,
            data: {
              id : id
            },
            dataType: 'text',
        })
        .done(function (data) {
          
          swal("Deleted!", data, "success");
          getDailyvisit();
          
        });

    }

  
  
}