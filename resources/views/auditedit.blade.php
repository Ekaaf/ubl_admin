@extends('layout.master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Edit Audit
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet">
			
			<form class="m-form" method="post" action="{{URL::to(Request::segment(1).'/audit/updateaudit')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$audit->id}}">
				<div class="m-portlet__body">
					<div class="m-form__section m-form__section--first">
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Date:
							</label>
							<div class="col-lg-6">
								<input type="date" class="form-control m-input" name="date" value="{{old('date', $audit->date)}}">
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
										<option value="{{$zone->id}}" <?php if($zone->id==$store->zone_id) echo "selected"; ?>>{{$zone->name}}</option>
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
										<option value="{{$territorry->id}}" <?php if($territorry->id==$store->territorry_id) echo "selected"; ?>>{{$territorry->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								UBL Town:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="town_id" id="town_id" onchange="getStores();" required>
									<option value="">Select</option>
									@foreach ($towns as $town)
										<option value="{{$town->id}}" <?php if($town->id==$store->town_id) echo "selected"; ?>>{{$town->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Drug Store Name:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="store_id" id="store_id" required>
									<option value="">Select</option>
									@foreach ($storeList as $s)
										<option value="{{$s->id}}" <?php if($s->id==$audit->store_id) echo "selected"; ?>>{{$s->store_name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Oral Care:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="oral_care" value="1" <?php if($audit->oral_care ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="oral_care" value="2" <?php if($audit->oral_care ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Within Coverage:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="within_coverage" value="1" <?php if($audit->within_coverage ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="within_coverage" value="2" <?php if($audit->within_coverage ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Remarks on coverage gap:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="remarks_coverage_gap" value="{{old('remarks_coverage_gap', $audit->remarks_coverage_gap)}}">
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Oral Care Availiability:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="oral_care_availability" value="1" <?php if($audit->oral_care_availability ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="oral_care_availability" value="2" <?php if($audit->oral_care_availability ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Remarks on Availability gap:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="remarks_availability_gap" value="{{old('remarks_availability_gap', $audit->remarks_availability_gap)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sensitive Expert - Professional:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_professional" value="1" <?php if($audit->sensetive_expert_professional ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_professional" value="2" <?php if($audit->sensetive_expert_professional ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sensitive Expert - Gum Care:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_gumcare" value="1" <?php if($audit->sensetive_expert_gumcare ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_gumcare" value="2" <?php if($audit->sensetive_expert_gumcare ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sensitive Expert - Fresh:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_fresh" value="1" <?php if($audit->sensetive_expert_fresh ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="sensetive_expert_fresh" value="2" <?php if($audit->sensetive_expert_fresh ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Pepsodent - Germi-Check:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="pepsodant" value="1" <?php if($audit->pepsodant ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="pepsodant" value="2" <?php if($audit->pepsodant ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Mediplus:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="mediplus" value="1" <?php if($audit->mediplus ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="mediplus" value="2" <?php if($audit->mediplus ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Dentosafe:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="dentosafe" value="1" <?php if($audit->dentosafe ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="dentosafe" value="2" <?php if($audit->dentosafe ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sensodyne:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="sensodyne" value="1" <?php if($audit->sensodyne ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="sensodyne" value="2" <?php if($audit->sensodyne ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Biodent:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="biodent" value="1" <?php if($audit->biodent ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="biodent" value="2" <?php if($audit->biodent ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Apsol Oral Paste:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="apsol_oral_paste" value="1" <?php if($audit->apsol_oral_paste ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="apsol_oral_paste" value="2" <?php if($audit->apsol_oral_paste ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Twin Lotus:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="twin_lotus" value="1" <?php if($audit->twin_lotus ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="twin_lotus" value="2" <?php if($audit->twin_lotus ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Medicadent:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="medicatent" value="1" <?php if($audit->medicatent ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="medicatent" value="2" <?php if($audit->medicatent ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Sensive Plus:
							</label>
							<div class="col-lg-6">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="sensive_plus" value="1" <?php if($audit->sensive_plus ==1) echo "checked"; ?> required>
										Yes
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="sensive_plus" value="2" <?php if($audit->sensive_plus ==2) echo "checked"; ?> required>
										No
										<span></span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Other:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="other" value="{{old('other', $audit->other)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Remarks:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="remarks" value="{{old('remarks', $audit->remarks)}}">
							</div>
						</div>

						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Profile Image:
							</label>
							<div class="col-lg-6">
								<img src="https://dcptracker.com/uniliver_laravel/{{$audit->photo_link}}" style="max-height: 200px;" id="previewImage">
								<br>
								<button type="button" class="btn btn-blue" id="imageChange">
									Change
								</button>
								<input type="file" class="form-control m-input" name="photo_link" id="photo_link" style="display: none;" onchange="showCaptured();">
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