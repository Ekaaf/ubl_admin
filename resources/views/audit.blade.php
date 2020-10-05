@extends('layout.master')

@section('content')
<link href="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Audit
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
              Drug Store Code
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="store_code" id="store_code">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Drug Store Name
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" id="store_name" name="store_name">
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Drug Store Address
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="plot_no" id="plot_no">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Drug Store Contact Number
            </label>
            <div class="col-8">
              <input class="form-control m-input" type="text" name="mobilenumber" id="mobilenumber">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              UBL Town
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="town_id" name="town_id">
                <option value="">Select</option>
                @foreach($towns as $town)
                <option value="{{$town->id}}">{{$town->name}}</option>
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
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Oral Care Presence
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="oral_care" name="oral_care">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Within Coverage
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="within_coverage" name="within_coverage">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Oral Care Availability
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="oral_care_availability" name="oral_care_availability">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Sensetive Expert-Professional
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="sensetive_expert_professional" name="sensetive_expert_professional">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Sensetive Expert-Gumcare
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="sensetive_expert_gumcare" name="sensetive_expert_gumcare">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Sensetive Expert-Fresh
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="sensetive_expert_fresh" name="sensetive_expert_fresh">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Pepsodant Germi-Check
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="pepsodant" name="pepsodant">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-2">
        <div class="col-4">
          <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-4 col-form-label">
              Mediplus
            </label>
            <div class="col-8">
              <select class="form-control m-input" id="mediplus" name="mediplus">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              <select>
            </div>
          </div>
        </div>
        
      </div>


      <div class="row">
        <button type="button" class="btn btn-primary" style="margin-left: 90%;" onclick="getAudit();">
          Search
        </button>
      </div>


    </div>
  </div>


	<div class="m-content">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="overflow:auto;">
			<table class="table table-bordered" id="audittable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Timestamp</th>
              <th scope="col">Date</th>
              <th scope="col">Drug Store Code</th>
              <th scope="col">UBL Town</th>
              <th scope="col">Store Name</th>
              <th scope="col">Photo</th>
              <th scope="col">Drug Store Contact Number</th>
              <th scope="col">Drug Store Address</th>
              <th scope="col">Oral Care Presence</th>
              <th scope="col">Within Coverage</th>
              <th scope="col">Oral Care Availability</th>
              <th scope="col">Sensetive Expert-Professional</th>
              <th scope="col">Sensetive Expert-Gumcare</th>
              <th scope="col">Sensetive Expert-Fresh</th>
              <th scope="col">Pepsodant Germi-Check</th>
              <th scope="col">Mediplus</th>
              <th scope="col">GPS Coordinates</th>
              <th scope="col">DCP Zone</th>
              <th scope="col">DCP Territorry</th>
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