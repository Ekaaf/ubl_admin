@extends('layout.master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Options Add
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet">
			
			<form class="m-form" method="post" action="{{URL::to('admin/options/save')}}" enctype="multipart/form-data">
				@csrf
				<div class="m-portlet__body">
					<div class="m-form__section m-form__section--first">
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Select Type:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="type" id="type"  required>
									<option value="">Select</option>
									<option value="The Product benefits are convincing enough to recommend (Daily Visit)">The Product benefits are convincing enough to recommend (Daily Visit)</option>
									<option value="Number of Prescriptions (Daily Visit)">Number of Prescriptions (Daily Visit)</option>
									<option value="Dentist Add (Daily Visit)">Dentist Add (Daily Visit)</option>
									<option value="Dentist's Grade (Daily Visit)">Dentist's Grade (Daily Visit)</option>
									<option value="Special Compliment Given (Daily Visit)">Special Compliment Given (Daily Visit)</option>
									<option value="Visit Status (Daily Visit)">Visit Status (Daily Visit)</option>
									<option value="Visit Type (Daily Visit)">Visit Type (Daily Visit)</option>
									<option value="Visit Cycle (Daily Visit)">Visit Cycle (Daily Visit)</option>
									<option value="Samples Given (Daily Visit)">Samples Given (Daily Visit)</option>
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row dentist">
							<label class="col-lg-2 col-form-label">
								DCP Zone:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dcp_zone" id="dcp_zone" onchange="getTerritorries();" required>
									<option>Select</option>
									@foreach($zones as $zone)
									<option value="{{$zone->id}}">{{$zone->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row dentist">
							<label class="col-lg-2 col-form-label">
								DCP Territorry:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dcp_territory" id="dcp_territory" required>
									<option>Select</option>
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Name:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="name" id="name" required>
							</div>
						</div>

						<div class="form-group m-form__group row dentist">
							<label class="col-lg-2 col-form-label">
								Dentist's Grade:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dentist_grade" id="dentist_grade" required>
									<option>Select</option>
									@foreach($grades as $grade)
									<option value="{{$grade->id}}">{{$grade->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row dentist">
							<label class="col-lg-2 col-form-label">
								Chamber:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="chamber" id="chamber" required>
							</div>
						</div>

						<div class="form-group m-form__group row dentist">
							<label class="col-lg-2 col-form-label">
								Address:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="chamber_address" id="chamber_address" required>
							</div>
						</div>

						
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
								<button type="submit" class="btn btn-success">
									Submit
								</button>
								<button type="reset" class="btn btn-secondary">
									Cancel
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<style type="text/css">
	.dentist{
		display: none;
	}
</style>
<script type="text/javascript">
	$("#type").change(function(){
		if($("#type").val()=="Dentist Add (Daily Visit)"){
			$(".dentist").css("display","flex");
		}
		else{
			$(".dentist").hide();
		}
	});
</script>
@stop