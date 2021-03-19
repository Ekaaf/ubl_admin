@extends('layout.master')

@section('content')
<link href="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Sample Collection List
				</h3>
			</div>
      <!-- <button class="btn btn-success">
        Export
      </button> -->
      <!--a href="{{URL::to('admin/doctor/excel')}}" class="btn btn-success" id="addUniqueID" style="background: #843e71;border: #2B2A97;">
                    Download Excel
                  </a-->
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
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
		</div>
	</div>
</div>

    <script src="{{URL::to('public/js/customjs/samplecollection.js')}}" type="text/javascript"></script>
@stop