var url = (window.location.pathname).split('/');
$(function(){
  $(document).ready(function() {
    getstores();
  });
});

function getstores(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var table= $('#storetable').DataTable( {
        "processing": true,
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
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
                    "url": './getstorelist',
                    "data": function ( d ) {
                        d.date = $('#date').val();
                        d.store_code = $('#store_code').val();
                        d.store_name = $('#store_name').val();
                        d.plot_no = $('#plot_no').val();
                        d.mobilenumber = $('#mobilenumber').val();
                        d.town_id = $('#town_id').val();
                        d.zone_id = $('#zone_id').val();
                        d.territorry_id = $('#territorry_id').val();
                        d.bdo_name = $('#bdo_name').val();
                        
                    },
                },
        "columns": [
            { "data": "0" },
            { "data": "timestamp" },
            { "data": "date" },
            { "data": "store_code" },
            { "data": "store_name" },

            { "data": "plot_no" },
            { "data": "mobilenumber" },
            { "data": "town" },
            { "data": "photo_link",
              "render": function ( data, type, full, meta ) {
                  return "<a href=\"javascript:void(0);\" onclick=\"showImage('https://dcptracker.com/uniliver_laravel/"+data+"');\"><img src=\"http://dcptracker.com/uniliver_laravel/"+data+"\" style=\"max-width:150px;\"></a>";
                  
              }
            },
            // { "data": "gps_coordinates" },
            { "data": "gps_coordinates",
              "render": function ( data, type, full, meta ) {
                  return '<a href="https://maps.google.com/?q='+data+'" target="_blank">'+data+'</a>';
                  
              }
            },
            { "data": "zone" },
            { "data": "territorry" },


            { "data": "bdo_name" },
            { "data": "id",
              "render": function ( data, type, full, meta ) {
                return "<a href=\"store/"+data+"/edit\"><button class=\"btn btn-success btn\"><i class=\"fa fa-pencil\"></i></button></a>"+
                         "<button onclick=\"deleteStore('"+data+"');\" class=\"btn btn-danger btn delete_news\"><i class=\"fa fa-trash-o\"></i></button"
              }
            }
        ]


  });


}



function deleteStore(id){

    var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
        $.ajax({
            type: 'get',
            url: '../'+url[2]+'/store/delete/'+id,
            data: {
              id : id
            },
            dataType: 'text',
        })
        .done(function (data) {
          
          alert("Successfully deleted.")
          getstores();
          
        });
    }
}

