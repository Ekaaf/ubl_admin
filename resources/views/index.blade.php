@extends('layout.master')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Dashboard
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content" style="font-size: 17px;">
		<div class="row">
			Total visitor counter : <b>{{$counter[0]->counter}}</b> 
		</div>

		<div class="row">
			Total enrolled doctor : <b>{{$doctors}}</b> 
		</div>

		<div class="row">
			Total Sample collected : <b>{{$sampleno}}</b> 
		</div>
	</div>
</div>
@stop