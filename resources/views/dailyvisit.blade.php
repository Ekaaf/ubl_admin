@extends('layout.master')

@section('content')
<link href="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Daily Visit
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->

  <div class="m-form m-form--fit m-form--label-align-right">
    <div class="m-portlet__body">
      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Date
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="date" name="date" id="date">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Email
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="email" id="email">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Brand Detailing Officer Name
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="bdo_id" name="bdo_id">
                <option value="">Select</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>


      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Dentist Name
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="dentist_name" id="dentist_name">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Chamber
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="chamber" id="chamber">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Chamber Address
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" id="chamber_address" name="chamber_address">
            </div>
          </div>
        </div>
      </div>
      

      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Zone
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="zone_id" name="zone_id">
                <option value="">Select</option>
                @foreach($zones as $zone)
                <option value="{{$zone->id}}">{{$zone->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Territorry
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="territorry_id" name="territorry_id">
                <option value="">Select</option>
                @foreach($territorries as $territorry)
                <option value="{{$territorry->id}}">{{$territorry->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <!-- <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              BDO Name
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="bdo_name" id="bdo_name">
            </div>
          </div>
        </div> -->
      </div>

      <div class="row">
        <button type="button" class="btn btn-primary" style="margin-left: 90%;" onclick="getDailyvisit();">
          Search
        </button>
      </div>
    </div> 
  </div>
	<div class="m-content">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="overflow:auto;">
			<table class="table table-bordered" id="dailyvisittable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Timestamp</th>
                  <th scope="col">Date</th>
                  <th scope="col">Email</th>
                  <th scope="col">Vist Status</th>
                  <th scope="col">Brand Detailing Officer Name</th>
                  <th scope="col">Visit Type</th>
                  <th scope="col">Visit Cycle</th>
                  <th scope="col">Sample</th>
                  <th scope="col">Special Compliment</th>
                  <th scope="col">Sample Quantity</th>
                  <th scope="col">Dentist Name</th>
                  <th scope="col">Dentis Grade</th>
                  <th scope="col">Chamber Name</th>
                  <th scope="col">Chamber Address</th>
                  <th scope="col">GPS Coordinates</th>
                  <th scope="col">Photo</th>
                  
                  <th scope="col">No of Prescriptions</th>
                  <th scope="col">Product Benifit</th>
                  <th scope="col">Remark</th>
                  <th scope="col">Feedback</th>
                  <th scope="col">Dcp Zone</th>
                  <th scope="col">Dcp Territorry</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
		</div>
	</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@stop