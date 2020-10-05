@extends('layout.master')

@section('content')
<link href="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Doctors List
				</h3>
			</div>
      
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-form m-form--fit m-form--label-align-right">
    <div class="m-portlet__body">
        
  </div>
  <div class="m-content" style="overflow: scroll;">
		<div class="">
			<table class="display" id="doctorstable" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Doctor's Name</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Department</th>
                  <th scope="col">Specialization</th>
                  <th scope="col">Chamber Name</th>
                  <th scope="col">Chamber Address</th>
                  <th scope="col">Education</th>
                  <th scope="col">BMDC Reg No.</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Online Consultation</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
		</div>
	</div>
</div>


<!-- <script src="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('public/js/customjs/store.js')}}"></script> -->
@stop