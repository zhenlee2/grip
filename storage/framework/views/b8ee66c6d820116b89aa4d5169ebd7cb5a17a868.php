
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>

<h3>OFFICE PERFORMANCE CONTRACT REVIEW</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">Office Performance Contract Review</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
        <div class="col-sm-12">
			<div class="card">
					<ul class="nav nav-tabs" id="icon-tab" role="tablist">
						<li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-list"></i>Performance Contract List</a></li>
						<!-- <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-ui-add"></i>Create Performance Contract</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-ui-rating"></i>Performance Contract Ratings</a></li> -->
					</ul>
					<div class="tab-content" id="icon-tabContent">
						<div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                        <div class="card mb-0">
                              <div class="card-body p-0">
                                 <div class="row list-persons" id="addcon">
                                    <div class="col-xl-12 col-md-12">
                                       <div class="tab-content" id="v-pills-tabContent">
                                          <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                                <div class="card-body">
                                                    <div class="dt-ext table-responsive">
                                                        <table class="display table-xs" id="export-button">
                                                            <thead>
                                                                <tr><th>Action</th>
                                                                    <th>Year</th>
                                                                    <th>Semester</th>
                                                                    <th>Total Approve Indicator</th>
                                                                    <th>Final Rating</th>
                                                                    <th>Adjectival Rating</th>
                                                                    <th>Creator</th>
                                                                    <th>Date Created</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>
                                                                    <a href="<?php echo e(route('officereview', ['year' => $l->year, 'semester' => $l->semester])); ?>" class="btn btn-light btn-sm example-popover form-control " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View"><span class="icofont icofont-eye-alt" ></span></a>
                                                                        </td>
                                                                        <td><?php echo e($l->year); ?></td>
                                                                        <td><?php echo e($l->semester); ?></td>
                                                                        <td><?php echo e($l->total_indicator); ?></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><?php echo e($l->fullname); ?></td>
                                                                        <td><?php echo e($l->created_at); ?></td>
                                                                </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contact-editform ps-4">
                                       <div class="col-sm-12">
                                <!-- <div class="card"> -->
                                    <!-- <div class="card-body"> -->
                                        <div class="table-responsive">
                                            <button class="btn btn-primary btn-sm update-contact " data-bs-original-title="Cancel" type="button"><span class="icon-arrow-left"></span></button>
                                            <button href="#" onclick="history(0)" class="btn btn-primary btn-sm" data-bs-original-title="Rating history" data-bs-dismiss="modal" type="button"><span class="icon-timer"></span></button>
                                            <button href="#" class="btn btn-primary btn-sm" data-bs-original-title="Print" data-bs-dismiss="modal" type="button"><span class="icon-printer"></span></button>
                                            <button class="btn btn-success btn-sm saveOfficepc pull-right" data-bs-original-title="Approve Rating" type="button"><span class="icon-check-box"></span></button>
                                        <div>
                                                            <table class="table table-bordered table-sm"> 
                                                                <tr>
                                                                    <th class="col-sm-1 col-form-label">Created by :</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-xm borderless" value="" name="name">
                                                                    </td> -->
                                                                    <th class="col-sm-1 col-form-label">ID No.:</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-sm borderless" value="" name="name">
                                                                    </td> -->
                                                                    <th class="col-sm-1 col-form-label">Date Created:</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-sm borderless" value="" name="name">
                                                                    </td> -->
                                                                <tr>
                                                                <tr>
                                                                    <th class="col-sm-1 col-form-label">Division :</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-sm borderless" value="" name="name">
                                                                    </td> -->
                                                                    <th class="col-sm-1 col-form-label">Section:</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-sm borderless" value="" name="name">
                                                                    </td> -->
                                                                    <th class="col-sm-1 col-form-label">Semester:</th>
                                                                    <th class="col-sm-2 col-form-label"></th>
                                                                    <!-- <td class="nopadding">
                                                                        <input type="text" class="form-control input-sm borderless" value="" name="name">
                                                                    </td> -->
                                                                <tr>                  
                                                                
                                                            </table>
                                                        </div>
                                            <table class="table table-bordered table-xs">                
                                                <thead>
                                                    <tr align="center">
                                                        <th colspan="2">KEY RESULTS AREA</th>
                                                        <th rowspan="2" class="col-sm-4 col-form-label">PERFORMANCE INDICATOR </br>(<i class="icofont icofont-ui-cart"></i> Quantity, <i class="icofont icofont-speech-comments"></i> Quality, <i class="icofont icofont-ui-calendar"></i> Timeliness)</th>
                                                        <th rowspan="2" class="col-sm-4 col-form-label">ACTUAL PERFORMANCE </br>(<i class="icofont icofont-ui-cart"></i> Quantity, <i class="icofont icofont-speech-comments"></i> Quality, <i class="icofont icofont-ui-calendar"></i> Timeliness)</th>
                                                        <th colspan="4">RATING</th>
                                                        <th rowspan="2">REMARKS</th> 
                                                        
                                                        <!-- <th rowspan="2" scope="col" class="col-sm-1 col-form-label"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button></th> -->
                                                        
                                                    </tr>
                                                    <tr align="center" > 
                                                        <th scope="col" class="col-sm-3 col-form-label"><i class="icofont icofont-trophy"></i> Objectives, Program, Project, Activity</th>
                                                        <th scope="col" class="col-sm-1 col-form-label"><i class="icofont icofont-chart-pie"></i> Weight Allocation</th> 
                                                        <th scope="col" class="col-sm-1 col-form-label">Quantity</br>Score</th> 
                                                        <th scope="col" class="col-sm-1 col-form-label">Quality</br>Score</th> 
                                                        <th scope="col" class="col-sm-1 col-form-label">Timeliness</br>Score</th> 
                                                        <th scope="col" class="col-sm-1 col-form-label">Weighted</br>Average</th> 

                                                        <!-- <th rowspan="2" scope="col" class="col-sm-1 col-form-label">Quantity</br>Score</th>
                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label">Quality</br>Score</th>
                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label">Timeliness</br>Score</th>
                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label">Average</br>Score</th>
                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label">Weighted</br>Average</th>                     -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" >STRATEGIC PRIORITIES</td>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" >50%</td>
                                                        <td colspan="8" style="background-color: rgb(128, 128, 128)" ></td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="strategic2"></tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)">CORE FUNCTIONS</td>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" >35%</td>
                                                        <td colspan="8" style="background-color: rgb(128, 128, 128)" ></td>                       
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)">SUPPORT FUNCTIONS</td>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" >15%</td>
                                                        <td colspan="8" style="background-color: rgb(128, 128, 128)" ></td>    
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr id="total_weight">
                                                        <td colspan=""></td>
                                                        <td name="total_weight">Total Weight:</td>
                                                        <td colspan="8"></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr id="total_weight">
                                                        <td colspan="5"></td>
                                                        <td colspan="2" name="">Final Rating:</td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr id="total_weight">
                                                        <td colspan="5"></td>
                                                        <td colspan="2" name="">Adjectival Rating: </td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <button class="btn btn-success btn-sm saveOfficepc pull-right" data-bs-original-title="Approve Rating" type="button"><span class="icon-check-box"></span></button>
                                        </div>
                                    <!-- </div>         -->
                                <!-- </div> -->
                            </div>                  
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- <p class="mb-0 m-t-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p> -->
						</div>
						<div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="col-md-1 mb-1">
                                            
                                            <select class="form-select form-control-primary" name="select" style="border: none">
                                                <option value="opt1">Select Year</option>
                                                <option value="opt2">2022</option>
                                                <option value="opt3">2023</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            
                                            <select class="form-select form-control-primary" name="select" style="border: none">
                                                    <option value="0"><h5>Select Semester</h5></option>
                                                    <option value="1"><h5>First Semester</h5></option>
                                                    <option value="2"><h5>Second Semester</h5></option>
                                            </select>
                                        </div>
                                      
                                    </div>        
                                </div>
                            </div>
                        </div>   
							<!-- <p class="mb-0 m-t-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p> -->
						</div>
						<div class="tab-pane fade" id="contact-icon" role="tabpanel" aria-labelledby="contact-icon-tab">
                        <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                    </div>        
                                </div>
                            </div>   
							<!-- <p class="mb-0 m-t-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p> -->
						</div>
					</div>
			</div>
		</div>
        <div id="right-history">
            <div class="modal-header p-l-20 p-r-20">
                <h6 class="modal-title w-100">Rating History<span class="pull-right"><a class="closehistory" href="#"><i class="icofont icofont-close"></i></a></span></h6>
                    </div>
                        <div class="history-details">
                            <div class="text-center">
                                <i class="icofont icofont-ui-edit"></i>
                                <p>No Ratings Yet.</p>
                            </div>
                        <div class="media">
                            <i class="icofont icofont-star me-3"></i>
                        <div class="media-body mt-0">
                            <h6 class="mt-0">Contact Created</h6>
                            <p class="mb-0">Contact is created via mail</p>
                        <span class="f-12">Sep 10, 2019 4:00</span>
                    </div>
                </div>
            </div>
        </div>

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 60%">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add Performance Contract</h5>
             <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form action="" id="frm" name="frm" method="POST">
                <div class="modal-body">
                    <div class="mb-2">
                        <div class="col-form-label">Select KRA Category</div>
                        <select id="category-id" class="form-control" >
                            <optgroup label="Categories">
                                <?php if(!empty($category)): ?>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                                <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Select Objectives, Program, Project and Activity</div>
                        <select id="activity-id" class="form-control">
                            <optgroup label="Activity Library">
                            </optgroup>
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Select Indicator Code #</div>
                        <select id="indicator-id" class="form-control">
                            <optgroup label="Code #">
                                <option selected></option>
                                <?php if(!empty($indicator)): ?>
                                <?php $__currentLoopData = $indicator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->sort); ?>"><?php echo e($item->sort); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </optgroup>
                        </select>
                    </div>
                    <div id="indicator" class="mb-2">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-xs">                
                            <thead>
                                <tr align="center">
                                    
                                    <th rowspan="2" class="col-sm-4 col-form-label">Target Indicator Description</th>
                                    <th rowspan="2" class="col-sm-4 col-form-label">Quantity</th>
                                    <th rowspan="2" class="col-sm-4 col-form-label">Quality</th>
                                    <th rowspan="2" class="col-sm-4 col-form-label">Timeliness</th>
                                    <th rowspan="2" scope="col" class="col-sm-1 col-form-label">ALLOTTED BUDGET (in Php)</th>
                                    <th rowspan="2" scope="col" class="col-sm-3 col-form-label">ACCOUNTABILITY CENTER (Division, Units, Individuals)</th>
                                </tr>
                            </thead>
                            <tbody id="strategic1"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit" id="add-button">Add</button>
                </div>   
            </form>
       </div>
    </div>
 </div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bookmark/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/contacts/custom.js')); ?>"></script>
