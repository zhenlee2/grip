
<!-- <?php $__env->startSection('title', 'Bootstrap Tabs'); ?> -->

<?php $__env->startSection('css'); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>"> -->
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?> -->

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Dashboard</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<!-- <li class="breadcrumb-item">Tabs</li> -->
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="card">
		<ul class="nav nav-tabs" id="icon-tab" role="tablist">
			<li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-chart-bar-graph"></i>OPC/OPCR Statistics</a></li>
			<!-- <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>GAD Statistics</a></li> -->
			<!-- <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Contact</a></li> -->
		</ul>
		<div class="card-body">
			<div class="tab-content" id="icon-tabContent">
				<div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
					<div class="row size-column">
						<div class="col-xl-3 box-col-3 xl-50">
						<div class="row dash-chart">
							<!-- <div class="col-xl-10 box-col-6 col-lg-12 col-md-6"> -->
							<div class="card o-hidden">
								<div class="card-body">
								<div class="ecommerce-widgets media">
									<div class="media-body">
									<p><h5>First Semester</h5></p>
										<h6 class="f-w-500 mb-0 f-26">No. of Indicator :  <span class="counter"><?php echo e($results); ?></span></h6>
									</div>
									<!-- <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart" aria-hidden="true"></i></div> -->
								</div>
								</div>
							</div>
							<div class="card o-hidden">
								<div class="card-body">
								<div class="ecommerce-widgets media">
									<div class="media-body">
									<p><h5>First Semester</h5></p>
										<h6 class="f-w-500 mb-0 f-26">No. of Indicator :  <span class="counter"><?php echo e($results); ?></span></h6>
									</div>
									<!-- <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart" aria-hidden="true"></i></div> -->
								</div>
								</div>
							</div>
							<!-- <div class="card o-hidden"> -->
								<!-- <div class="card-body"> -->
								
								<!-- </div> -->
							<!-- </div> -->
						</div>
						</div>
						<div class="col-xl-3 box-col-3 xl-50">
						<div class="row dash-chart">
							<!-- <div class="col-xl-10 box-col-6 col-lg-12 col-md-6"> -->
							<div class="card o-hidden">
								<div class="card-body">
								<div class="ecommerce-widgets media">
								<div class="media">
									<div class="media-body">
										<p><h5>Second Semester</h5></p>
										<!-- <p class="f-w-500 font-roboto">Second Semester<span class="badge pill-badge-primary ms-3">Hot</span></p> -->
										<div class="progress-box">
											<h6 class="f-w-500 mb-0 f-26">No. of Indicator : <span class="counter"><?php echo e($results2); ?></span></h6>
											<!-- <h4 class="f-w-500 mb-0 f-26">$<span class="counter">9000.04</span></h4> -->
											<!-- <div class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
											<div class="progress-gradient-primary" role="progressbar" style="width: 35%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="font-primary">88%</span><span class="animate-circle"></span></div>
											</div> -->
										</div>
									</div>
								</div>
								
									<!-- <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart" aria-hidden="true"></i></div> -->
								</div>
								</div>
							</div>

							<div class="card o-hidden">
								<div class="card-body">
								<!-- <div class="ecommerce-widgets media"> -->
								<div class="media">
									<div class="media-body">
										<p><h5>Second Semester</h5></p>
										<!-- <p class="f-w-500 font-roboto">Second Semester<span class="badge pill-badge-primary ms-3">Hot</span></p> -->
										<div class="progress-box">
											<h6 class="f-w-500 mb-0 f-26">No. of Indicator : <span class="counter"><?php echo e($results2); ?></span></h6>
											<!-- <h4 class="f-w-500 mb-0 f-26">$<span class="counter">9000.04</span></h4> -->
											<!-- <div class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
											<div class="progress-gradient-primary" role="progressbar" style="width: 35%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="font-primary">88%</span><span class="animate-circle"></span></div>
											</div> -->
										</div>
									</div>
								</div>
								
									<!-- <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart" aria-hidden="true"></i></div> -->
								<!-- </div> -->
								</div>
							</div>
							<!-- <div class="card o-hidden"> -->
								<!-- <div class="card-body"> -->
								
								<!-- </div> -->
							<!-- </div> -->
						</div>
						</div>
						<div class="col-xl-6 box-col-12 xl-100">
							<!-- <div class="card-header"> -->
							<p><h5>Number of indicators per offices</h5></p>
							<!-- </div> -->
							<div class="card o-hidden dash-chart">
									<div id="basic-bar1"></div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-6 box-col-6">
					<div class="card">
						<div class="card-header">
							<h5>Pie Chart <span class="digits">2</span></h5>
						</div>
						<div class="card-body p-0 chart-block">
							<div class="chart-overflow" id="pie-chart3"></div>
						</div>
					</div>
				</div>
					</div>	
				</div>	
				<div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
					<p class="mb-0 m-t-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
				</div>
			</div>
		</div>
	</div>
		<!-- </div> -->
	<!-- </div> -->
		<!-- </div> -->
	<!-- </div> -->
<!-- </div> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/chart-custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/chart/google/google-chart-loader.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/google/google-chart.js')); ?>"></script>

<!-- <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/dashboard/dashboard_2.js')); ?>"></script>


<script>
var options2 = {
    chart: {
        height: 400,
        type: 'bar',
        toolbar:{
          show: true
        }
    },
    plotOptions: {
        bar: {
			borderRadius: 4,
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: true
    },
    series: [{
        data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
    }],
    xaxis: {
        categories: ['OSM', 'QMT', 'PMS', 'CART', 'AS', 'NHTO', 'SWIDB', 'NRLMB', 'SB', 'DRMB', 'PDPB', 'SMS', 'IAS', 'IMC', 'HEMDS'],
    },
    colors:[ CubaAdminConfig.primary ]
}

var chart2 = new ApexCharts(
    document.querySelector("#basic-bar1"),
    options2
);

chart2.render();

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\caraga-pdps.dswd.gov.ph\resources\views/dashboard/dashboard-02.blade.php ENDPATH**/ ?>