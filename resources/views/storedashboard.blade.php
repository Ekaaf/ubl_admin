@extends('layout.master')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Store Dashboard
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		
		<div class="row" style="text-align: center;">
			<div class="col-lg-4">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Oral Care
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas id="oralcareChart"></canvas>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Within Coverage
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas id="witihincoverageChart"></canvas>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Oral Care Availability
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas id="availabilityChart"></canvas>
					</div>
				</div>
			</div>


		</div>


	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<script>

var ctx = document.getElementById('oralcareChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
    	labels: <?php echo $oralCareLabel;?>,
        datasets: [{
        	label: '# of Daily visits Per Zone',
            data: <?php echo $oralCareData;?>,
            backgroundColor: [
				'rgb(75, 192, 192)',
				'rgb(255, 99, 132)'
			],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
    }
});


var ctx = document.getElementById('witihincoverageChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
    	labels: <?php echo $withinCoverageLabel;?>,
        datasets: [{
        	label: '# of Daily visits Per Zone',
            data: <?php echo $withinCoverageData;?>,
            backgroundColor: [
				'rgb(75, 192, 192)',
				'rgb(255, 99, 132)'
			],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
    }
});

var ctx = document.getElementById('availabilityChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
    	labels: <?php echo $availabilityLabel;?>,
        datasets: [{
        	label: '# of Daily visits Per Zone',
            data: <?php echo $availabilityData;?>,
            backgroundColor: [
				'rgb(75, 192, 192)',
				'rgb(255, 99, 132)'
			],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
    }
});
</script>
@stop