<script>
    get_activity(1);

    $('#category-id').change(function() {
        let cat_id = $(this).val();
        console.log(cat_id);
        get_activity(cat_id);
    });

    $('#indicator-id').change(function() {
        let indi_id = $(this).val();
        console.log(indi_id);
        get_indicator(indi_id);
    });

    

    function get_activity(cat_id) {
        let act_opt_id = $('#activity-id optgroup');
        $.get( BASE_URL + "ajax/get_activity/" + cat_id, function(res) {
            act_opt_id.empty();
            res.forEach(e => {
                act_opt_id.append('<option value="'+e.id+'">'+e.name+'</option>');
            });
        });
    }
    
    function get_indicator(indi_id) {
        let data = $('#strategic1')
        data.empty();
        $.get(BASE_URL + "ajax/get_indicator/" + indi_id, function(res){
            res.forEach(e => {
                data.append('<tr>' +
                                '<td><input type="hidden" name="indicator[]" value="'+e.id+'" />'+e.target_indicator_desc+'</td>'+
                                '<td>'+e.quantity+'</td>'+
                                '<td>'+e.quality+'</td>'+
                                '<td>'+e.timeliness+'</td>'+
                                '<td><input type="text" class="form-control" name="budget[]" /></td>'+
                                '<td>'+e.name+'</td>'+
                            '</tr>')
            })
            
        });
        
    }

    $("#frm").submit(function(event){
        event.preventDefault();

        if($("#indicator-id").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select indicator code!',
            })
        } else {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let data_arr = {
                        // 'category_id': $('#category-id').val(),
                        'activity_id': $('#activity-id').val(),
                        'indicator_code': $('#indicator-id').val(),
                        'indicator': $("input[name='indicator[]']").map(function(){return $(this).val();}).get(),
                        // 'budget_alloted': $("input[name='budget[]']").map(function(){return $(this).val();}).get(),
                    };
                    
                    
                    $.ajax ({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'save_indicator',
                        type: 'post',
                        data: data_arr,
                        dataType: 'json',
                        success: function(response){
                            Swal.fire(
                                'Confirm!',
                                'Your file has been saved.',
                                'success'
                            )
                        },
                        error: function(error){
                            Swal.fire(
                                'Failed!',
                                'Your file has not been saved.',
                                'error'
                            )
                        }
                    });
                   
                }
            })
        }
    });
    
      
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/opcrpage/officepcr.blade.php ENDPATH**/ ?>