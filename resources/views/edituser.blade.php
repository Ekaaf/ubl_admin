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
		<div class="m-portlet pl-4">
			
			<form class="m-form" method="post" action="{{URL::to('admin/doctors/updatedoctor')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$doctor->id}}">
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Doctor Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="doctor_name" id="doctor_name" value="{{$doctor->doctor_name}}" required>
					</div>
				</div>

					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Designation:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="designation" id="designation" value="{{$doctor->designation}}">
					</div>
				</div>


				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Department:
					</label>
					<div class="col-lg-6">
						<select class="form-control m-input" name="department" id="department">
							<option value="">Select</option>
							@foreach($departments as $dept)
							<option value="{{$dept}}" <?php if($doctor->department==$dept) echo "selected"; ?>>{{$dept}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Specialization:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="specialization" id="specialization" value="{{$doctor->specialization}}" >
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Chamber Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="chamber_name" id="chamber_name" value="{{$doctor->chamber_name}}" >
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Chamber Address:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="chamber_address" id="chamber_address" value="{{$doctor->chamber_address}}" >
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Education:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="education" id="education" value="{{$doctor->education}}" >
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						BMDC Reg No:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="bmdc_number" id="bmdc_number" value="{{$doctor->bmdc_number}}" >
					</div>
				</div>
				
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Phone Number:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="phone_number" id="phone_number" value="{{$user->phone_number}}" >
					</div>
				</div>

					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Online Consultation:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="online_consultation" id="online_consultation" value="{{$doctor->online_consultation}}" >
					</div>
				</div>
				
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Long - lat:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="location" id="location" value="{{$doctor->location}}">
					</div>
				</div>
			
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Image:
					</label>
					<div class="col-lg-6">
						@if($doctor->imagelink!=null || $doctor->imagelink!='')
						<img src="https://ubl.sensetiveexpert.com/ubl_laravel/public/images/doctor/{{$doctor->bmdc_number}}.jpg" style="max-height: 200px;" id="previewImage">
						<br>
						@endif
						<input type="file" class="form-control m-input" name="photo_link" id="photo_link" onchange="previewFile();">
						<!-- <span class="m-form__help">
							Please enter your username
						</span> -->
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

<script>
	function previewFile() {
		var preview = document.querySelector('#previewImage');
		var file    = document.querySelector('input[type=file]').files[0];
		var reader  = new FileReader();

		reader.onloadend = function () {
		preview.src = reader.result;
		}

		if (file) {
		reader.readAsDataURL(file);
		} else {
		preview.src = "";
	}
}
</script>
@stop