@extends('layout.master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Edit Store
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet">
			
			<form class="m-form" method="post" action="{{URL::to(Request::segment(1).'/store/updatestore')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$store->id}}">
				<div class="m-portlet__body">
					<div class="m-form__section m-form__section--first">
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Date:
							</label>
							<div class="col-lg-6">
								<input type="date" class="form-control m-input" name="date" value="{{old('date', $store->date)}}">
								<!-- <span class="m-form__help">
									Please enter your username
								</span> -->
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
								<select class="form-control m-input" name="town_id" id="town_id" required>
									<option value="">Select</option>
									@foreach ($towns as $town)
										<option value="{{$town->id}}" <?php if($town->id==$store->town_id) echo "selected"; ?>>{{$town->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Drug Store Code:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="store_code" value="{{old('store_code', $store->store_code)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Drug Store Name:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="store_name" value="{{old('store_name', $store->store_name)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Drug Store Address:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="plot_no" value="{{old('plot_no', $store->plot_no)}}">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Drug Store Mobile No:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="mobilenumber" value="{{old('mobilenumber', $store->mobilenumber)}}">
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								BDO Name:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="bdo_name" value="{{old('bdo_name', $store->bdo_name)}}">
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								BDS Name:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="bds_name" value="{{old('bds_name', $store->bds_name)}}">
							</div>
						</div>

						
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Profile Image:
							</label>
							<div class="col-lg-6">
								<img src="https://dcptracker.com/uniliver_laravel/{{$store->photo_link}}" style="max-height: 200px;" id="previewImage">
								<br>
								<button type="button" class="btn btn-blue" id="imageChange">
									Change
								</button>
								<input type="file" class="form-control m-input" name="photo_link" id="photo_link" style="display: none;" onchange="showCaptured();">
								<!-- <span class="m-form__help">
									Please enter your username
								</span> -->
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