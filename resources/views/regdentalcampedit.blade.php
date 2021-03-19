@extends('layout.master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Edit User
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet pl-4">
			
			<form class="m-form" method="post" action="{{URL::to('admin/dentalcampeditprocess')}}/{{$getUserData->id}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$getUserData->id}}">
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Registration Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="reg_name" id="doctor_name" value="{{$getUserData->reg_name}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Registration Email:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="reg_email" id="doctor_name" value="{{$getUserData->reg_email}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Registration Phone:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="reg_phone" id="doctor_name" value="{{$getUserData->reg_phone}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Registration Type:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="reg_type" id="doctor_name" value="{{$getUserData->reg_type}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Registration Info:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="reg_info" id="doctor_name" value="{{$getUserData->reg_info}}" required>
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