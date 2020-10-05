@extends('layout.master')

@section('content')
<link href="{{URL::to('public/Jquerydatatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Options List
				</h3>
			</div>
      
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-form m-form--fit m-form--label-align-right">
    <div class="m-portlet__body">
        <div class="row pb-2">
          <div class="col-6">
            <div class="form-group m-form__group row">
              <label for="example-text-input" class="col-2 col-form-label" style="tex">
                Options
              </label>
              <div class="col-8">
                <select class="form-control m-input" name="type" id="type"  required>
                  <option value="">Select</option>
                  <option value="The Product benefits are convincing enough to recommend (Daily Visit)">The Product benefits are convincing enough to recommend (Daily Visit)</option>
                  <option value="Number of Prescriptions (Daily Visit)">Number of Prescriptions (Daily Visit)</option>
                  <option value="Dentist Name (Daily Visit)">Dentist Name (Daily Visit)</option>
                  <option value="Dentist's Grade (Daily Visit)">Dentist's Grade (Daily Visit)</option>
                  <option value="Special Compliment Given (Daily Visit)">Special Compliment Given (Daily Visit)</option>
                  <option value="Visit Status (Daily Visit)">Visit Status (Daily Visit)</option>
                  <option value="Visit Type (Daily Visit)">Visit Type (Daily Visit)</option>
                  <option value="Visit Cycle (Daily Visit)">Visit Cycle (Daily Visit)</option>
                  <option value="Samples Given (Daily Visit)">Samples Given (Daily Visit)</option>
                </select>
              </div>
            </div>
          </div>
        </div> 

        <div class="row">
          <button type="button" class="btn btn-primary" style="margin-left: 90%;" onclick="getOptions();">
            Search
          </button>
        </div>
  </div>
  <div class="m-content">
		<div class="">
			<table class="table table-bordered" id="optionstable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Type</th>
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