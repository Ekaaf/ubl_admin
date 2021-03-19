

@if (Request::path()=='/admin/users')

@endif
@if (Request::path()=='/admin/regdentalcamp')

@endif

@if (Request::path()=='admin/user/index')
    <script src="{{URL::to('public/js/customjs/user.js')}}" type="text/javascript"></script>
@endif

@if (Request::path()=='admin/user/add')
    <script src="{{URL::to('public/js/customjs/useredit.js')}}" type="text/javascript"></script>
@endif

@if(Request::segment(2)=='user' && Request::segment(4) =='edit')
    <script src="{{URL::to('public/js/customjs/useredit.js')}}" type="text/javascript"></script>
@endif



@if (Request::path()=='admin/store' || Request::path()=='bdo/store' || Request::path()=='reportuser/store')
    <script src="{{URL::to('public/js/customjs/store.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif

@if (Request::path()=='admin/dailyvisit' || Request::path()=='bdo/dailyvisit')
    <script src="{{URL::to('public/js/customjs/dailyvisit.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif

@if (Request::path()=='admin/audit' || Request::path()=='bdo/audit' || Request::path()=='reportuser/audit')
    <script src="{{URL::to('public/js/customjs/audit.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif

@if((Request::segment(2)=='store' && Request::segment(4) =='edit') || (Request::segment(2)=='audit' && Request::segment(4) =='edit') || (Request::segment(2)=='dailyvisit' && Request::segment(4) =='edit') || (Request::segment(2)=='doctors' && Request::segment(4) =='edit')) 
	<script src="{{URL::to('public/js/customjs/useredit.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('public/js/customjs/storeedit.js')}}" type="text/javascript"></script>
@endif

@if (Request::path()=='admin/options')
    <script src="{{URL::to('public/js/customjs/options.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif


@if (Request::path()=='admin/doctor/index')
    <script src="{{URL::to('public/js/customjs/doctors.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif

@if (Request::path()=='admin/users')
    <script src="{{URL::to('public/js/customjs/users.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
@endif


@if (Request::path()=='admin/options/add')
    <script src="{{URL::to('public/js/customjs/storeedit.js')}}" type="text/javascript"></script>
@endif

<script type="text/javascript">
    // alert('<?php echo Auth::user()->type;?>')
    function showImage(src){
      var modal = document.getElementById("myModal");

      var img = src;
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      modal.style.display = "block";
      modalImg.src = img;

      var span = document.getElementsByClassName("close")[0];
      span.onclick = function() { 
        modal.style.display = "none";
      }
    }
</script>