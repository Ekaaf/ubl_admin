@extends('layout.master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Edit Daily Visit
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet">
			<form class="m-form" method="post" action="{{URL::to(Request::segment(1).'/dailyvisit/updatedailyvisit')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$dailyvisit->id}}">
				<div class="m-portlet__body">
					<div class="m-form__section m-form__section--first">

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Email:
							</label>
							<div class="col-lg-6">
								<input type="email" class="form-control m-input" name="email" value="{{old('email', $dailyvisit->email)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Date:
							</label>
							<div class="col-lg-6">
								<input type="date" class="form-control m-input" name="date" value="{{old('date', $dailyvisit->date)}}">
							</div>
						</div>

						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Profile Image:
							</label>
							<div class="col-lg-6">
								<img src="https://dcptracker.com/uniliver_laravel/{{$dailyvisit->photo_link}}" style="max-height: 200px;" id="previewImage">
								<br>
								<button type="button" class="btn btn-blue" id="imageChange">
									Change
								</button>
								<input type="file" class="form-control m-input" name="photo_link" id="photo_link" style="display: none;" onchange="showCaptured();">
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Brand Detailing Officer Name*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="bdo_id" id="bdo_id"  required>
									<option value="">Select</option>
									@foreach ($bdos as $bdo)
										<option value="{{$bdo->id}}" <?php if($bdo->id==$dailyvisit->bdo_id) echo "selected"; ?>>{{$bdo->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Visit Status*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="visit_status" id="visit_status"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Visit Status (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->visit_status) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Visit Type*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="visit_type" id="visit_type"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Visit Type (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->visit_type) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Brand Detailing Officer Name*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="bdo_id" id="bdo_id"  required>
									<option value="">Select</option>
									@foreach ($bdos as $bdo)
										<option value="{{$bdo->id}}" <?php if($bdo->id==$dailyvisit->bdo_id) echo "selected"; ?>>{{$bdo->name}}</option>
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Visit Type*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="visit_type" id="visit_type"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Visit Type (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->visit_type) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Visit Cycle*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="visit_cycle" id="visit_cycle"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Visit Cycle (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->visit_cycle) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Samples Given*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="sample" id="sample"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Samples Given (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->sample) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Special Compliment Given*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="special_comp" id="special_comp"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Special Compliment Given (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->special_comp) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sample Quantity:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="sample_quantity" value="{{old('sample_quantity', $dailyvisit->sample_quantity)}}">
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Dcp Zone:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dcp_zone" id="dcp_zone" onchange="getTerritorries();getTowns();" required>
									<option value="">Select</option>
									@foreach ($zones as $zone)
										<option value="{{$zone->id}}" <?php if($zone->id==$dailyvisit->zone_id) echo "selected"; ?>>{{$zone->name}}</option>
									@endforeach

								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Dcp Territorry:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dcp_territory" id="dcp_territory"  required>
									<option value="">Select</option>
									@foreach ($territorries as $territorry)
										<option value="{{$territorry->id}}" <?php if($territorry->id==$dailyvisit->territorry_id) echo "selected"; ?>>{{$territorry->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Dentist's Name*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dentist_name" id="dentist_name" onchange="getDoctorInfo();">
									<option value="">Select</option>
									@foreach ($doctors as $doctor)
										<option value="{{$doctor->id}}" <?php if($doctor->id==$dailyvisit->dentist_name) echo "selected"; ?>>{{$doctor->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Dentist's Grade*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="dentist_grade" id="dentist_grade"  disabled>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Dentist's Grade (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$currentDoctor->dentist_grade) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Chamber/Institute, Name*:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="chamber" id="chamber" value="{{old('chamber', $currentDoctor->chamber)}}" disabled>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Chamber/Institute, Address (House, Road, Block/Sector, Area) (If already given type - Given) *
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="chamber_address" id="chamber_address" value="{{old('chamber_address', $currentDoctor->chamber_address)}}" disabled>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Number of Prescriptions*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="number_prescription" id="number_prescription"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="Number of Prescriptions (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->number_prescription) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								The Product benefits are convincing enough to recommend*:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="product_benifit" id="product_benifit"  required>
									<option value="">Select</option>
									@foreach ($options as $option)
									@if($option->type=="The Product benefits are convincing enough to recommend (Daily Visit)")
										<option value="{{$option->id}}" <?php if($option->id==$dailyvisit->product_benifit) echo "selected"; ?>>{{$option->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Please mention below (If any) your specific scientific query/suggestions/feedback from Patients or any observations you want to share*:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="question" value="{{old('question', $dailyvisit->question)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								The presentation made by the Pepsodent representative was useful and informative*:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="presentation" value="{{old('presentation', $dailyvisit->presentation)}}">
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
@stop