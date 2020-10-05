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
			
			<form class="m-form" id="doctorForm" method="post" action="{{URL::to('admin/doctor/saveDoctor')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Username:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="name" id="name"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Email:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="email" id="email"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Phone Number:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="phone_number" id="phone_number"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Password:
					</label>
					<div class="col-lg-6">
						<input type="password" class="form-control m-input" name="password" id="password"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Confirm Password:
					</label>
					<div class="col-lg-6">
						<input type="password" class="form-control m-input" name="con_password" id="con_password"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Doctor Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="doctor_name" id="doctor_name"  required>
					</div>
				</div>

					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Designation:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="designation" id="designation"  required>
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
							<option value="{{$dept}}">{{$dept}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Specialization:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="specialization" id="specialization"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Chamber Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="chamber_name" id="chamber_name"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Chamber Address:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="chamber_address" id="chamber_address"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Education:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="education" id="education"  required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						BMDC Reg No:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="bmdc_number" id="bmdc_number"  required>
					</div>
				</div>
				

					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Online Consultation:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="online_consultation" id="online_consultation" required>
					</div>
				</div>
			
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Image:
					</label>
					<div class="col-lg-6">
						<input type="file" class="form-control m-input" name="photo_link" id="photo_link" >
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
	$("#doctorForm").submit(function(e) {

    	e.preventDefault(); 
    	if($("#password").val() != $("#con_password").val()){
    		alert("Password do not match");
    	}
    	else{
    		$("#doctorForm").submit();
    	}
    	

    
	});
</script>
@stop