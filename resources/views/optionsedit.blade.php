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
			
			<form class="m-form" method="post" action="{{URL::to('admin/options/updateoption')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$option->id}}">
				<div class="m-portlet__body">
					<div class="m-form__section m-form__section--first">
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Select Type:
							</label>
							<div class="col-lg-6">
								<select class="form-control m-input" name="type" id="type"  disabled>
									<option value="">Select</option>
									<option value="The Product benefits are convincing enough to recommend (Daily Visit)" <?php if($option->type=="The Product benefits are convincing enough to recommend (Daily Visit)") echo "selected"; ?>>The Product benefits are convincing enough to recommend (Daily Visit)</option>
									<option value="Number of Prescriptions (Daily Visit)" <?php if($option->type=="Number of Prescriptions (Daily Visit)") echo "selected"; ?>>Number of Prescriptions (Daily Visit)</option>
									<option value="Dentist Name (Daily Visit)" <?php if($option->type=="Dentist Name (Daily Visit)") echo "selected"; ?>>Dentist Name (Daily Visit)</option>
									<option value="Dentist's Grade (Daily Visit)" <?php if($option->type=="Dentist's Grade (Daily Visit)") echo "selected"; ?>>Dentist's Grade (Daily Visit)</option>
									<option value="Special Compliment Given (Daily Visit)" <?php if($option->type=="Special Compliment Given (Daily Visit)") echo "selected"; ?>>Special Compliment Given (Daily Visit)</option>
									<option value="Visit Status (Daily Visit)" <?php if($option->type=="Visit Status (Daily Visit)") echo "selected"; ?>>Visit Status (Daily Visit)</option>
									<option value="Visit Type (Daily Visit)" <?php if($option->type=="Visit Type (Daily Visit)") echo "selected"; ?>>Visit Type (Daily Visit)</option>
									<option value="Visit Cycle (Daily Visit)" <?php if($option->type=="Visit Cycle (Daily Visit)") echo "selected"; ?>>Visit Cycle (Daily Visit)</option>
									<option value="Samples Given (Daily Visit)" <?php if($option->type=="Samples Given (Daily Visit)") echo "selected"; ?>>Samples Given (Daily Visit)</option>
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Name:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="name" id="name" value="{{$option->name}}" required>
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