var url = (window.location.pathname).split('/');
if(window.location.host=="localhost"){
  url = "/uniliver_admin/"+url[2]+"/";
}
else{
  url = "/admin/"+url[2]+"/";
}
$(function(){
  $(document).ready(function() {

  });
});



function getTerritorries(){
  var zone_id = $("#dcp_zone").val();
  $.ajax({
    type: 'GET',
    url: url+"getTerritorries",
    data: {
    id : zone_id
  },
    dataType: 'json',
  })
  .done(function (data) {
    $("#dcp_territory").empty();
    $("#dcp_territory").append('<option value="">Select</option>')
    $.each(data, function(index, item) {
        $("#dcp_territory").append('<option value="'+item.id+'">'+item.name+'</option>')
    });

  });
}



function getTowns(){
  var zone_id = $("#dcp_zone").val();
  $.ajax({
    type: 'GET',
    url: '../../getTowns',
    data: {
    id : zone_id
  },
    dataType: 'json',
  })
  .done(function (data) {
    $("#town_id").empty();
    $("#town_id").append('<option value="">Select</option>')
    $.each(data, function(index, item) {
        $("#town_id").append('<option value="'+item.id+'">'+item.name+'</option>')
    });

  });
}


function getStores(){
  var zone_id = $("#dcp_zone").val();
  var territorry_id = $("#dcp_territory").val();
  var town_id = $("#town_id").val();
  $.ajax({
    type: 'GET',
    url: '../../getStores',
    data: {
    zone_id : zone_id,
    territorry_id : territorry_id,
    town_id : town_id
  },
    dataType: 'json',
  })
  .done(function (data) {
    $("#store_id").empty();
    $("#store_id").append('<option value="">Select</option>')
    $.each(data, function(index, item) {
        $("#store_id").append('<option value="'+item.id+'">'+item.store_name+'</option>')
    });

  });
}

function getDoctorInfo(){
  var dentist_name = $("#dentist_name").val();
  $.ajax({
    type: 'GET',
    url: url+"getDoctorInfo",
    data: {
    id : dentist_name
  },
    dataType: 'json',
  })
  .done(function (data) {
    $("#dentist_grade").val(data.dentist_grade);
    $("#chamber").val(data.chamber);
    $("#chamber_address").val(data.chamber_address)

  });
}

