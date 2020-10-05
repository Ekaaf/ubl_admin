@extends('layout.master')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Daily Visit Dashboard
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="row">
			<div class="col-lg-6">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Number of Daily Visit Per Day
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Number of Daily Visit Per Zone
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas id="zoneChart"></canvas>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-4" style="text-align: center;">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Visit Status
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="row" >
							<div class="col-lg-6" >
								<div class="m-portlet__body" style="border: 1px solid #716aca;">
									{{$chamberCount}}
								</div>
								{{$options['25']->name}}
							</div>
							<div class="col-lg-6">
								<div class="m-portlet__body" style="border: 1px solid #716aca;">
									{{$instituteCount}}
								</div>
								{{$options['26']->name}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4" style="text-align: center;">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Unique Dentist
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="m-portlet__body" style="border: 1px solid #716aca;">
							{{$cycle1Count}}
						</div>
						{{$options['31']->name}}
					</div>
				</div>
			</div>
			<div class="col-lg-4" style="text-align: center;">
				<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<!-- <i class="flaticon-placeholder-2"></i> -->
								</span>
								<h3 class="m-portlet__head-text">
									Visit Status
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="row" >
							<div class="col-lg-6" >
								<div class="m-portlet__body" style="border: 1px solid #716aca;">
									{{$Agrade}}
								</div>
								A Grade
							</div>
							<div class="col-lg-6">
								<div class="m-portlet__body" style="border: 1px solid #716aca;">
									{{$Bgrade}}
								</div>
								B Grade
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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
									Total Number of Sample Distributed
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="m-portlet__body" style="border: 1px solid #716aca;">
							{{$sampleCount}}
						</div>
					</div>
				</div>
			</div>
			
		</div>


	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        labels: <?php echo $days;?>,
        datasets: [{
        	type: 'line',
        	fill: false,
            label: '# of Daily visits Per Day',
            data: <?php echo $number_per_day;?>,
            // backgroundColor: [
            //     'rgba(255, 99, 132, 0.2)',
            //     'rgba(54, 162, 235, 0.2)',
            //     'rgba(255, 206, 86, 0.2)',
            //     'rgba(75, 192, 192, 0.2)',
            //     'rgba(153, 102, 255, 0.2)',
            //     'rgba(255, 159, 64, 0.2)'
            // ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)',
            //     'rgba(75, 192, 192, 1)',
            //     'rgba(153, 102, 255, 1)',
            //     'rgba(255, 159, 64, 1)'
            // ],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
        scales: {
        	xAxes: [{
                scaleLabel: {
			        display: true,
			        labelString: 'Days'
		      	},
		      	// gridLines: {
		       //  	color: 'transparent'
		      	// }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: <?php echo $max_visit;?>
                },
                scaleLabel: {
			        display: true,
			        labelString: 'Visit Number'
		      	},
            }]
        }
    }
});


var ctx = document.getElementById('zoneChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo $zones;?>,
        datasets: [{
        	label: '# of Daily visits Per Zone',
            data: <?php echo $number_per_zone;?>,
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
        scales: {
        	xAxes: [{
                scaleLabel: {
			        display: false,
			        labelString: 'Zones'
		      	}
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                    max: <?php echo $max_zone;?>
                },
                scaleLabel: {
			        display: false,
			        labelString: 'Visit Number'
		      	}
            }]
        }
    }
});


</script>
@stop