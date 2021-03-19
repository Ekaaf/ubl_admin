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
			
			<form class="m-form" method="post" action="{{URL::to('admin/usereditprocess')}}/{{$getUserData->id}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$getUserData->id}}">
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Name:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="name" id="doctor_name" value="{{$getUserData->name}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Email:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="email" id="doctor_name" value="{{$getUserData->email}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Phone:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="phone_number" id="doctor_name" value="{{$getUserData->phone_number}}" required>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Role ID:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" name="role_id" id="doctor_name" value="{{$getUserData->role_id}}" required>
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