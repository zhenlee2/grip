
<?php $__env->startSection('title', 'GRIP | Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>"> -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
	.page-wrapper .page-body-wrapper .page-title {
    padding-top: 25px;
    padding-bottom: 5px;
}
	.card .card-header {
    background-color: #fff;
    padding: 30px;
    border-bottom: 1px solid #ecf3fa;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    position: relative;
}
.card-body {
    -webkit-box-flex: 1;
    /* -ms-flex: 1 1 auto;
    flex: 1 1 auto; */
    padding: 0rem 0rem;
}
</style>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<!-- <span><h3>Dashboard</h3></span> 
<span>Welcome back, <?php echo e(auth()->user()->fname); ?>!</span> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<!-- <li class="breadcrumb-item">Tabs</li> -->
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
			<div class="card" >
				<div class="card-header" style="padding: 20;">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<span><h3>Dashboard</h3></span> 
							<span>Welcome back, <?php echo e(auth()->user()->fname); ?>!</span>
						</div>
						<div>
							<select class="form-select">
								<!-- Add options for the select dropdown -->
								<option value="0000">Select Year</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							
								<!-- Add more options as needed -->
							</select>
						</div>
					</div>
				</div>
				<!-- Add card body and other content here if needed -->
			</div>
            <div class="card-body">
				<div class="row">
				<div class="col-lg-3">
					<div class="card o-hidden">
						<div class="card-header card-no-border">
						<div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="fa fa-spin fa-cog"></i></li>
								<!-- <li><i class="view-html fa fa-code"></i></li>
								<li><i class="icofont icofont-maximize full-card"></i></li>
								<li><i class="icofont icofont-minus minimize-card"></i></li>
								<li><i class="icofont icofont-refresh reload-card"></i></li>
								<li><i class="icofont icofont-error close-card"></i></li> -->
							</ul>
						</div>
							<div class="media">
								<div class="media-body">
								<p><span class="f-w-500 font-roboto">GAD Budget</span><span class="f-w-700 font-primary ms-2"><i class="icofont icofont-coins"></i></span></p>
								<h4 class="f-w-500 mb-0 f-15"><span class="counter"><?php echo e($totalBudget); ?></span></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card o-hidden">
						<div class="card-header card-no-border">
						<div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="fa fa-spin fa-cog"></i></li>
								<!-- <li><i class="view-html fa fa-code"></i></li>
								<li><i class="icofont icofont-maximize full-card"></i></li>
								<li><i class="icofont icofont-minus minimize-card"></i></li>
								<li><i class="icofont icofont-refresh reload-card"></i></li>
								<li><i class="icofont icofont-error close-card"></i></li> -->
							</ul>
						</div>
						<div class="media">
							<div class="media-body">
								<p><span class="f-w-500 font-roboto">GAD Expendture</span><span class="f-w-700 font-primary ms-2"></span></p>
								<h4 class="f-w-500 mb-0 f-26"><span class="counter"><?php echo e($totalExpenditure); ?></span></h4>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card o-hidden">
						<div class="card-header card-no-border">
						<div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="fa fa-spin fa-cog"></i></li>
								<!-- <li><i class="view-html fa fa-code"></i></li>
								<li><i class="icofont icofont-maximize full-card"></i></li>
								<li><i class="icofont icofont-minus minimize-card"></i></li>
								<li><i class="icofont icofont-refresh reload-card"></i></li>
								<li><i class="icofont icofont-error close-card"></i></li> -->
							</ul>
						</div>
						<div class="media">
							<div class="media-body">
								<p><span class="f-w-500 font-roboto">Over All Level Total 2024</span><span class="f-w-700 font-primary ms-2"></span></p>
								<h6 class="f-w-500 mb-0 f-26"><span class="counter">Commitment Enhancement and Institutionalization</span></h6>
							</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				
				<!-- <div class="col-lg-3">
					<div class="card o-hidden">
						<div class="card-header card-no-border">
							<div class="media">
								<div class="media-body">
								<p><span class="f-w-500 font-roboto">GAD Expendture</span><span class="f-w-700 font-primary ms-2"></span></p>
								<h4 class="f-w-500 mb-0 f-26"><span class="counter"><?php echo e($totalExpenditure); ?></span></h4>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<div class="card o-hidden">
							<div class="card-header card-no-border">
							<p><h5>Indicator per office</h5></p>
							<div class="chart-block">
								<canvas id="myBarGraph"></canvas>
							</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-6">
					<div class="card o-hidden">
						<div class="card-header card-no-border">
						<h5><p><span class="f-w-500 font-roboto">GMEF ORGANIZATIONAL ASSESSMENT REPORT</p></h5>
							<div class="dt-ext table-responsive">
								<table class="table border gy-6 table-sm">
								<thead>
									<th class="border text-center">Entry Point</th>
									<th class="border text-center">Sub-Total</th>
									<th class="border text-center">Level for Policy:</th>
								</thead>
								<tbody>
									<tr>
										<td class="border text-center">POLICY</td>
										<td class="border text-center">5.00</td>
										<td class="border text-center">5: Replication and Innovation</td>
									</tr>
									<tr>
										<td class="border text-center">PEOPLE</td>
										<td class="border text-center">4.00</td>
										<td class="border text-center">4: Commitment Enhancement and Institutionalization</td>
									</tr>
									<tr>
										<td class="border text-center">ENABLING MECHANISMS</td>
										<td class="border text-center">4.00</td>
										<td class="border text-center">4: Commitment Enhancement and Institutionalization</td>
									</tr>
									<tr>
										<td class="border text-center">PAPs</td>
										<td class="border text-center">4.00</td>
										<td class="border text-center">4: Commitment Enhancement and Institutionalization</td>
									</tr>
								</tbody>
								</table>
						</div>
							<!-- <div class="media">
								<div class="media-body">
								<p><span class="f-w-500 font-roboto">Over All Level Total Score</span><span class="f-w-700 font-primary ms-2"></span></p>
								<h4 class="f-w-500 mb-0 f-26"><span class="counter"> </span></h4>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				</div>
					<!-- <div class="row">
						<div class="col-lg-6">
							<div class="card o-hidden">
								<div class="card-header card-no-border">
								<p><h5>Budget and Expenditure</h5></p>
								<div class="chart-block">
									<canvas id="BarGraph"></canvas>
								</div>	
								</div>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-lg-6">
							<!-- <h6>Target</h6> -->
							<div class="dt-ext table-responsive">
								<table class="display table-m" id="basic-1">
								<thead>
									<tr>
										<th>Division</th>
										<th>No. of indicator w/o activity submitted</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $result2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><p ><?php echo e($res->rawresponsible_unit); ?></p></td>
											<td><p><?php echo e($res->count); ?></p></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		<!-- </div> -->
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<!-- Data Table -->
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.min.js')); ?>"></script>
<!-- End of Datatable -->

<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script>
	// Embedding Laravel data into a JavaScript variable
	var jsData = <?php echo json_encode($result, 15, 512) ?>;

	console.log(jsData);
        
	// Now you can use jsData in your JavaScript code
	
	var barData = {
		labels: [],
		datasets: [{
			label: "My First dataset",
			fillColor: "rgba(145, 46, 252, 0.4)",
			strokeColor: CubaAdminConfig.primary,
			highlightFill: "rgba(145, 46, 252, 0.6)",
			highlightStroke: CubaAdminConfig.primary ,
			data: []
		}, 
		{
			label: "My Second dataset",
			fillColor: "rgba(247, 49, 100, 0.4)",
			strokeColor: CubaAdminConfig.secondary ,
			highlightFill: "rgba(247, 49, 100, 0.6)",
			highlightStroke: CubaAdminConfig.secondary,
			data: [28, 48, 40, 19, 50, 27, 30]
		}
		]
	};
	jsData.forEach(e => {
		console.log(e.responsible_unit);
		barData.labels.push(e.responsible_unit);
		barData.datasets[0].data.push(e.indicator_count);
		// console.log(key + ": " + jsData[key]);
	});
	
	console.log(barData);

	var barOptions = {
		scaleBeginAtZero: true,
		scaleShowGridLines: true,
		scaleGridLineColor: "rgba(0,0,0,0.1)",
		scaleGridLineWidth: 1,
		scaleShowHorizontalLines: true,
		scaleShowVerticalLines: true,
		barShowStroke: true,
		barStrokeWidth: 2,
		barValueSpacing: 5,
		barDatasetSpacing: 1,
	};

	var barCtx = document.getElementById("myBarGraph").getContext("2d");
	var myBarChart = new Chart(barCtx).Bar(barData, barOptions);
</script>

<script>
	// Embedding Laravel data into a JavaScript variable
	var jsData = <?php echo json_encode($result, 15, 512) ?>;

	console.log(jsData);
        
	// Now you can use jsData in your JavaScript code
	
	var barData = {
		labels: [],
		datasets: [{
			label: "My First dataset",
			fillColor: "rgba(145, 46, 252, 0.4)",
			strokeColor: CubaAdminConfig.primary,
			highlightFill: "rgba(145, 46, 252, 0.6)",
			highlightStroke: CubaAdminConfig.primary ,
			data: []
		}, 
		{
			label: "My Second dataset",
			fillColor: "rgba(247, 49, 100, 0.4)",
			strokeColor: CubaAdminConfig.secondary ,
			highlightFill: "rgba(247, 49, 100, 0.6)",
			highlightStroke: CubaAdminConfig.secondary,
			data: [28, 48, 40, 19, 86, 27, 90]
		}
		]
	};
	jsData.forEach(e => {
		console.log(e.responsible_unit);
		barData.labels.push(e.responsible_unit);
		barData.datasets[0].data.push(e.indicator_count);
		// console.log(key + ": " + jsData[key]);
	});
	
	console.log(barData);

	var barOptions = {
		scaleBeginAtZero: true,
		scaleShowGridLines: true,
		scaleGridLineColor: "rgba(0,0,0,0.1)",
		scaleGridLineWidth: 1,
		scaleShowHorizontalLines: true,
		scaleShowVerticalLines: true,
		barShowStroke: true,
		barStrokeWidth: 2,
		barValueSpacing: 5,
		barDatasetSpacing: 1,
	};

	var barCtx = document.getElementById("BarGraph").getContext("2d");
	var myBarChart = new Chart(barCtx).Bar(barData, barOptions);
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/dashboard/dashboard-02.blade.php ENDPATH**/ ?>