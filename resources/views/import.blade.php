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
			
			<form class="m-form" id="doctorForm" method="post" action="{{URL::to('admin/saveImport')}}" enctype="multipart/form-data">
				@csrf
				
					
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Excel:
					</label>
					<div class="col-lg-6">
						<input type="file" class="form-control m-input" name="excel" id="excel" required>
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